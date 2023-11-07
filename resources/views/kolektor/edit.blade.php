@extends('layouts.kltable')

@section('contents')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h1 class="card-header">Edit Data </h1>
                <form action="{{ route('kolektor.update', $kolektor->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label">ID Penyetor</label>
                            <input type="text" name="id" class="form-control" placeholder="ID" value="{{ $kolektor->id }}" readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Nama Penyetor</label>
                            <input type="text" name="nama" class="form-control" placeholder="Nama" value="{{ $kolektor->nama }}" readonly>
                        </div>
                        <!-- Form elements for other fields -->
                        <div class="form-group">
                            <label class="form-label">Tanggal Setoram</label>
                            <input type="date" name="tanggal" class="form-control" placeholder="Tanggal" value="{{ $kolektor->tanggal }}" readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Kategori Penyetor</label>
                            <input type="text" name="kategori" class="form-control" placeholder="OTS" value="{{ $kolektor->kategori }}" readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Jumlah Setoran</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input type="text" name="jumlah" class="form-control" placeholder="Jumlah" value="{{ $kolektor->jumlah }}"readonly>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Keterangan</label>
                            <textarea class="form-control" name="keterangan" placeholder="Keterangan" readonly>{{ $kolektor->keterangan }}</textarea>
                        </div>
                        
                        <div class="d-grid">
                            <button class="btn btn-warning" type="submit">Update</button>
                            <button type="button" class="btn btn-primary" onclick="window.location.href='{{ route('kolektor') }}'">Kembali</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection