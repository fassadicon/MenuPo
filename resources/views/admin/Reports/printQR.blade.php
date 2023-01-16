<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student QRs</title>
    <style>
        * {
            display: inline-block;
            margin: 5px 2px 5px 2px;
        }
    </style>
</head>

<body>
    <table class="table table-sm">
        <thead>
            <tr>
                <th></th>
            </tr>

        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('storage/' . $student->QR))) }}" alt="" height="200px"></td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
