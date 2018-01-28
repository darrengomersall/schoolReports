<?php

namespace App\Http\Controllers;

use App\ClassGroup;
use App\Grade;
use App\Pupil;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PupilController extends Controller
{
    public $date;

    public function __construct()
    {
        $this->middleware('auth');
        $this->date = Carbon::now();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pupil.index', ['pupils' => Pupil::with('current_class.grade')->orderBy('lastname','asc')->get()->toArray() ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pupil.create', [ 'grades' => Grade::all() ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $class = ClassGroup::where('year', '=', $this->date->year)->where('grade_id', '=', $request->grade)->get() ;
        $pupil = new Pupil();
        $pupil->firstname = $request->firstname;
        $pupil->lastname = $request->lastname;
        $pupil->cemis_num = $request->cemis_num;
        $pupil->class_id = $class->id;
        $pupil->dob = $request->dob_year . "-" . $request->dob_month . "-" . $request->dob_day;
        $pupil->language = $request->language;
        if ($pupil->save())
        {
            $request->session()->flash('save-message', $pupil->firstname . " " . $pupil->lastname . " was added successfully");
            $request->session()->flash('save-status', "success");
        }
        else
        {
            $request->session()->flash('save-message', "There was a saving error");
            $request->session()->flash('save-status', "error");
        }
        return view('pupil/create');

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

        //dd(Pupil::where('id', '=', $id)->with('reports.report_class')->withCount('reports')->get()->first());
        return view('pupil.show', ['pupil' => Pupil::where('id', '=', $id)->with('reports.report_class.teacher')->withCount('reports')->get()->first()]);
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
        $pupil = Pupil::where('id', '=', $id)->with('current_class')->get()->first();
            $dob = Carbon::createFromFormat('Y-m-d', "$pupil->dob");
        return view ('pupil.edit', [
            'pupil' => $pupil,
            'dob' => $dob,
            'grades' => Grade::all()
            ]);
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

    public function promote ()
    {
        return view('pupil.promote.index', ['grades' => Grade::withCount('classes', 'pupils')->get() ]);
    }

    public function promoteGrade ($id)
    {
        return view('pupil.promote.grade' , [
            'grade' => Grade::where('id', '=', $id)->with('pupils')->get(),
            'promote_class' => ClassGroup::where('')]);
    }

    public function promoteStore ()
    {
        return view('pupil.promote.index', ['grades' => Grade::withCount('classes', 'pupils')->get() ]);
    }
}
