<?php

namespace App\Http\Controllers;

use App\Mark;
use App\Report;
use App\SubjectGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $report = Report::where('id', '=', $id)->with('pupil','report_class')->get()->first();

        $subject_groups = SubjectGroup::where('grade_id', '=', $report->report_class->grade_id)->with('subjects')->get();

        return view ('mark.create',
            [
                'report' => $report,
                'subject_groups' => $subject_groups,
            ]
        );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $marks = array();
        $subject_id = 1;
        foreach ($request->request as $key => $value)
        {
            if ($key == $subject_id)
            {
                    $marks [] =
                    [
                        'report_id' => $request->input('report_id'),
                        'subject_id' => $subject_id,
                        'term' => $request->input('term'),
                        'value' => $request->input($subject_id),
                        "created_at" =>  Carbon::now(),
                        "updated_at" => Carbon::now(),
                    ];
                $subject_id++;
            }

        }
        if ( DB::table('marks')->insert($marks) )
        {
            $request->session()->flash('message','Marks saved successfully');
            $request->session()->flash('alert','success');
            return redirect('/report/view/' . $request->input('report_id') );
        }

        echo "<pre>";
        var_dump($marks);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
