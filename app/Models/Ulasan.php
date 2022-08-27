<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    use HasFactory;

    protected $table = 'reviews';

    protected $primaryKey = 'id_review';

    protected $fillable = 
    [
        'comment',
        'rating',
        'id_layanan',
        'id_transaksi',
    ]; 


    public function Layanan()
    {
        return $this->belongsTo(Layanan::class,'id_layanan');
    }

    public function Transaksi()
    {
        return $this->belongsTo(Transaksi::class,'id_transaksi');

    }
}
