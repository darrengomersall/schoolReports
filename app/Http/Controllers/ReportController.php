<?php

namespace App\Http\Controllers;

use App\Mark;
use App\Pupil;
use App\Report;
use App\ClassGroup;
use App\Subject;
use App\SubjectGroup;
use Illuminate\Http\Request;

class ReportController extends Controller
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
        //
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
        $report = Report::where('id', '=', $id)->with('pupil', 'report_class')->get()->first();

        $class = ClassGroup::where('id', '=', $report->report_class->first()->id)->with('grade')->get()->first();

        $subject_data = SubjectGroup::where('grade_id', '=', $class->grade->id)->with('subjects.marks')->get();

        $term_averages = Mark::where('report_id', '=', $report->id)->average('value')->get();

        return view ('report.show', [
            'report' => $report,
            'class' => $class,
            'subject_data' => $subject_data,
            'term_averages' => $term_averages
            ]);
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

    /**
     * Take the float mark and convert it to 1 -7 scale and return
     *
     * @param  float  $mark
     * @return int $mark
     */
    public static function convert_mark($mark)
    {
        if ( $mark >= 80.0 )
        {
            return $mark = 7;
        }
        elseif (  $mark < 80.0 && $mark >= 70.0 )
        {
            return $mark = 6;
        }
        elseif (  $mark < 70.0 && $mark >= 60.0 )
        {
            return $mark = 5;
        }
        elseif (  $mark < 60.0 && $mark >= 50.0 )
        {
            return $mark = 4;
        }
        elseif (  $mark < 50.0 && $mark >= 40.0 )
        {
            return $mark = 3;
        }
        elseif (  $mark < 40.0 && $mark >= 30.0 )
        {
            return $mark = 2;
        }
        elseif (  $mark < 30.0 && $mark >= 0.0 )
        {
            return $mark = 1;
        }
        else
        {
            return $mark = 'error with mark';
        }
    }
}
