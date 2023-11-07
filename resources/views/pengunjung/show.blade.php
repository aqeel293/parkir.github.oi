@extends('layouts.pengunjung')

@section('contents')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Detail Data Magang</h1>
                </div>
                <div class="card-body">
                    {{-- <div class="form-group">
                        <label class="form-label">Nis</label>
                        <input type="text" class="form-control" placeholder="Nis" value="{{ $magangDetail->nis }}" readonly>
                    </div> --}}
                    <div class="form-group">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" placeholder="Nama" value="{{ $magangDetail->nama }}" readonly>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Asal Sekolah</label>
                        <input type="text" class="form-control" placeholder="Asal Sekolah" value="{{ $magangDetail->asal_sekolah }}" readonly>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Jenis Kelamin</label>
                        <input type="text" class="form-control" placeholder="Jenis Kelamin" value="{{ $magangDetail->jenis_kelamin }}" readonly>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Jurusan</label>
                        <input type="text" class="form-control" placeholder="Jurusan" value="{{ $magangDetail->jurusan }}" readonly>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Hasil Project</label>
                        <p></p>
                        <img style="max-width: 300px; max-height: 300px" src="{{ Storage::url('public/asset/foto/' . $magangDetail->foto) }}?t={{ time() }}" alt="{{ $magangDetail->nama }}" />
                    </div>
                    <div class="form-group">
                        <label class="form-label">Deskripsi Project</label>
                        <textarea class="form-control" placeholder="Description" readonly>{{ $magangDetail->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Dibuat Pada</label>
                        <input type="text" class="form-control" placeholder="Created At" value="{{ $magangDetail->created_at }}" readonly>
                    </div>
                    {{-- <div class="form-group">
                        <label class="form-label">Diperbarui Pada</label>
                        <input type="text" class="form-control" placeholder="Updated At" value="{{ $magangDetail->updated_at }}" readonly>
                    </div> --}}
                    <div class="form-group">
                        <button type="button" class="btn btn-primary" onclick="window.history.back()">Kembali</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
