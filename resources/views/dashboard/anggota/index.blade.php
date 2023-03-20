@extends('dashboard.kerangka')
@section('tittle', 'HIMTI-UMT | Dashboard | Anggota')
@section('anggota', 'active')
@section('content')
    @include('sweetalert::alert')
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="py-2">
                    <h2 class="text-center">Table Anggota</h2>
                    <hr>
                    <a href="{{ route('anggota.create') }}" class="btn btn-primary">Create Anggota</a>
                    <div class="text-right my-4">
                        <a href="{{ route('anggota.excel') }}" class="btn btn-success">Excel</a>
                        <a href="{{ route('anggota.pdf') }}" class="btn btn-danger">PDF</a>
                    </div>
                </div>
                {{-- search --}}
                <div class="mb-4">
                    <form action="{{ route('cari-anggota') }}" method="GET"
                        class="d-none d-sm-inline-block form-inline mr-auto  my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" name="cari" value="{{ old('cari') }}"
                                class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search"
                                aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn bg-gradient-primary" type="submit">
                                    <i class="fas fa-search fa-sm text-white"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                {{-- Ahkir Search --}}
                <div class="table-responsive">
                    <table class="table table-bordered table-sm text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Nim</th>
                                <th>No_Hp</th>
                                <th>No_Darurat</th>
                                <th>No_Alamat</th>
                                <th>Id Angkatan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($anggotas as $key => $anggota)
                                <tr>
                                    <td>{{ $anggotas->firstItem() + $key }}</td>
                                    <td><a class="btn"
                                            href="{{ route('anggota.show', $anggota->id) }}">{{ $anggota->nama }}</a></td>
                                    <td>{{ $anggota->email }}</td>
                                    <td>{{ $anggota->nim }}</td>
                                    <td>{{ $anggota->no_hp }}</td>
                                    <td>{{ $anggota->no_darurat }}</td>
                                    <td>{{ $anggota->alamat }}</td>
                                    <td>{{ $anggota->angkatan->angkatan }}</td>
                                    <td>
                                        <a href="{{ route('anggota.edit', $anggota->id) }}" class="btn btn-success btn-sm">
                                            <i class='fas fa-edit'></i></a>
                                        <form action="{{ route('anggota.destroy', $anggota->id) }}" method="POST"
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
                        {{ $anggotas->firstItem() }}
                        of
                        {{ $anggotas->lastItem() }}
                    </div>
                    <div class="py-4">
                        {{ $anggotas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
