
@extends('layouts.kltable')
  
@section('title', '')
  
@section('contents')
    <div class="container"> 
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h1 class="card-header"> Tambah Data </h1>
    {{-- <h1 class="container">Tambah Data Project Siswa Magang</h1>
    <hr/> --}}
    <div class="card-body">

        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('kolektor.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-grup-row">
            {{-- <label class="col-md-4-text-md-6-right">Nama</label> --}}
            <div class="col-md-6">
                {{-- <input type="text" name="nama" class="form-control"> --}}
            </div>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Masukkan ID Anda</label>
            <input type="text" class="form-control" value="{{ old('id') }}" name="id" placeholder="ID">
          </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Masukkan Nama Anda</label>
            <input type="text" class="form-control" value="{{ old('nama') }}" name="nama" placeholder="Nama">
          </div>
        
          <div class="form-group">
            <label for="exampleInputEmail1">Masukkan Tanggal Setoran</label>
            <input type="date" class="form-control" value="{{ old('tanggal') }}" name="tanggal" placeholder="Tanggal">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Kategori Anda</label>
            <select class="form-control" name="kategori" >
                <option value="OTS" selected>OTS</option>
                <!-- Tambahkan opsi-opsi lain jika diperlukan -->
            </select>
        </div>
        
        

          <div class="form-group">
            <label for="exampleInputEmail1">Masukkan Jumlah Setoran</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
                <input type="text" class="form-control" value="{{ old('jumlah') }}" name="jumlah" placeholder="Jumlah">
            </div>
        </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Masukkan Keterangan</label>
            <textarea class="form-control" value="{{ old('keterangan') }}" name="keterangan"  placeholder="Keterangan"></textarea>
        </div>
        
            {{-- <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div> --}}

            <div class="form-group">
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="button" class="btn btn-primary" onclick="window.location.href='{{ route('kolektor') }}'">Kembali</button>
            </div>
            
        

    </div>
</div>
</div>
</div>
</div>


    </form>
@endsection