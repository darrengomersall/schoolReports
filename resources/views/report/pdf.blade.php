<!DOCTYPE html>
<html lang="en">
<style>
    body {
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    }
</style>
<body style="max-width: 850px">
<table style="width: 100%">
    <tr>
        <td>
            <h1>
                Report:
            </h1>
            <h2>
                <span>{{ $report->pupil->firstname . " " . $report->pupil->lastname }}</span> for {{ $class->year }} in
                <span>{{ $class->grade->name }}</span>
            </h2>
        </td>
    </tr>
</table>
<hr>
@foreach($subject_data as $subject_group)
    <table style="width: 100%; margin-top: 25px; margin-bottom: 5px; font-size: 32px">
        <tr>
            <td>
                <h2 style="background-color: #23408f; display: inline-block; padding: 5px; font-size: 24px ;font-weight: bold;border-radius: 0.25rem; color: #ffffff">
                    {{ $subject_group->title }}
                </h2>
            </td>
        </tr>
    </table>
    <table style="width: 100%">
        <thead class="thead-default">
        <tr>
            <th style="text-align: left">Subject</th>
            <th>Term 1</th>
            <th>Term 2</th>
            <th>Term 3</th>
            <th>Term 4</th>
        </tr>
        </thead>
        <tbody>
        @foreach($subject_group->subjects as $subject)
            <tr>
                <td style="width: 400px; ">{{ $subject->name }}</td>
                @foreach($subject->marks as $mark)
                    <td style="text-align: center; width: 100px">{{ App\Http\Controllers\ReportController::convert_mark($mark->value) }}</td>
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>
@endforeach
</body>
