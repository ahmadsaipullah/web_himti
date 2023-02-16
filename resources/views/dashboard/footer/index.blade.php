@extends('dashboard.kerangka')
@section('tittle', 'HIMTI-UMT | Dashboard | Footer')
@section('footer', 'active')
@section('content')
    @include('sweetalert::alert')
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="py-2">
                    <h2 class="text-center">Table Footer</h2>
                    <hr>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-sm text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Email</th>
                                <th>Information</th>
                                <th>Copyringht</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($footers as $footer)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $footer->email }} </td>
                                    <td>{{ $footer->information }} </td>
                                    <td>{{ $footer->copyright }} </td>
                                    <td>
                                        <a href="{{ route('footer.edit', $footer->id) }}" class="btn btn-success btn-sm">
                                            <i class='fas fa-edit'></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Data Kosong</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
