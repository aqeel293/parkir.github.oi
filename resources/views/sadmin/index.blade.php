@extends('layouts.satable')

@section('contents')

<div class="d-flex align-items-center justify-content-between">
    <h1 class="mb-0">Data Role</h1>
</div>

<hr />

<div class="card shadow mb-4">
    <div class="card-header py-3">
        {{-- <a href="{{ route('sadmin.create') }}"><button type="button" class="btn btn-success">Tambah Data</button></a> --}}
    </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($user->count() > 0)
                        @foreach($user as $us)
                        <tr>
                            <td class="align-middle">{{ $loop->iteration }}</td>
                            <td class="align-middle">{{ $us->name }}</td>
                            <td class="align-middle">{{ $us->email }}</td>
                            <td class="align-middle">{{ $us->role }}</td>
                            <td class="align-middle">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ route('sadmin.show', $us->id) }}" type="button" class="btn btn-info">Detail</a>
                                    <a href="{{ route('sadmin.edit', $us->id)}}" type="button" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('sadmin.destroy', $us->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger m-0">Delete</button>
                                    </form>
                                </div>
                            </td>  
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td class="text-center" colspan="8">Data not found</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
