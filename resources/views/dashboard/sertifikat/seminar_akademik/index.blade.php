@extends('dashboard.kerangka')
@section('tittle', 'HIMTI-UMT | Dashboard | Sertifikat')
@section('sertifikat', 'active')
@section('content')
    @include('sweetalert::alert')

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="py-2">
                    <h2 class="text-center">Table Sertifikat</h2>
                    <hr>
                    <a href="{{ route('sertifikat.create') }}" class="btn btn-primary">Create sertifikat</a>
                    <div class="text-right my-4">
                        {{-- <a href="{{ route('sertifikat.pdf') }}" class="btn btn-danger">PDF</a> --}}
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-sm text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Qr Code</th>
                                <th>Nama Peserta</th>
                                <th>Nim</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($sertifikats as $key => $sertifikat)
                                <tr>
                                    <td>{{ $sertifikats->firstItem() + $key }}</td>
                                    <td>{!! QrCode::size(100)->generate($sertifikat->id) !!}</td>
                                    <td><a class="btn"
                                            href="{{ route('sertifikat.show', $sertifikat->id) }}">{{ $sertifikat->nama_peserta }}</a>
                                    </td>
                                    <td>{{ $sertifikat->nim }}</td>
                                    <td>
                                        <a href="{{ route('sertifikat.edit', $sertifikat->id) }}"
                                            class="btn btn-success btn-sm">
                                            <i class='fas fa-edit'></i></a>
                                        <form action="{{ route('sertifikat.destroy', $sertifikat->id) }}" method="POST"
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
                        {{ $sertifikats->firstItem() }}
                        of
                        {{ $sertifikats->lastItem() }}
                    </div>
                    <div class="py-4">
                        {{ $sertifikats->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
