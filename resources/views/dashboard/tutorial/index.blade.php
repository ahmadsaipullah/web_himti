@extends('dashboard.kerangka')
@section('tittle', 'HIMTI-UMT | Dashboard | Tutorial')
@section('tutorial', 'active')
@section('content')
    @include('sweetalert::alert')

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="py-2">
                    <h2 class="text-center">Table Tutorial</h2>
                    <hr>
                    <a href="{{ route('tutorial.create') }}" class="btn btn-primary">Create Kategori</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-sm text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Link</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tutorials as $key => $tutorial)
                                <tr>
                                    <td>{{ $tutorials->firstItem() + $key }}</td>
                                    <td>{{ $tutorial->judul }}</td>
                                    <td>{{ $tutorial->link }}</td>
                                    <td>
                                        <a href="{{ route('tutorial.edit', $tutorial->id) }}" class="btn btn-success btn-sm">
                                            <i class='fas fa-edit'></i></a>
                                        <form action="{{ route('tutorial.destroy', $tutorial->id) }}" method="POST"
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
                        {{ $tutorials->firstItem() }}
                        of
                        {{ $tutorials->lastItem() }}
                    </div>
                    <div class="py-4">
                        {{ $tutorials->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
