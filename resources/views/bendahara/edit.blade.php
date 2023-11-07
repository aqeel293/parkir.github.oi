@extends('layouts.bdtable')

@section('contents')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h1 class="card-header">Edit Data</h1>
                <form action="{{ route('bendahara.update', $kolektor->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label">ID</label>
                            <input type="text" name="id" class="form-control" placeholder="ID" value="{{ $kolektor->id }}" readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control" placeholder="Nama" value="{{ $kolektor->nama }}" readonly>
                        </div>
                        <!-- Form elements for other fields -->
                        <div class="form-group">
                            <label class="form-label">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" placeholder="Tanggal" value="{{ $kolektor->tanggal }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Kategori Anda</label>
                            <select class="form-control" name="kategori">
                                <option value="OTS" selected>OTS</option>
                                <option value="Mandiri">Mandiri</option>
                                <option value="Stiker">Stiker</option>
                                <!-- Tambahkan opsi-opsi lain jika diperlukan -->
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Jumlah</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input type="text" name="jumlah" class="form-control" placeholder="Jumlah" value="{{ $kolektor->jumlah }}">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Keterangan</label>
                            <textarea class="form-control" name="keterangan" placeholder="Keterangan">{{ $kolektor->keterangan }}</textarea>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Status</label>
                            <input type="text" name="status" class="form-control" placeholder="Status" value="{{ $kolektor->status }}" >
                        </div>
                        {{-- <div class="d-grid">
                            <button class="btn btn-warning" type="submit">Update</button>
                        </div> --}}
                        <div class="form-group">
                            <button class="btn btn-warning" type="submit">Update</button>
                            <button type="button" class="btn btn-primary" onclick="window.location.href='{{ route('bendahara') }}'">Kembali</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection