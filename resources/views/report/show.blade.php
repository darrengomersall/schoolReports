<?php
//echo "<pre>";
//var_dump($subject_data->toArray())
?>
    @extends('partials.base')
    @section('content')
        <div class="row">
            <div class="col-lg-10">
                <h1>
                    Report:
                </h1>
                <h2>
                        <span>{{ $report->pupil->firstname . " " . $report->pupil->lastname }}</span> for {{ $class->year }} in <span>{{ $class->grade->name }}</span>
                </h2>
            </div>
            <div class="col-lg-2">
               <a href="/pupil/view/{{ $report->pupil->id }}" class="btn btn-dark">Return to Pupil</a>
            </div>
        </div>
        <hr>
        @foreach($subject_data as $subject_group)
            <div class="row">
                <div class="col-lg-8">
                    <h2 style="background-color: #23408f; color: #ffffff; font-family: 'LatoBold', Helvetica, Arial, sans-serif">
                        {{ $subject_group->title }}
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <table class="table table-striped">
                        <thead class="thead-default">
                            <tr>
                                <th>Subject</th>
                                <th>Term 1</th>
                                <th>Term 2</th>
                                <th>Term 3</th>
                                <th>Term 4</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($subject_group->subjects as $subject)
                            <tr>
                                <td>{{ $subject->name }}</td>
                                <td>4</td>
                                <td>4</td>
                                <td>4</td>
                                <td>4</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach
    @endsection