<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Kolektor;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;

class KolektorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kolektor = Kolektor::orderBy('created_at', 'DESC')->get();
        
        return view('kolektor.index', compact('kolektor'));
    }

    public function create()
    {
        return view('kolektor.create');
    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        $data = Kolektor::where('id', 'like', "%" . $keyword . "%")->get();
        return view('kolektor.index', compact('kolektor'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'nama' => 'required',
            'tanggal' => 'required',
            'kategori' => 'required',
            'jumlah' => 'required|numeric',
            'keterangan' => 'required',
        ],
        [
            'id.required' => 'ID Wajib Disisi ',
            'nama.required' => 'Nama Wajib Disisi ',
            'tanggal.required' => 'Tanggal Wajib Disisi ',
            'kategori.required' => 'Kategori Wajib Disisi ',
            'jumlah.required' => 'Jumlah Wajib Disisi ',
            'jumlah.numeric' => 'Jumlah harus berupa angka',
            'keterangan.required' => 'Keterangan Wajib Disisi ',
        ]);
        
        Kolektor::create([
            'id' => $request->id,
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
            'kategori' => $request->kategori,
            'jumlah' => $request->jumlah,
            'keterangan' => $request->keterangan,
            
        ]);
 
        return redirect()->route('kolektor')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function show(string $id)
    {
        // Cari kolektor berdasarkan nama
        $kolektor = Kolektor::where('id', $id)->firstOrFail();
    
        return view('kolektor.show', compact('kolektor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $title = 'Kolektor';
        $kolektor = Kolektor::findOrFail($id);
        
        return view('kolektor.edit', compact('title', 'kolektor'));
    }

    /**
     * Update the specified resource in storage.
     */
        public function update(Request $request, $id)
    {
        // Validasi request
        $request->validate([
            'id' => 'required',
            'nama' => 'required',
            'tanggal' => 'required',
            'kategori' => 'required',
            'jumlah' => 'required',
            'keterangan' => 'required'
        ]);

        $kolektor = Kolektor::find($id);
        //update kolektor
        $kolektor->update([
            'id' => $request->id,
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
            'kategori' => $request->kategori,
            'jumlah' => $request->jumlah,
            'keterangan' => $request->keterangan,
        ]);
        

        return redirect()->route('kolektor')->with('success', 'Data Berhasil Dirubah');
        
    }


    public function destroy(string $id)
    {
        $kolektor = Kolektor::findOrFail($id);
        
        $kolektor->delete();
  
        return redirect()->route('kolektor')->with('success', 'Data Berhasil Dihapus');
    }

    public function dashboardkl()
    {
        return view('kolektor.dashboardkl');
    }

    // public function chart()
    // {
    //     // Fetch data from the database
    // $data = Kolektor::select('tanggal', 'jumlah')->orderBy('tanggal')->get();

    // // Separate the 'tanggal' and 'jumlah' fields into separate arrays
    // $tanggalArray = $data->pluck('tanggal')->toArray();
    // $jumlahArray = $data->pluck('jumlah')->toArray();

    // // Pass the arrays to the view
    // return view('bendahara.dashboard', compact('tanggalArray', 'jumlahArray'));
    // }

    // public function laporan(){
    
    //     $kolektor = Kolektor::all();
    //     return view('bendahara.dashboard', compact('kolektor'));
    // }
}
