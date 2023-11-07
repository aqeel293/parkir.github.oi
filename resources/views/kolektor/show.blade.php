@extends('layouts.kltable')

@section('contents')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Detail Data</h1>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label">ID Penyetor</label>
                        <input type="text" class="form-control" placeholder="ID" value="{{ $kolektor->id }}" readonly>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Nama Penyetor</label>
                        <input type="text" class="form-control" placeholder="Nama" value="{{ $kolektor->nama }}" readonly>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Tanggal Setor</label>
                        <input type="text" class="form-control" placeholder="Tanggal" value="{{ $kolektor->tanggal }}" readonly>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Kategori Penyetor</label>
                        <input type="text" class="form-control" placeholder="OTS" value="{{ $kolektor->kategori }}" readonly>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Jumlah Setoran</label>
                        <input type="text" class="form-control" placeholder="Jumlah" value="{{ $kolektor->jumlah }}" readonly>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Keterangan</label>
                        <input type="text" class="form-control" placeholder="Keterangan" value="{{ $kolektor->keterangan }}" readonly>
                    </div>  
                    <div class="form-group">
                        <button type="button" class="btn btn-primary" onclick="window.history.back()">Kembali</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
