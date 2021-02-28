<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class ReportsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $report = new Report;
        $report->description = $request->description;
        $report->user_id = $request->id;
        $report->user_name = $request->name;
        $report->save();
        
        if ($report->save()){
            $request->session()->flash('success', 'Report has been created');
        } else {
            $request->session()->flash('error', 'There was an error updating the user');
        }

        return redirect()->route('user.users.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('report.users.edit')->with([
            'user' => $user,
        ]);
    }

    public function showAllReports(Report $reports)
    {
        $reports = DB::table('reports')
            ->get();

        return view ('report.users.all')->with('reports', $reports);
    }

    // Generate PDF
    public function createPDF() {
        // retreive all records from db
        $data = Report::all();
  
        // share data to view
        view()->share('reports',$data);
        $pdf = PDF::loadView('reportsPDF', $data);
  
        // download PDF file with download method
        return $pdf->download('pdf_reports.pdf');
    }
}
