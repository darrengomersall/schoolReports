@extends('partials.base')
    @section('content')
        <div class="row">
            <div class="col-lg-12">
                <h1>
                    Add a pupil
                </h1>
            </div>
        </div>
        @if (\Illuminate\Support\Facades\Session::has('success'))
        <div class="row">
            <div class="col-lg-12">
                <h4>
                   {{ \Illuminate\Support\Facades\Session::get('success') }}
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
                            <div class="col-2 text-right">
                                <label for="firstname">First name</label>
                            </div>
                            <div class="col-3">
                                <input id="firstname" name="firstname" type="text" value="{{ old('firstname') }}" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group-lg">
                        <div class="row">
                            <div class="col-2 text-right">
                                <label for="lastname">Surname</label>
                            </div>
                            <div class="col-3 ">
                                <input id="lastname" name="lastname" type="text" value="{{ old('lastname') }}"  />
                            </div>
                        </div>
                    </div>
                    <div class="form-group-lg">
                        <div class="row">
                            <div class="col-2 text-right">
                                <label for="cemis_num">CEMIS #</label>
                            </div>
                            <div class="col-3 ">
                                <input id="cemis_num" name="cemis_num" type="text" value="{{ old('lastname') }}"  />
                            </div>
                        </div>
                    </div>
                    <div class="form-group-lg">
                        <div class="row">
                            <div class="col-2 text-right">
                                <label for="dob">Date of Birth</label>
                            </div>
                            <div class="col-2 ">
                                <input id="dob_year" style="width: 50%" name="dob_year" type="text" placeholder="YYYY" value="{{ old('dob_year') }}"  />
                            </div>
                            <div class="col-3 ">
                                <input id="dob_month" name="dob_month" type="text" placeholder="MM" value="{{ old('dob_month') }}" />
                            </div>
                            <div class="col-3 ">
                                <input id="dob_year" name="dob_day" type="text" placeholder="DD" value="{{ old('dob_day') }}" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group-lg">
                        <div class="row">
                            <div class="col-2 text-right">
                                <label for="language">Home Language</label>
                            </div>
                            <div class="col-3 ">
                                <select id="language" name="language">
                                    <option value="afr">AFRIKAANS</option>
                                    <option value="eng">ENGLISH</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group-lg">
                        <div class="col-2 text-right">
                            <button type="submit" class="btn btn-dark">SAVE</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endsection