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
        <h5 style="margin-button: 5px">Data Kelompok Belajar HIMTI UMT</h5>
    </center>
    <table class='table table-bordered'>
        <thead>
            <tr class="text-center">
                <th style="width: 2%">No</th>
                <th class="text-uppercase">Nama</th>
                <th>Nim</th>
                <th>Email</th>
                <th>Kelas</th>
                <th>Angkatan</th>
                <th>Bidang</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kelompokbelajar as $kb)
                <tr class="text-center">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $kb->nama }}</td>
                    <td>{{ $kb->nim }}</td>
                    <td>{{ $kb->email }}</td>
                    <td>{{ $kb->kelas }}</td>
                    <td>{{ $kb->angkatan }}</td>
                    <td>{{ $kb->bidang }}</td>
                    <td><img src="{{ public_path(Storage::url($kb->image)) }}" alt="gambar" width="100px"></td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>

</body>

</html>
