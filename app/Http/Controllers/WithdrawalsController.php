<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Withdrawal;
use PDF;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class WithdrawalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $withdrawal = DB::table('withdrawals')->latest()->first();

        return View ('withdrawal.users.index')->with('withdrawals', $withdrawal);
    }

    // Generate PDF
    public function createPDF() {
        // retreive all records from db
        $data = Withdrawal::all();
  
        // share data to view
        view()->share('withdrawals',$data);
        $pdf = PDF::loadView('withdrawalsPDF', $data);
  
        // download PDF file with download method
        return $pdf->download('pdf_withdrawals.pdf');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $withdrawal = new Withdrawal;

        // checking for genesis block
        if ($request->previous_hash == "0") {
            $request->session()->flash('error', 'There was an error validating the hash');
            return redirect()->route('withdrawal.users.index');
        }

        $previous_previous_id = ($request->previous_id - 1);

        // checking for previous block
        if (Hash::check($previous_previous_id, $request->previous_hash)) {
            $withdrawal->previous_hash = Hash::make($request->previous_id);
        } else {
            $request->session()->flash('error', 'There was an error validating the hash2');
            return redirect()->route('withdrawal.users.index');
        }

        $withdrawal->user_id = auth()->user()->id;
        $withdrawal->user_name = auth()->user()->name;
        $withdrawal->bank_name = $request->bank_name;
        $withdrawal->bank_account = $request->bank_account;
        $withdrawal->amount = $request->amount;
        $withdrawal->save();

        DB::update(
            'update users set balance = balance - ? WHERE users.id = ?',
            [$request->amount, auth()->user()->id]
        );
        
        if ($withdrawal->save()){
            $request->session()->flash('success', 'Withdrawal has been created');
        } else {
            $request->session()->flash('error', 'There was an error updating the user');
        }

        return redirect()->route('user.users.index');
    }

    public function showAllWithdrawals(Withdrawal $withdrawals)
    {
        $withdrawals = DB::table('withdrawals')->get();
        return view ('withdrawal.users.all')->with('withdrawals', $withdrawals);
    }
}
