@extends('dashboard.kerangka')
@section('tittle','HIMTI-UMT | Dashboard | Anggota')
@section('anggota','active')
@section('content')
@include('sweetalert::alert')
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="py-2">
                    <h2 class="text-center">Table Anggota</h2>
                    <hr>
                    <a href="{{ route('anggota.create')}}" class="btn btn-primary">Create Anggota</a>
                </div>
                <div class="table-responsive">
                <table class="table table-bordered table-sm text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Nim</th>
                            <th>No_Hp</th>
                            <th>Email</th>
                            <th>Id Angkatan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse ($anggotas as $key => $anggota)
                            <tr>
                                <td>{{ $anggotas->firstItem() + $key}}</td>
                                <td><a class="btn" href="{{ route('anggota.show', $anggota->id)}}">{{ $anggota->nama }}</a></td>
                                <td>{{ $anggota->nim }}</td>
                                <td>{{ $anggota->no_hp }}</td>
                                <td>{{ $anggota->email }}</td>
                                <td>{{ $anggota->angkatan->angkatan}}</td>
                                <td>
                                    <a href="{{ route('anggota.edit', $anggota->id)}}" class="btn btn-success btn-sm">
                                        <i class='fas fa-edit'></i></a>
                                    <form action="{{ route('anggota.destroy', $anggota->id)}}" method="POST" class="pt-1">
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
                        {{$anggotas->firstItem()}}
                        of
                        {{$anggotas->lastItem()}}
                        </div>
                <div class="py-4">
                        {{ $anggotas->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
