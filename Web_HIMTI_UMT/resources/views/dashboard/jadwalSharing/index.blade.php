@extends('dashboard.kerangka')
@section('tittle','HIMTI-UMT | Dashboard | Jadwal Sharing')
@section('jadwalSharing','active')
@section('content')
@include('sweetalert::alert')

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="py-2">
                    <h2 class="text-center">Table Jadwal Sharing</h2>
                    <hr>
                    <a href="{{ route('jadwal-sharing.create')}}" class="btn btn-primary">Create Jadwal Sharing</a>
                </div>
                <div class="table-responsive">
                <table class="table table-bordered table-sm text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tittle</th>
                            <th>Deskripsi</th>
                            <th>Jadwal</th>
                            <th>Kategori</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse ($sharings as $key => $sharing)
                            <tr>
                                <td>{{ $sharings->firstItem() + $key}}</td>
                                <td><a class="btn" href="{{ route('jadwal-sharing.show', $sharing->id)}}">{{ $sharing->tittle }}</a></td>
                                <td>{{ $sharing->deskripsi }}</td>
                                <td>{{ $sharing->jadwal }}</td>
                                <td>{{ $sharing->kategori->nama_kategori }}</td>
                                <td>
                                    <img src="{{ Storage::url($sharing->image) }}" alt="gambar" width="150px" class="tumbnail img-fluid">
                                </td>
                                <td>
                                    <a href="{{ route('jadwal-sharing.edit', $sharing->id)}}" class="btn btn-success btn-sm">
                                        <i class='fas fa-edit'></i></a>
                                    <form action="{{ route('jadwal-sharing.destroy', $sharing->id)}}" method="POST" class="pt-1">
                                            @csrf
                                            @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm delete_confirm">
                                        <i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                    @empty
                            <tr>
                                    <td colspan="7" class="text-center" >Data Kosong</td>
                            </tr>
                    @endforelse
                    </tbody>
                </table>
                <div>
                     showing
                     {{$sharings->firstItem()}}
                     of
                     {{$sharings->lastItem()}}
                        </div>
                <div class="py-4">
                    {{ $sharings->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
