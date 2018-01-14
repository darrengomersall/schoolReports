@extends('partials.base')
    @section('content')
        <div class="row">
            <div class="col-lg-10">
                <h1>
                    Report for: <span>{{ $report->pupil->firstname . " " . $report->pupil->lastname }}</span>
                </h1>
            </div>
            <div class="col-lg-2">
               <a href="/pupil/view/{{ $report->pupil->id }}" class="btn btn-dark">Return to Pupil</a>
            </div>

        </div>
    @endsection