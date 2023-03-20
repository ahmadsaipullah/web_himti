@extends('dashboard.kerangka')
@section('tittle', 'HIMTI-UMT | Dashboard | Admin')
@section('admin', 'active')
@section('content')
    @include('sweetalert::alert')

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="py-2">
                    <h2 class="text-center">Table Admin</h2>
                    <hr>
                    <a href="{{ route('admin.create') }}" class="btn btn-primary">Create Admin</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-sm text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No Hp</th>
                                <th>level</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($admins as $key => $admin)
                                <tr>
                                    <td>{{ $admins->firstItem() + $key }}</td>
                                    <td>{{ $admin->name }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td>{{ $admin->no_hp }}</td>
                                    <td>{{ $admin->level->level }}</td>
                                    <td>

                                        @if (Auth()->user()->image)
                                            <img src="{{ Storage::url($admin->image) }}" alt="gambar" width="150px"
                                                class="tumbnail img-fluid">
                                        @else
                                            <img alt="image" class="img-fluid tumbnail"
                                                src="{{ asset('assets/images/user_default.png') }}" width="150px"
                                                class="tumbnail img-fluid">
                                        @endif

                                    </td>
                                    <td>
                                        <a href="{{ route('admin.edit', $admin->id) }}" class="btn btn-success btn-sm">
                                            <i class='fas fa-edit'></i></a>
                                        <form action="{{ route('admin.destroy', $admin->id) }}" method="POST"
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
                                    <td colspan="9" class="text-center">Data Kosong</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        showing
                        {{ $admins->firstItem() }}
                        of
                        {{ $admins->lastItem() }}
                    </div>
                    <div class="py-4">
                        {{ $admins->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
