@extends('partials.base')
    @section('content')
        <div class="row">
            <div class="col-lg-12">
                <h1>
                    Report for: <span>{{ $report->pupil->firstname . " " . $report->pupil->lastname }}</span>
                </h1>
            </div>
        </div>
    @endsection