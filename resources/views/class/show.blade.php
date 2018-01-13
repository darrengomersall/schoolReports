@extends('partials.base')
    @section('content')
        <div class="row">
            <div class="col-lg-12">
                <h1>
                    Class Details: {{ $class->class_code }} - {{ $class->teacher->name }}
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h3>
                    Number of Pupils: {{ $class->pupils_count }}
                </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table id="table_id" class="table table-striped">
                    <thead class="thead-default">
                    <th>First Name</th>
                    <th>Surname</th>
                    <th>CEMIS #</th>
                    <th>Date of Birth</th>
                    <th>Home Language</th>
                    <th>Actions</th>
                    </thead>
                    <tbody>
                    @foreach($class->pupils as $pupil)
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