@extends('dashboard.kerangka')
@section('tittle','HIMTI-UMT | Dashboard | Acara')
@section('acara','active')
@section('content')
@include('sweetalert::alert')
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="py-2">
                    <h2 class="text-center">Table Acara</h2>
                    <hr>
                    <a href="{{ route('acara.create')}}" class="btn btn-primary">Create Acara</a>
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
                    @forelse ($acaras as $key => $acara)
                            <tr>
                                <td>{{ $acaras->firstItem() + $key}}</td>
                                <td><a class="btn" href="{{ route('acara.show', $acara->id)}}">{{ $acara->tittle }}</a></td>
                                <td>{{ $acara->deskripsi }}</td>
                                <td>{{ $acara->kategori->nama_kategori }}</td>
                                <td>
                                    <img src="{{ Storage::url($acara->image) }}" alt="gambar" width="150px" class="tumbnail img-fluid">
                                </td>
                                <td>
                                    <a href="{{ route('acara.edit', $acara->id)}}" class="btn btn-success btn-sm">
                                        <i class='fas fa-edit'></i></a>
                                    <form action="{{ route('acara.destroy', $acara->id)}}" method="POST" class="pt-1">
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
                        {{$acaras->firstItem()}}
                        of
                        {{$acaras->lastItem()}}
                        </div>
                <div class="py-4">
                    {{ $acaras->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
