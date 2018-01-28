<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\ClassGroup;
use PDF;

class ClassGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('class.index', ['classes' => ClassGroup::with('teacher','grade')->withCount('pupils')->get()->toArray()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('class.create', [ 'teachers' => User::all(), 'year' => Carbon::now()->year ]);

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
        $class = new ClassGroup();
        $class->teacher_id = $request->teacher;
        $class->grade_id = $request->teacher;
        $class->year = $request->year;
        $class->class_code = $request->class_code;
        if ($class->save())
        {
            $request->session()->flash('save-message', "Class " . $class->class_code .  " was added successfully");
            $request->session()->flash('save-status', "success");
        }
        else
        {
            $request->session()->flash('save-message', "There was a saving error");
            $request->session()->flash('save-status', "error");
        }
        return redirect(url('/class/add'));
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
        return view('class.show', [ 'class' => ClassGroup::where('id', '=', $id)->with('teacher', 'pupils')->withCount('pupils')->get()->first() ] );
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

    public function download ($id)
    {
        $class = ClassGroup::where('id', '=', $id)->with('teacher', 'pupils')->withCount('pupils')->get()->first();
        $pdf = PDF::loadView('class.pdf', [ 'class' => $class ]);
        $filename = 'Class_List' . '_' . 'Grade '. $class->id . '_' . $class->teacher->lastname . '.pdf';
        return $pdf->download($filename);
    }
}
