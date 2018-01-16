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
                    <th></th>
                    <th>Num of Classes</th>
                    <th>Num of Pupils</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <form action="/pupils">
                    @foreach($grade->first()->pupils as $pupil)
                        <tr>
                            <td>{{ $pupil->firstname }}</td>
                            <td>{{ $pupil->firstname }}</td>
                        </tr>
                    @endforeach
                </form>
                </tbody>
            </table>
        </div>
    </div>

@endsection