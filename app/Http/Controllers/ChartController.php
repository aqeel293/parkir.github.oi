<?php

namespace App\Http\Controllers;

use App\Models\Kolektor;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function laporanhr()
    {
        $laporanhr = Kolektor::select('jumlah', 'tanggal')->get();

        // Ubah parameter 'your-view' menjadi 'bendahara.chart'
        return view('bendahara.dashboard', compact('laporanhr'));
    }
}
