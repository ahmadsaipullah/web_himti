@extends('dashboard.kerangka')
@section('tittle', 'HIMTI-UMT | Dashboard | Alumni')
@section('alumni', 'active')
@section('content')
    @include('sweetalert::alert')
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="py-2">
                    <h2 class="text-center">Table Alumni</h2>
                    <hr>
                    <a href="{{ route('alumni.create') }}" class="btn btn-primary">Create Alumni</a>
                    <div class="text-right my-4">
                        <a href="#" class="btn btn-success">Excel</a>
                        <a href="#" class="btn btn-danger">PDF</a>
                    </div>
                </div>
                {{-- search --}}
                <div class="mb-4">
                    <form action="{{ route('cari-alumni') }}" method="GET"
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
                                <th>perusahaan</th>
                                <th>title</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($alumnis as $key => $alumni)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><a class="btn"
                                            href="{{ route('alumni.show', $alumni->id) }}">{{ $alumni->nama }}</a></td>
                                    <td>{{ $alumni->perusahaan }}</td>
                                    <td>{{ $alumni->title }}</td>
                                    <td><img src="{{ Storage::url($alumni->image) }}" alt="gambar" width="150px"
                                            class="tumbnail img-fluid"></td>
                                    <td>
                                        <a href="{{ route('alumni.edit', $alumni->id) }}" class="btn btn-success btn-sm">
                                            <i class='fas fa-edit'></i></a>
                                        <form action="{{ route('alumni.destroy', $alumni->id) }}" method="POST"
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
                        {{ $alumnis->firstItem() }}
                        of
                        {{ $alumnis->lastItem() }}
                    </div>
                    <div class="py-4">
                        {{ $alumnis->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
