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
                        <a href="{{ route('dosen.excel') }}" class="btn btn-success">Excel</a>
                        <a href="{{ route('dosen.pdf') }}" class="btn btn-danger">PDF</a>
                    </div>
                </div>
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
