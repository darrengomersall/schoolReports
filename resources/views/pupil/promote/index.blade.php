@extends('partials.base')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1>
                Grades
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Grade</th>
                    <th>Num of Classes</th>
                    <th>Num of Pupils</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($grades as $grade)
                    <tr>
                        <td>{{ $grade['name'] }}</td>
                        <td>{{ $grade['classes_count'] }}</td>
                        <td>{{ $grade['pupils_count'] }}</td>
                        <td><a class="btn btn-dark" href="/pupils/promote/grade/{{ $grade['id'] }}">Promote Pupils</a> </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection