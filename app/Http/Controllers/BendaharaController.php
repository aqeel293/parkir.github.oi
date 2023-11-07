<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Kolektor;
use Illuminate\Support\Facades\File;
use Mpdf\Mpdf;

class BendaharaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kolektor = Kolektor::orderBy('created_at', 'DESC')->get();
        
        return view('bendahara.index', compact('kolektor'));
    }

    public function print(string $id)
    {
        // Cari kolektor berdasarkan nama
        $kolektor = Kolektor::where('id', $id)->firstOrFail();
    
        return view('bendahara.print', compact('kolektor'));
    }

    public function pdf($id)
    {
        // Ambil satu data bendahara dari database berdasarkan ID
        $kolektor = Kolektor::findOrFail($id);
    
        // Gunakan kelas mPDF
        $mpdf = new Mpdf();
    
        // Tambahkan data bendahara ke dalam konten PDF dalam bentuk tabel
        $html = '<h1>Data Setoran</h1>';
        $html .= '<table border="1" cellpadding="5" cellspacing="0">';
        $html .= '<tr><th>ID</th><th>Nama Penyetor</th><th>Tanggal Setoran</th><th>Jumlah Setoran</th><th>Keterangan</th><th>Status</th></tr>';
        $html .= "<tr>";
        $html .= "<td>{$kolektor->id}</td>";
        $html .= "<td>{$kolektor->nama}</td>";
        $html .= "<td>{$kolektor->tanggal}</td>";
        $html .= "<td>Rp {$kolektor->jumlah}</td>"; 
        $html .= "<td>{$kolektor->keterangan}</td>";
        $html .= "<td>{$kolektor->status}</td>";
        $html .= "</tr>";
        $html .= '</table>';
        $html .= "<hr>"; 
    
        // Tambahkan HTML ke PDF
        $mpdf->WriteHTML($html);
    
        // Keluarkan PDF ke browser
        $mpdf->Output();
    }

    public function create()
    {
        return view('bendahara.create');
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
            'jumlah' => 'required',
            'keterangan' => 'required'
        ],
        [
            'id.required' => 'ID Wajib Disisi ',
            'nama.required' => 'Nama Wajib Disisi ',
            'tanggal.required' => 'Tanggal Wajib Disisi ',
            'kategori.required' => 'Kategori Wajib Disisi ',
            'jumlah.required' => 'Jumlah Wajib Disisi ',
            'keterangan.required' => 'Keterangan Wajib Disisi ',
        ]);
        
        Kolektor::create([
            'id' => $request->id,
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
            'kategori' => $request->tanggal,
            'jumlah' => $request->jumlah,
            'keterangan' => $request->keterangan,
            
        ]);
        return redirect()->route('bendahara')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function show(string $id)
    {
        // Cari kolektor berdasarkan nama
        $kolektor = Kolektor::where('id', $id)->firstOrFail();
    
        return view('bendahara.show', compact('kolektor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $title = 'Kolektor';
        $kolektor = Kolektor::findOrFail($id);
        
        return view('bendahara.edit', compact('title', 'kolektor'));
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
            'keterangan' => 'required',
            'status' => 'required'
        ]);

        $kolektor = Kolektor::find($id);
        //update bendahara & kolektor
        $kolektor->update([
            'id' => $request->id,
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
            'kategori' => $request->kategori,
            'jumlah' => $request->jumlah,
            'keterangan' => $request->keterangan,
            'status' => $request->status,
        ]);
        return redirect()->route('bendahara')->with('success', 'Data Berhasil Dirubah');
    }
    public function destroy(string $id)
    {
        $kolektor = Kolektor::findOrFail($id);
        $kolektor->delete();

        return redirect()->route('bendahara')->with('success', 'Data Berhasil Dihapus');
    }

        public function laporanbd()
    {

        $laporan = Kolektor::pluck('jumlah');

        return view('bendahara.dashboard', compact('laporan'));
    }
    
}
