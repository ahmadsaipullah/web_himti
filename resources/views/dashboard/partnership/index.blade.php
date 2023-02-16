@extends('dashboard.kerangka')
@section('tittle', 'HIMTI-UMT | Dashboard | Partnership')
@section('partnership', 'active')
@section('content')
    @include('sweetalert::alert')
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="py-2">
                    <h2 class="text-center">Table Partnership</h2>
                    <hr>
                    <a href="{{ route('partnership.create') }}" class="btn btn-primary">Create Partnership</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-sm text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>perusahaan</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($partnerships as $key => $partnership)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $partnership->nama }}</td>
                                    <td>{{ $partnership->perusahaan }}</td>
                                    <td><img src="{{ Storage::url($partnership->image) }}" alt="gambar" width="150px"
                                            class="tumbnail img-fluid"></td>
                                    <td>
                                        <a href="{{ route('partnership.edit', $partnership->id) }}"
                                            class="btn btn-success btn-sm">
                                            <i class='fas fa-edit'></i></a>
                                        <form action="{{ route('partnership.destroy', $partnership->id) }}" method="POST"
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
                        {{ $partnerships->firstItem() }}
                        of
                        {{ $partnerships->lastItem() }}
                    </div>
                    <div class="py-4">
                        {{ $partnerships->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
