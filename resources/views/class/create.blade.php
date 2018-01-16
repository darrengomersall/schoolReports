@extends('partials.base')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1>
                Add a Class
            </h1>
        </div>
    </div>
    @if (\Illuminate\Support\Facades\Session::has('save-message'))
        <div class="row">
            <div class="col-lg-12 ">
                <h4 class="save-status {{ \Illuminate\Support\Facades\Session::get('save-status') }}">
                    {{ \Illuminate\Support\Facades\Session::get('save-message') }}
                </h4>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <form method="POST" action="/class/store">
                {{ csrf_field() }}
                <div class="form-group-lg">
                    <div class="row">
                        <div class="col-3 text-right">
                            <label for="year">Year</label>
                        </div>
                        <div class="col-3">
                            <input id="year" class="form-control" name="year" type="text" value="{{ $year }}" />
                        </div>
                    </div>
                </div>
                <div class="form-group-lg">
                    <div class="row">
                        <div class="col-3 text-right">
                            <label for="class_code">Class Code</label>
                        </div>
                        <div class="col-3 ">
                            <input id="class_code" class="form-control" name="class_code" type="text" value="{{ old('lastname') }}"  />
                        </div>
                    </div>
                </div>
                <div class="form-group-lg">
                    <div class="row">
                        <div class="col-3 text-right">
                            <label for="language">Current Grade</label>
                        </div>
                        <div class="col-3 ">
                            <select id="language" class="form-control" name="grade">
                                <option value="" selected="selected" >Choose a Grade</option>
                                @foreach(\App\Grade::all() as $grade)
                                    <option value="{{ $grade->id }}" >{{ $grade->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group-lg">
                    <div class="row">
                        <div class="col-3 text-right">
                            <label for="teacher">Teacher</label>
                        </div>
                        <div class="col-3 ">
                            <select id="teacher" class="form-control" name="teacher">
                                <option value="" selected="selected" >Choose a Teacher</option>
                                @foreach(\App\User::all() as $teacher)
                                    <option value="{{ $teacher->id }}" >{{ $teacher->firstname . " " . $teacher->lastname }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group-lg">
                    <div class="col-3 text-right">
                        <button type="submit" class="btn btn-dark">SAVE</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection