<?php

namespace App\Http\Controllers;

use App\ClassGroup;
use App\SubjectGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Grade;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view ('grade.index', [ 'grades' => Grade::withCount('classes', 'pupils')->get()]);
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
        return view ('grade.show', [
            // Total number of pupils in the grade
            'grade' => Grade::where('id', '=', $id)->withCount('pupils', 'classes')->get()->first(),
            // Number of pupils in each class
            'classes' => ClassGroup::where('grade_id', '=', $id)->withCount('pupils')->get(),
            'subject_groups' => SubjectGroup::where('grade_id', '=', $id)->withCount('subjects')->get(),
            //'teachers' => Grade::with('teachers')->get()
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
}
