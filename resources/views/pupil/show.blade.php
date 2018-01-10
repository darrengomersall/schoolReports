<?php
//var_dump($pupil)
?>
@extends('partials.base')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1>
                {{ $pupil->firstname . " " .  $pupil->lastname }}
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <h4>
                Date of Birth:
                <span>
                    {{ $pupil->dob }}
                </span>
            </h4>
        </div>
        <div class="col-lg-4">
            <h4>
                CEMIS # :
                <span>
                    {{ $pupil->cemis_num }}
                </span>
            </h4>
        </div>
        <div class="col-lg-4">
            <h4>
                Home Language:
                <span>
                    {{ $pupil->language }}
                </span>
            </h4>
        </div>
    </div>
@endsection