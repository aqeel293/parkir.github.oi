@extends('layouts.bdtable')

@section('contents')

<div class="d-flex align-items-center justify-content-between">
    <h1 class="mb-0">Data Bendahara</h1>
</div>
<hr />

<div>
    @php
        // Menggunakan dd() untuk menampilkan nilai $laporan
        dd($laporan);
    @endphp
</div>

@endsection
