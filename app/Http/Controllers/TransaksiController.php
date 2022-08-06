<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Builder\Trait_;

class TransaksiController extends Controller
{
    
    public function buat_transaksi(Request $request)
    {
        
        // dd($request->all());
        
        $transaksiAttr = [];
        $transaksiAttr['alamat'] = $request->alamat;
        $transaksiAttr['jumlah_ac'] = $request->jumlah_ac;
        $transaksiAttr['type_rumah'] = $request->type_rumah;
        $transaksiAttr['nomor_hp'] = $request->nomor_hp;
        $transaksiAttr['penerima_layanan'] = $request->penerima_layanan;
        $transaksiAttr['biaya_jasa'] = $request->biaya_jasa;
        $transaksiAttr['updated_by'] = 'Percobaan';
        $transaksiAttr['tanggal_kedatangan'] = $request->tanggal_kedatangan;
        $transaksiAttr['waktu_kedatangan'] = $request->waktu_kedatangan;
        $transaksiAttr['id_user'] = Auth::user()->id;
        $transaksiAttr['id_layanan'] = 1;

        $transaksi = Transaksi::create($transaksiAttr);
      

        return redirect()->route('pembayaran',['id'=>$transaksi->id_transaksi]);

    }

    public function pembayaran($id)
    {
        $detailTransaksi = Transaksi::with('Layanan')->find($id);
        
        return view('clients.home.pembayaran.pembayaran',compact('detailTransaksi'));
    }



    public function uploadBuktiPembayaran($id)
    {
        $transaksi = Transaksi::find($id);
       
        return view('clients.dashboard-user.pembayaran.lengkapi-pembayaran',compact('transaksi'));
    }

    public function storeBuktiPembayaran($id, Request $request)
    {
        // dd($request->all());

        $transaksi = Transaksi::find($id);

        $file = request()->file('bukti_pembayaran');
        $filename = $file->getClientOriginalName();
       
        $extension = $file->getClientOriginalExtension();

        //uploaded location
        $location = "User/Bukti Pembayaran";
        
        //uploaded file
        $buktiPembayaranAttr = [];
        $buktiPembayaranAttr['bukti_pembayaran'] = $transaksi->penerima_layanan.'-'.$filename;

        $transaksi->update($buktiPembayaranAttr);
        $file->move($location, $transaksi->penerima_layanan.'-'.$filename);

        return redirect()->route('user.transaksi-user');
    }

}
