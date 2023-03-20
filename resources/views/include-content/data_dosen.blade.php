@extends('kerangka.master')
@section('tittle', 'HIMTI-UMT | Dosen')
@section('menuDosen', 'active')
@section('content')

    <div class="content-wrapper">
        <div class="container">
            <div class="section-title mt-4" data-aos="fade-up">
                <h2>HIMTI</h2>
                <p>Data Dosen</p>
            </div>
            <div class="my-4">
                <form action="{{ route('cari') }}" method="GET">
                    <input type="text" name="cari" placeholder="Cari Dosen" value="{{ old('cari') }}">
                    <button class="btn-primary" type="submit">
                        <i class="mdi mdi-search-web"></i>
                    </button>
                </form>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-sm text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nidn</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No_Hp</th>
                            <th>Mata Kuliah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dosens as $key => $dosen)
                            <tr>
                                <td>{{ $dosens->firstItem() + $key }}</td>
                                <td>{{ $dosen->nidn }}</td>
                                <td>{{ $dosen->nama }}</td>
                                <td>{{ $dosen->email }}</td>
                                <td>{{ $dosen->no_hp }}</td>
                                <td>{{ $dosen->matakuliah }}</td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Cooming Soon</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div>
                    showing
                    {{ $dosens->firstItem() }}
                    of
                    {{ $dosens->lastItem() }}
                </div>
                <div class="py-4">
                    {{ $dosens->links() }}
                </div>
            </div>
        </div>
    </div>
    {{-- end visi misi --}}
@endsection
