

@extends('partials.base')
@section('content')
    <?php
    //echo "<pre>";
    //var_dump($subject_groups)
    ?>
    <div class="row">
        <div class="col-12">
            <h1 style="color: #23408f">
                Report:
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-9">
            <h2>
                You are about to add marks for <span style="font-size: 2rem; font-weight: bold; font-family: 'LatoBold', Helvetica, Arial, sans-serif; color: #6f42c1">{{ $report->pupil->firstname . " " . $report->pupil->lastname }}</span>
            </h2>
        </div>
        <div class="col-lg-3">
            <a href="/report/view/{{ $report->id }}" class="btn btn-danger">Cancel</a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12">
            <form action="/report/{{ $report->id }}/mark/save" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="report_id" value="{{ $report->id }}">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-6">
                                <h4>Which Term are you adding marks for?</h4>
                            </div>
                            <div class="col-3">
                                <select name="term" class="form-control">
                                    <option >Please select a term</option>
                                    <option value="1">Term 1</option>
                                    <option value="2">Term 2</option>
                                    <option value="3">Term 3</option>
                                    <option value="4">Term 4</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach($subject_groups as $subject_group)
                    <div class="row subject-group">
                        <div class="col-lg-12">
                            <h2 >
                                <span class="badge badge-dark">{{ $subject_group->title }}</span>
                            </h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <table class="table table-striped" style="width: 800px">
                                <thead class="thead-default">
                                <tr>
                                    <th width="600">Subject</th>
                                    <th width="200">Mark</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($subject_group->subjects as $subject)
                                    <tr>
                                        <td width="600" class="subject-name">{{ $subject->name }}</td>
                                        <td width="200" class="subject-name">
                                            <input type="number" min="0" max="100" name="{{ $subject->id }}"/>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endforeach
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-6">
                                <h4>If you are all done then you can save these marks</h4>
                            </div>
                            <div class="col-6">
                               <input class="btn btn-dark" type="submit" name="save" value="SAVE MARKS" />
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection