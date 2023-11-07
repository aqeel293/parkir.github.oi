@extends('layouts.bdtable')

@section('contents')

<div class="d-flex align-items-center justify-content-between">
    <h1 class="mb-0">Data Bendahara</h1>
</div>
<hr />

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{ route('bendahara.create') }}"><button type="button" class="btn btn-success">Tambah Data</button></a>
    </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Penyetor</th>
                            <th>Nama Penyetor</th>
                            <th>Tanggal Setor</th>
                            <th>Kategori</th>
                            <th>Jumlah Setoran</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($kolektor->count() > 0)
                        @foreach($kolektor as $kl)
                        <tr>
                            <td class="align-middle">{{ $loop->iteration }}</td>
                            <td class="align-middle">{{ $kl->id }}</td>
                            <td class="align-middle">{{ $kl->nama }}</td>
                            <td class="align-middle">{{ $kl->tanggal }}</td>
                            <td class="align-middle">{{ $kl->kategori }}</td>
                            <td class="align-middle">{{ $kl->jumlah }}</td>
                            <td class="align-middle">{{ $kl->keterangan }}</td>
                            <td class="align-middle">{{ $kl->status }}</td>
                            <td class="align-middle">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ route('bendahara.show', $kl->id) }}" type="button" class="btn btn-info">Detail</a>
                                    <a href="{{ route('bendahara.edit', $kl->id)}}" type="button" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('bendahara.destroy', $kl->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
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
