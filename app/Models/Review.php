<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_review';

    protected $fillable = 
    [
        'comment',
        'rating',
        'id_transaksi',
    ]; 


    public function Transaksi()
    {
        return $this->belongsTo(Transaksi::class,'id_transaksi');
    }
}
