@extends('dashboard.kerangka')
@section('tittle','HIMTI-UMT | Dashboard | Artikel')
@section('artikel','active')
@section('content')
@include('sweetalert::alert')

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="py-2">
                    <h2 class="text-center">Table Artikel</h2>
                    <hr>
                    <a href="{{ route('artikel.create')}}" class="btn btn-primary">Create Artikel</a>
                </div>
                <div class="table-responsive">
                <table class="table table-bordered table-sm text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tittle</th>
                            <th>Deskripsi</th>
                            <th>Kategori</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse ($artikels as $key => $artikel)
                            <tr>
                                <td>{{ $artikels->firstItem() + $key}}</td>
                                <td><a class="btn" href="{{ route('artikel.show', $artikel->id)}}">{{ $artikel->tittle }}</a></td>
                                <td>{{ $artikel->deskripsi }}</td>
                                <td>{{ $artikel->kategori->nama_kategori }}</td>
                                <td>
                                    <img src="{{ Storage::url($artikel->image) }}" alt="gambar" width="150px" class="tumbnail img-fluid">
                                </td>
                                <td>
                                    <a href="{{ route('artikel.edit', $artikel->id)}}" class="btn btn-success btn-sm">
                                        <i class='fas fa-edit'></i></a>
                                    <form action="{{ route('artikel.destroy', $artikel->id)}}" method="POST" class="pt-1">
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
                     {{$artikels->firstItem()}}
                     of
                     {{$artikels->lastItem()}}
                        </div>
                <div class="py-4">
                    {{ $artikels->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
