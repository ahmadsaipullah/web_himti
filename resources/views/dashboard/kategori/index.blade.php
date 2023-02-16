@extends('dashboard.kerangka')
@section('tittle', 'HIMTI-UMT | Dashboard | Kategori')
@section('kategori', 'active')
@section('content')
    @include('sweetalert::alert')

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="py-2">
                    <h2 class="text-center">Table Kategori</h2>
                    <hr>

                    <a href="{{ route('kategori.create') }}" class="btn btn-primary">Create Kategori</a>
                    <div class="text-right my-4">
                        <a href="{{ route('kategori.excel') }}" class="btn btn-success">Excel</a>
                        <a href="{{ route('kategori.pdf') }}" class="btn btn-danger">PDF</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-sm text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kategori</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($kategoris as $key => $kategori)
                                <tr>
                                    <td>{{ $kategoris->firstItem() + $key }}</td>
                                    <td>
                                        <a class="btn"
                                            href="{{ route('angkatan.show', $kategori->id) }}">{{ $kategori->nama_kategori }}</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('kategori.edit', $kategori->id) }}"
                                            class="btn btn-success btn-sm">
                                            <i class='fas fa-edit'></i></a>
                                        <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST"
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
                                    <td colspan="7" class="text-center">Data Kosong</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        showing
                        {{ $kategoris->firstItem() }}
                        of
                        {{ $kategoris->lastItem() }}
                    </div>
                    <div class="py-4">
                        {{ $kategoris->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
