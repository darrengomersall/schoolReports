<?php

namespace App\Http\Controllers;

use App\Pupil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PupilController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pupil.index', ['pupils' => Pupil::all() ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pupil.create');
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
        $pupil = new Pupil();
        $pupil->firstname = $request->firstname;
        $pupil->lastname = $request->lastname;
        $pupil->cemis_num = $request->cemis_num;
        $pupil->dob = $request->dob_year . "-" . $request->dob_month . "-" . $request->dob_day;
        $pupil->language = $request->language;
        if ($pupil->save())
        {
            $request->session()->flash('success', $pupil->firstname . " " . $pupil->lastname . " was added successfully");
        }
        else
        {
            $request->session()->flash('error', "There was a saving error");
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
        return view('pupil.show', ['pupil' => Pupil::where('id', '=', $id)->get()->first()]);
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
