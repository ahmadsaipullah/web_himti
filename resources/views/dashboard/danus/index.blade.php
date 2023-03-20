@extends('dashboard.kerangka')
@section('tittle', 'HIMTI-UMT | Dashboard | Danus Slider')
@section('danus', 'active')
@section('content')
    @include('sweetalert::alert')

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="py-2">
                    <h2 class="text-center">Table Slider</h2>
                    <hr>
                    <a href="{{ route('danus-slider.create') }}" class="btn btn-primary">Create Slider</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-sm text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($danus_slider as $key => $sr)
                                <tr>
                                    <td>{{ $danus_slider->firstItem() + $key }}</td>
                                    <td>{{ $sr->title }}</td>
                                    <td> <img src="{{ Storage::url($sr->image) }}" alt="gambar" width="150px"
                                            class="tumbnail img-fluid"></td>
                                    <td>
                                        <a href="{{ route('danus-slider.edit', $sr->id) }}" class="btn btn-success btn-sm">
                                            <i class='fas fa-edit'></i></a>
                                        <form action="{{ route('danus-slider.destroy', $sr->id) }}" method="POST"
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
                        {{ $danus_slider->firstItem() }}
                        of
                        {{ $danus_slider->lastItem() }}
                    </div>
                    <div class="py-4">
                        {{ $danus_slider->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
