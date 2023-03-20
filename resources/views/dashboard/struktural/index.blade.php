@extends('dashboard.kerangka')
@section('tittle', 'HIMTI-UMT | Dashboard | Struktural')
@section('struktural', 'active')
@section('content')
    @include('sweetalert::alert')
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="py-2">
                    <h2 class="text-center">Table Struktural</h2>
                    <hr>
                    <a href="{{ route('struktural.create') }}" class="btn btn-primary">Create Struktural</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-sm text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Nim</th>
                                <th>Jabatan</th>
                                <th>Angkatan</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Instagram</th>
                                <th>Twitter</th>
                                <th>Facebook</th>
                                <th>Linkedin</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($strukturals as $key => $struktural)
                                <tr>
                                    <td>{{ $strukturals->firstItem() + $key }}</td>
                                    <td><a class="btn"
                                            href="{{ route('struktural.show', $struktural->id) }}">{{ $struktural->nama }}</a>
                                    </td>
                                    <td>{{ $struktural->nim }}</td>
                                    <td>{{ $struktural->jabatan }}</td>
                                    <td>{{ $struktural->angkatan->angkatan }}</td>
                                    <td>{{ $struktural->status }}</td>
                                    <td><img src="{{ Storage::url($struktural->image) }}" alt="gambar" width="150px"
                                            class="tumbnail img-fluid"></td>
                                    <td>{{ $struktural->ig }}</td>
                                    <td>{{ $struktural->twitter }}</td>
                                    <td>{{ $struktural->fb }}</td>
                                    <td>{{ $struktural->linkedin }}</td>
                                    <td>
                                        <a href="{{ route('struktural.edit', $struktural->id) }}"
                                            class="btn btn-success btn-sm">
                                            <i class='fas fa-edit'></i></a>
                                        <form action="{{ route('struktural.destroy', $struktural->id) }}" method="POST"
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
                                    <td colspan="12" class="text-center">Data Kosong</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        showing
                        {{ $strukturals->firstItem() }}
                        of
                        {{ $strukturals->lastItem() }}
                    </div>
                    <div class="py-4">
                        {{ $strukturals->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
