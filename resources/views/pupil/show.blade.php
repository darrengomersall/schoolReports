<?php
var_dump($pupil)
?>
@extends('partials.base')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1>
                {{ $pupil->firstname . " " .  $pupil->lastname }}
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <h4>
                Date of Birth:
                <span>
                    {{ $pupil->dob }}
                </span>
            </h4>
        </div>
        <div class="col-lg-4">
            <h4>
                CEMIS # :
                <span>
                    {{ $pupil->cemis_num }}
                </span>
            </h4>
        </div>
        <div class="col-lg-4">
            <h4>
                Home Language:
                <span>
                    {{ $pupil->language }}
                </span>
            </h4>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-12">
            <h2>Academic Record</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h4>
                Number of reports:
                <span>
                    {{ $pupil->reports_count }}
                </span>
            </h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table id="table_id" class="table table-striped">
                <thead class="thead-default">
                <th>Year</th>
                <th>Surname</th>
                <th>CEMIS #</th>
                <th>Date of Birth</th>
                <th>Home Language</th>
                <th>Actions</th>
                </thead>
                <tbody>
                @foreach($pupil->reports as $report)
                    <tr>
                        <td>{{ $pupil->firstname }}</td>
                        <td>{{ $pupil->lastname }}</td>
                        <td>{{ $pupil->cemis_num }}</td>
                        <td>{{ $pupil->dob }}</td>
                        <td style="text-transform: uppercase">{{ $pupil->language }}</td>
                        <td><a class="btn btn-dark" href="/pupil/view/{{ $pupil->id }}">View</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>


@endsection