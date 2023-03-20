@extends('dashboard.kerangka')
@section('tittle', 'HIMTI-UMT | Dashboard | Dosen')
@section('dosen', 'active')
@section('content')
    @include('sweetalert::alert')
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="py-2">
                    <h2 class="text-center">Table Dosen</h2>
                    <hr>
                    <a href="{{ route('dosen.create') }}" class="btn btn-primary">Create Dosen</a>
                    <div class="text-right my-4">
                        <a href="{{ route('import-data.dosen') }}"class="btn btn-warning">Import</a>
                        <a href="{{ route('dosen.excel') }}" class="btn btn-success">Excel</a>
                        <a href="{{ route('dosen.pdf') }}" class="btn btn-danger">PDF</a>
                    </div>
                </div>
                {{-- search --}}
                <div class="mb-4">
                    <form action="{{ route('cari-dosen') }}" method="GET"
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
                                <th>Nidn</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No_Hp</th>
                                <th>Mata Kuliah</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($dosens as $key => $dosen)
                                <tr>
                                    <td>{{ $dosens->firstItem() + $key }}</td>
                                    <td>{{ $dosen->nidn }}</td>
                                    <td><a class="btn"
                                            href="{{ route('dosen.show', $dosen->id) }}">{{ $dosen->nama }}</a></td>
                                    <td>{{ $dosen->email }}</td>
                                    <td>{{ $dosen->no_hp }}</td>
                                    <td>{{ $dosen->matakuliah }}</td>
                                    <td>
                                        <a href="{{ route('dosen.edit', $dosen->id) }}" class="btn btn-success btn-sm">
                                            <i class='fas fa-edit'></i></a>
                                        <form action="{{ route('dosen.destroy', $dosen->id) }}" method="POST"
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
                                    <td colspan="6" class="text-center">Data Kosong</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        showing
                        {{ $dosens->firstItem() }}
                        of
                        {{ $dosens->lastItem() }}
                    </div>
                    <div class="py-4">
                        {{ $dosens->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
