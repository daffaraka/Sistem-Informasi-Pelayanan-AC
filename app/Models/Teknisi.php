<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teknisi extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_teknisi';

    protected $fillable = 
        [
            'nama_teknisi',
            'no_hp',
        ];


    public function Transaksi()
    {
        return $this->belongsTo(Transaksi::class,'id_transaksi');
    }
}
