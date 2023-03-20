@extends('dashboard.kerangka')
@section('tittle', 'HIMTI-UMT | Dashboard | Danus Merchandise')
@section('merchandise', 'active')
@section('content')
    @include('sweetalert::alert')

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="py-2">
                    <h2 class="text-center">Table Merchandise</h2>
                    <hr>
                    <a href="{{ route('danus-merchandise.create') }}" class="btn btn-primary">Create Merchandise</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-sm text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Harga</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($danus_merchandise as $key => $merch)
                                <tr>
                                    <td>{{ $danus_merchandise->firstItem() + $key }}</td>
                                    <td>{{ $merch->title }}</td>
                                    <td>{{ $merch->harga }}</td>
                                    <td> <img src="{{ Storage::url($merch->image) }}" alt="gambar" width="150px"
                                            class="tumbnail img-fluid"></td>
                                    <td>
                                        <a href="{{ route('danus-merchandise.edit', $merch->id) }}"
                                            class="btn btn-success btn-sm">
                                            <i class='fas fa-edit'></i></a>
                                        <form action="{{ route('danus-merchandise.destroy', $merch->id) }}" method="POST"
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
                        {{ $danus_merchandise->firstItem() }}
                        of
                        {{ $danus_merchandise->lastItem() }}
                    </div>
                    <div class="py-4">
                        {{ $danus_merchandise->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
