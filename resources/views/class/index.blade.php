@extends('partials.base')
    @section('content')
        <div class="row">
            <div class="col-lg-12">
                <h1>
                    Classes
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Grade</th>
                            <th>Teacher</th>
                            <th>Class Code</th>
                            <th>Num of Pupils</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($classes as $class)
                        <tr>
                            <td>{{ $class['grade']['name'] }}</td>
                            <td>{{ $class['teacher']['firstname'] . " " . $class['teacher']['lastname'] }}</td>
                            <td>{{ $class['class_code'] }}</td>
                            <td>{{ $class['pupils_count'] }}</td>
                            <td><a class="btn btn-dark" href="/class/view/{{ $class['id'] }}">View Class</a> </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection