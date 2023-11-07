<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kolektor extends Model
{   
    // protected $primaryKey = 'id';
    protected $table = 'kolektor';
    use HasFactory;
    protected $fillable = [
        'id',
        'nama',
        'tanggal',
        'kategori',
        'jumlah',
        'keterangan',
        'status'
    ];

    // Tambahkan properti $casts
    protected $casts = [
        'status' => 'string', // atau 'nullabel' jika Laravel versi 7 ke atas
    ];

    public static function getMagangData()
    {
        return self::all();
    }
}
