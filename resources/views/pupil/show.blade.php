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
    <hr>
    <div class="row">
        <div class="col-lg-12">
            <h2>Academic Record</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h4>
                Number of reports:
                <span>
                    {{ $pupil->reports_count }}
                </span>
            </h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table id="table_id" class="table table-striped">
                <thead class="thead-default">
                <th>Year</th>
                <th>Teacher</th>
                <th>Class Code</th>
                <th>Actions</th>
                </thead>
                <tbody>
                @foreach($pupil->reports as $report)
                    <tr>
                        <td style="width: 20%; max-width: 20%">{{ $pupil->reports->first()->report_class->year }}</td>
                        <td style="width: 20%; max-width: 20%">{{ $pupil->reports->first()->report_class->teacher->firstname . " " . $pupil->reports->first()->report_class->teacher->lastname }}</td>
                        <td style="width: 20%; max-width: 20%">{{ $pupil->reports->first()->report_class->class_code }}</td>
                        <td style="width: 20%; max-width: 20%">
                            <a class="btn btn-dark" href="/report/view/{{ $report->id }}">View Report</a>
                            <a class="btn btn-dark" href="/report/download/{{ $report->id }}">Download Report</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>


@endsection