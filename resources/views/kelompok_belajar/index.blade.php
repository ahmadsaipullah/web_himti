@extends('dashboard.kerangka')
@section('tittle', 'HIMTI-UMT | Dashboard | Kelompok Belajar')
@section('kelompokbelajar', 'active')
@section('content')
    @include('sweetalert::alert')

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="py-2">
                    <h2 class="text-center">Table Kelompok Belajar</h2>
                </div>
                <div class="text-right my-4">
                    <a href="{{ route('kelompokbelajar.excel') }}" class="btn btn-success">Excel</a>
                    <a href="{{ route('kelompokbelajar.pdf') }}" class="btn btn-danger">PDF</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-sm text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Nim</th>
                                <th>Email</th>
                                <th>Kelas</th>
                                <th>Angkatan</th>
                                <th>Bidang</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($kelompokbelajar as $key => $kb)
                                <tr>
                                    <td>{{ $kelompokbelajar->firstItem() + $key }}</td>
                                    <td>{{ $kb->nama }}</td>
                                    <td>{{ $kb->nim }}</td>
                                    <td>{{ $kb->email }}</td>
                                    <td>{{ $kb->kelas }}</td>
                                    <td>{{ $kb->angkatan }}</td>
                                    <td>{{ $kb->bidang }}</td>
                                    <td>
                                        <img src="{{ Storage::url($kb->image) }}" alt="gambar" width="150px"
                                            class="tumbnail img-fluid">
                                    </td>
                                    <td>
                                        <a href="{{ route('kelompokbelajar.edit', $kb->id) }}"
                                            class="btn btn-success btn-sm">
                                            <i class='fas fa-edit'></i></a>
                                        <form action="{{ route('kelompokbelajar.destroy', $kb->id) }}" method="POST"
                                            class="pt-1">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm delete_confirm">
                                                <i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">Data Kosong</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        showing
                        {{ $kelompokbelajar->firstItem() }}
                        of
                        {{ $kelompokbelajar->lastItem() }}
                    </div>
                    <div class="py-4">
                        {{ $kelompokbelajar->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
