
    @extends('layouts.bdtable')
    
    @section('title', '')
    
    @section('contents')
        <div class="container"> 
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <h1 class="card-header"> Tambah Data Bendahara</h1>
       
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

        <form action="{{ route('bendahara.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="exampleInputEmail1">Masukkan ID Anda</label>
                <input type="text" class="form-control" name="id" placeholder="ID" >
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Masukkan Nama Anda</label>
                <input type="text" class="form-control" name="nama" placeholder="Nama">
            </div>
            
            <div class="form-group">
                <label for="exampleInputEmail1">Masukkan Tanggal Setoran</label>
                <input type="date" class="form-control" name="tanggal" placeholder="Tanggal">
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
                <label for="exampleInputEmail1">Masukkan Jumlah Setoran</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rp</span>
                    </div>
                    <input type="text" class="form-control" name="jumlah" placeholder="Jumlah">
                </div>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Masukkan Keterangan</label>
                <textarea class="form-control" name="keterangan" placeholder="Keterangan"></textarea>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Pilih Status Setoran</label>
                <div>
                    <label>
                        <input type="radio" name="status" value="sudah_diterima"> Sudah Diterima
                    </label>
                </div>
                <div>
                    <label>
                        <input type="radio" name="status" value="belum_diterima"> Belum Diterima
                    </label>
                </div>
            </div>
            
                {{-- <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div> --}}

                <div class="form-group">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <button type="button" class="btn btn-primary" onclick="window.location.href='{{ route('bendahara') }}'">Kembali</button>
                </div>
                
            

        </div>
    </div>
    </div>
    </div>
    </div>


        </form>
    @endsection