@extends('partials.base')
    @section('content')
        <div class="row">
            <div class="col-lg-12">
                <h1>Pupils List</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table id="table_id" class="table table-striped">
                    <thead class="thead-default">
                        <th>First Name</th>
                        <th>Surname</th>
                        <th>CEMIS #</th>
                        <th>Grade</th>
                        <th>Year</th>
                        <th>Date of Birth</th>
                        <th>Language</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        @foreach($pupils as $pupil)
                            <tr>
                                <td>{{ $pupil['firstname'] }}</td>
                                <td>{{ $pupil['lastname'] }}</td>
                                <td>{{ $pupil['cemis_num'] }}</td>
                                <td>{{ $pupil['current_class']['grade']['name'] }}</td>
                                <td>{{ $pupil['current_class']['year'] }}</td>
                                <td>{{ $pupil['dob'] }}</td>
                                <td style="text-transform: uppercase">{{ $pupil['language'] }}</td>
                                <td>
                                    <a class="btn btn-dark" href="/pupil/view/{{ $pupil['id'] }}">View</a>
                                    <a class="btn btn-light" href="/pupil/edit/{{ $pupil['id'] }}">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
@section('scripts')
        @parent
        <script>
            $(document).ready( function () {
                $('#table_id').DataTable(
                    {
                        paging: false,
                        info: false,
                        order: [[ 1, "asc" ]]
                    }
                );
            } );
        </script>
@endsection