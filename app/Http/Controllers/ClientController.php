<?php

namespace App\Http\Controllers;

use App\Models\Ulasan;
use App\Models\Layanan;
use Illuminate\Http\Request;

class ClientController extends Controller
{
   
    public function index()
    {

        $layanan = Layanan::all();



      
        
        return view('clients.home.client-index',compact(['layanan']));
    }

    public function pilihLayanan($id)
    {
        $layanan = Layanan::with('Ulasan.transaksi.user')->find($id);
        return view('clients.home.pilih-layanan',compact('layanan'));
    }
}
