    @extends('partials.base')
    @section('content')
        <div class="row">
            <div class="col-lg-19">
                <h1>
                    Report:
                </h1>
                <h2>
                    <span>{{ $report->pupil->firstname . " " . $report->pupil->lastname }}</span> for {{ $class->year }} in <span>{{ $class->grade->name }}</span>
                </h2>
            </div>

            <div class="col-lg-3">
                <a href="/report/{{ $report->id }}/mark/add" class="btn btn-dark">Add Marks</a>
               <a href="/pupil/view/{{ $report->pupil->id }}" class="btn btn-dark">Return to Pupil</a>
            </div>
        </div>
        <hr>
        @if(\Illuminate\Support\Facades\Session::has('message'))
            <div class="row message {{ \Illuminate\Support\Facades\Session::get('alert') }}">
                <div>
                    <h3>{{ \Illuminate\Support\Facades\Session::get('message') }}</h3>
                </div>
            </div>
        @endif
        @foreach($subject_data as $subject_group)
            <div class="row subject-group">
                <div class="col-lg-12">
                    <h2 >
                       <span class="badge badge-dark">{{ $subject_group->title }}</span>
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-striped">
                        <thead class="thead-default">
                            <tr>
                                <th>Subject</th>
                                <th>Term 1</th>
                                <th>Term 2</th>
                                <th>Term 3</th>
                                <th>Term 4</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($subject_group->subjects as $subject)
                            <tr>
                                <td class="subject-name">{{ $subject->name }}</td>
                                    @foreach($subject->marks as $mark)
                                        <td>{{ App\Http\Controllers\ReportController::convert_mark($mark->value) }}</td>
                                    @endforeach
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach
    @endsection