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
            <form action="/pupils" method="post">
            <table id="table_id" class="table table-striped">
                <thead class="thead-default">
                    <tr class="justify-content-end">
                        <td colspan="3" >
                            <input type="submit" class="btn btn-dark" name="retain" value="Retain Pupils">
                        </td>
                        <td colspan="3" >
                            <input type="submit" class="btn btn-dark" name="promote" value="Promote Pupils">
                        </td>
                    </tr>
                    <tr>
                        <th style="max-width: 100px"><input type="checkbox" id="select_all"/><span style="padding-left: 5px">Select All</span></th>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>CEMIS #</th>
                        <th>Date of Birth</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                    <tbody>
                        @foreach($grade->first()->pupils as $pupil)
                            <tr>
                                <td style="max-width: 100px"><input class="checkbox" type="checkbox" name="check[]" value="{{ $pupil->id }}"></td>
                                <td>{{ $pupil->firstname }}</td>
                                <td>{{ $pupil->lastname }}</td>
                                <td>{{ $pupil->cemis_num }}</td>
                                <td>{{ $pupil->dob }}</td>
                                <td>
                                    <a class="btn btn-dark" href="/pupil/view/{{ $pupil['id'] }}">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
            </table>
            </form>
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
                    order: [[ 2, "asc" ]]
                }
            );
        } );
    </script>
    <script>
        //select all checkboxes
        $("#select_all").change(function(){  //"select all" change
            $(".checkbox").prop('checked', $(this).prop("checked")); //change all ".checkbox" checked status
        });

        //".checkbox" change
        $('.checkbox').change(function(){
            //uncheck "select all", if one of the listed checkbox item is unchecked
            if(false == $(this).prop("checked")){ //if this item is unchecked
                $("#select_all").prop('checked', false); //change "select all" checked status to false
            }
            //check "select all" if all checkbox items are checked
            if ($('.checkbox:checked').length == $('.checkbox').length ){
                $("#select_all").prop('checked', true);
            }
        });
    </script>
@endsection
