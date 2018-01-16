@extends('partials.base')
    @section('content')
        <div class="row">
            <div class="col-lg-12">
                <h1>
                    Add a pupil
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
                <form method="POST" action="/pupil/store">
                    {{ csrf_field() }}
                    <div class="form-group-lg">
                        <div class="row">
                            <div class="col-3 text-right">
                                <label for="firstname">First name</label>
                            </div>
                            <div class="col-3">
                                <input id="firstname" class="form-control" name="firstname" type="text" value="{{ old('firstname') }}" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group-lg">
                        <div class="row">
                            <div class="col-3 text-right">
                                <label for="lastname">Surname</label>
                            </div>
                            <div class="col-3 ">
                                <input id="lastname" class="form-control" name="lastname" type="text" value="{{ old('lastname') }}"  />
                            </div>
                        </div>
                    </div>
                    <div class="form-group-lg ">
                        <div class="row">
                            <div class="col-3 text-right">
                                <label for="dob" >Date of Birth (YYYY-MM-DD)</label>
                            </div>
                            <div class="col-9 form-inline text-center  ">
                                <input id="dob_year" style="max-width: 10%" class="form-control text-center" name="dob_year" type="text" placeholder="YYYY"  />
                                <input id="dob_month" style="max-width: 10%" class="form-control text-center" name="dob_month" type="text" placeholder="MM"  />
                                <input id="dob_month" style="max-width: 10%" class="form-control text-center" name="dob_day" type="text" placeholder="DD"  />
                            </div>
                        </div>
                    </div>
                    <div class="form-group-lg">
                        <div class="row">
                            <div class="col-3 text-right">
                                <label for="cemis_num">CEMIS #</label>
                            </div>
                            <div class="col-3 ">
                                <input id="cemis_num" class="form-control" name="cemis_num" type="text" value="{{ old('lastname') }}"  />
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
                    </div>
                    <div class="form-group-lg">
                        <div class="row">
                            <div class="col-3 text-right">
                                <label for="language">Home Language</label>
                            </div>
                            <div class="col-3 ">
                                <select id="language" class="form-control" name="language">
                                    <option value="" selected="selected" >Choose a language</option>
                                    <option value="afr">AFRIKAANS</option>
                                    <option value="eng">ENGLISH</option>
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