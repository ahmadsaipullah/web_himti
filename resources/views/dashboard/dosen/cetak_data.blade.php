<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Dosen Informatika UMT</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h5 style="margin-button: 5px">Data Dosen Informatika UMT</h5>
    </center>
    <table class='table table-bordered'>
        <thead>
            <tr class="text-center">
                <th style="width: 2%">No</th>
                <th>Nidn</th>
                <th class="text-uppercase">Nama</th>
                <th>Email</th>
                <th>No_Hp</th>
                <th>Mata Kuliah</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($dosens as $dosen)
                <tr class="text-center">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $dosen->nidn }}</td>
                    <td>{{ $dosen->nama }}</td>
                    <td>{{ $dosen->email }}</td>
                    <td>{{ $dosen->no_hp }}</td>
                    <td>{{ $dosen->matakuliah }}</td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>

</body>

</html>
