@extends('layouts.pengunjung')

@section('contents')

<div class="d-flex align-items-center justify-content-between">
    <h1 class="mb-0">Project Siswa Magang Diskominfo Batam</h1>
</div>

<hr />

<div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            {{-- <th>Nis</th> --}}
                            <th>Nama</th>
                            <th>Asal Sekolah</th>
                            <th>Jenis Kelamin</th>
                            <th>Jurusan</th>
                            <th>Hasil Project</th>
                            <th>Deskripsi Project</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($magangData->count() > 0)
                        @foreach($magangData as $mg)
                        <tr>
                            <td class="align-middle">{{ $loop->iteration }}</td>
                            {{-- <td class="align-middle">{{ $mg->nis }}</td> --}}
                            <td class="align-middle">{{ $mg->nama }}</td>
                            <td class="align-middle">{{ $mg->asal_sekolah }}</td>
                            <td class="align-middle">{{ $mg->jenis_kelamin }}</td>
                            <td class="align-middle">{{ $mg->jurusan }}</td>
                            <td class="align-middle">
                                @if ($mg->foto)
                                <img style="max-width: 150px; max-height: 150px" src="{{ Storage::url('public/asset/foto/' . $mg->foto) }}?t={{ time() }}" alt="{{ $mg->nama }}" />

                            @else
                                No Image
                            @endif
                            </td>
                            <td class="align-middle">{{ $mg->description }}</td>
                            <td class="align-middle">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ route('pengunjungs.show', $mg->nis) }}" type="button"
                                        class="btn btn-info">Detail</a>
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
