<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{

    public function isi_freon()
    {
        return view('clients.home.layanan.isi-freon');
    }

    public function service_ac()
    {
        return view('clients.home.layanan.service-ac');
    }

    public function cuci_ac()
    {
        return view('clients.home.layanan.cuci-ac');
    }

    public function cuci_besar_ac()
    {
        return view('clients.home.layanan.cuci-besar-ac');
    }

    public function bongkar_pasang_ac()
    {
        return view('clients.home.layanan.bongkar-pasang-ac');
    }


    public function store(Request $request)
    {
        dd($request->all());
        
        $pemesananAttr = [];
        $pemesananAttr['alamat'] = $request->alamat;
        $pemesananAttr['jumlah_ac'] = $request->jumlah_ac;
        $pemesananAttr['type_rumah'] = $request->type_rumah;
        $pemesananAttr['nomor_hp'] = $request->nomor_hp;
        $pemesananAttr['penerima_layanan'] = $request->penerima_layanan;
        $pemesananAttr['bukti_pembayaran'] = 'Belum ada';
        $pemesananAttr['updated_by'] = 'Percobaan';
        $pemesananAttr['id_user'] = 1;

        Pemesanan::create($pemesananAttr);

    }


    public function pembayaran()
    {
    //    Pemesanan::find($id);
        return view('clients.home.pembayaran.pembayaran');
    }

    public function show($id)
    {
       
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
