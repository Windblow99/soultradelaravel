<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Withdrawal;
use Illuminate\Support\Facades\DB;
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
        return view ('withdrawal.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
