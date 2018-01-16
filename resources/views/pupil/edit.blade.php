@extends('partials.base')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1>
                Edit pupil
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
                        <div class="col-3 text-right">
                            <label for="firstname">First name</label>
                        </div>
                        <div class="col-3">
                            <input id="firstname" name="firstname" type="text" value="{{ $pupil->firstname }}" />
                        </div>
                    </div>
                </div>
                <div class="form-group-lg">
                    <div class="row">
                        <div class="col-3 text-right">
                            <label for="lastname">Surname</label>
                        </div>
                        <div class="col-3 ">
                            <input id="lastname" name="lastname" type="text" value="{{ $pupil->lastname }}"  />
                        </div>
                    </div>
                </div>
                <div class="form-group-lg">
                    <div class="row">
                        <div class="col-3 text-right">
                            <label for="cemis_num">CEMIS #</label>
                        </div>
                        <div class="col-3 ">
                            <input id="cemis_num" name="cemis_num" type="text" value="{{ $pupil->cemis_num }}"  />
                        </div>
                    </div>
                </div>
                <div class="form-group-lg ">
                    <div class="row">
                        <div class="col-3 text-right">
                            <label for="dob" >Date of Birth (YYYY-MM-DD)</label>
                        </div>
                        <div class="col-9 form-inline text-center  ">
                            <input id="dob_year" style="max-width: 10%" class="form-control text-center" name="dob_year" type="text" placeholder="YYYY" value="{{ $dob->year }}"  />
                            <input id="dob_month" style="max-width: 10%" class="form-control text-center" name="dob_month" type="text" placeholder="MM" value="{{ $dob->month }}" />
                            <input id="dob_month" style="max-width: 10%" class="form-control text-center" name="dob_month" type="text" placeholder="MM" value="{{ $dob->month }}" />
                        </div>
                    </div>
                </div>
                <div class="form-group-lg">
                    <div class="row">
                        <div class="col-3 text-right">
                            <label for="language">Current Grade</label>
                        </div>
                        <div class="col-3 ">
                            <select id="language" class="form-control" name="language">
                                @foreach($grades as $grade)
                                    <option value="{{ $grade->id }}" @if($grade->id == $pupil->current_class->grade_id) selected="selected" @endif>{{ $grade->name }}</option>
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
                            <select id="language" name="language">
                                <option value="" selected disabled hidden>Choose here</option>
                                <option value="afr" >AFRIKAANS</option>
                                <option value="eng" selected="eng">ENGLISH</option>
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