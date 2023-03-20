<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Anggota HIMTI UMT</title>

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
        <h5 style="margin-button: 5px">Data Anggota HIMTI UMT</h5>
    </center>
    <table class='table table-bordered'>
        <thead>
            <tr class="text-center">
                <th style="width: 2%">No</th>
                <th class="text-uppercase">Nama</th>
                <th>Email</th>
                <th>Nim</th>
                <th>No_Hp</th>
                <th>No_Darurat</th>
                <th>Alamat</th>
                <th>Angkatan</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($anggotas as $anggota)
                <tr class="text-center">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $anggota->nama }}</td>
                    <td>{{ $anggota->email }}</td>
                    <td>{{ $anggota->nim }}</td>
                    <td>{{ $anggota->no_hp }}</td>
                    <td>{{ $anggota->no_darurat }}</td>
                    <td>{{ $anggota->no_alamat }}</td>
                    <td>{{ $anggota->angkatan->angkatan }}</td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>

</body>

</html>
