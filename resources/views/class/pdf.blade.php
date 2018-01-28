<!DOCTYPE html>
<html lang="en">
<body style="max-width: 850px">
<table style="width: 100%">
    <tr>
        <td>
            <h1>
                Class Details: {{ $class->class_code }}
                - {{ $class->teacher->firstname . " " . $class->teacher->lastname }}
            </h1>
        </td>
    </tr>
    <tr>
        <td>
            <h3>
                Number of Pupils: {{ $class->pupils_count }}
            </h3>
        </td>
    </tr>
</table>
<table style="width: 100%">
    <thead class="thead-default">
    <tr>
        <th>First Name</th>
        <th>Surname</th>
        <th>CEMIS #</th>
        <th>Date of Birth</th>
        <th style="text-align: center">Home Language</th>
    </tr>
    </thead>
    <tbody>
    @foreach($class->pupils as $pupil)
        <tr >
            <td style="padding-top: 10px; padding-bottom: 10px; border-bottom: 1px dashed #000000; max-width: 170px">{{ $pupil->firstname }}</td>
            <td style="padding-top: 10px; padding-bottom: 10px; border-bottom: 1px dashed #000000; max-width: 170px">{{ $pupil->lastname }}</td>
            <td style="padding-top: 10px; padding-bottom: 10px; border-bottom: 1px dashed #000000; max-width: 170px">{{ $pupil->cemis_num }}</td>
            <td style="padding-top: 10px; padding-bottom: 10px; border-bottom: 1px dashed #000000; max-width: 170px">{{ $pupil->dob }}</td>
            <td style="padding-top: 10px; padding-bottom: 10px; border-bottom: 1px dashed #000000; max-width: 170px; text-transform: uppercase; text-align: center">{{ $pupil->language }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
