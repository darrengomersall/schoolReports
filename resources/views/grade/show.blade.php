@extends('partials.base')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1>
                Grade Details: {{ $grade->name }}
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h3>
                Number of Classes: {{ $grade->classes_count }}
            </h3>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table  class="table table-striped">
                <thead class="thead-default">
                <th>Class Code</th>
                <th>Teacher</th>
                <th>Number of Pupils</th>
                <th>Actions</th>
                </thead>
                <tbody>
                @foreach($classes as $class)
                    <tr>
                        <td>{{ $class->class_code }}</td>
                        <td>{{ $class->teacher->title . " " . $class->teacher->firstname . " " . $class->teacher->lastname }}</td>
                        <td>{{ $class->pupils_count }}</td>
                        <td><a class="btn btn-dark" href="/class/view/{{ $class->id }}">View Class</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row" style="margin-top: 2rem">
        <div class="col-lg-12">
            <h3>
                Subject Groups
            </h3>
        </div>
    </div>
    <div class="row" >
        <div class="col-lg-12">
            <table  class="table table-striped">
                <thead class="thead-default">
                <tr>
                    <th>Title</th>
                    <th>Number of Subjects</th>
                    <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($subject_groups as $subject_group)
                    <tr>
                        <td>{{ $subject_group->title }}</td>
                        <td>{{ $subject_group->subjects_count }}</td>
                        <td>
                            <a href="" class="btn btn-dark">View Subject Group</a>
                            <a href="" class="btn btn-light">Edit Subject Group</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection