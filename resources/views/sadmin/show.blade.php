@extends('layouts.satable')

@section('contents')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Detail Data Role</h1>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" placeholder="Nama" value="{{ $user->name }}" readonly>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control" placeholder="Email" value="{{ $user->email }}" readonly>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Role</label>
                        <input type="text" class="form-control" placeholder="Role" value="{{ $user->role }}" readonly>
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
