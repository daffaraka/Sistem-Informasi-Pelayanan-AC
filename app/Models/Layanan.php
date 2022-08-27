<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_layanan';

    protected $fillable = 
    [
        'gambar_layanan',
        'nama_layanan',
        'deskripsi_layanan',
        'biaya_layanan'
    ];

    public function Ulasan()
    {
        return $this->hasMany(Ulasan::class,'id_review','id_layanan');
    }
}
