<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_pemesanan';

    protected $fillable =
    [
        'id_user',
        'alamat',
        'jumlah_ac',
        'type_rumah',
        'nomor_hp',
        'penerima_layanan',
        'bukti_pembayaran',
        'updated_by'
    ];

    public function User()
    {
        return $this->belongsTo(User::class,'id_user');
    }
}
