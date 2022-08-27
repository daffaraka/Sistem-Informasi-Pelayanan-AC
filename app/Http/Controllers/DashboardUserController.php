<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Ulasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class DashboardUserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function pengaturan_akun()
    {
        return view('clients.dashboard-user.profile-user');
    }


    public function transaksi_user()
    {
        $idUser = Auth::user()->id;

        $transaksiUser = Transaksi::with(['User', 'Layanan','Ulasan'])->where('id_user', $idUser)->get();



        return view('clients.dashboard-user.transaksi-user', compact('transaksiUser'));
    }




    public function detailTransaksi($id)
    {
        $transaksi = Transaksi::with(['User', 'Layanan'])->find($id);


        return view('clients.dashboard-user.detail-transaksi-user', compact('transaksi'));
    }


    public function bukti_pembayaran($id)
    {
        
        $transaksi = Transaksi::find($id);

        if ($transaksi->metode_pembayaran == null)
        {
            return redirect()->route('pilih_metode',['id'=>$transaksi->id_transaksi]);
        } else {
            return  view('clients.dashboard-user.pembayaran.lengkapi-pembayaran', ('transaksi'));
        }

    }

    public function upload_bukti($id)
    {
        $transaksi = Transaksi::find($id);


        $file = request()->file('bukti_pembayaran');
        $filename = $file->getClientOriginalName();

        $extension = $file->getClientOriginalExtension();

        //uploaded location
        $location = "User/Bukti Pembayaran";

        //uploaded file
        if (!$file) {
            return redirect()->back();
        } else {
            $file->move($location, $transaksi->penerima_layanan . '-' . $filename);
        }

        return  view('clients.home.pembayaran.lengkapi-pembayaran', ('transaksi'));
    }

    public function ulasan($id)
    {
        $transaksi = Transaksi::with('Layanan')->find($id);

        return view('clients.dashboard-user.ulasan.ulasan-create',compact('transaksi'));
    }


    public function beri_ulasan(Request $request)
    {
        
        // dd($request->all());
        $transaksi = Transaksi::find($request->id_transaksi);
        Ulasan::create($request->all());
        $transaksi->update(
            [
                'status' => 'Selesai',
            ]
        );
        return redirect()->route('user.transaksi-user');
    }


    public function batalkan($id)
    {
        $transaksi = Transaksi::find($id);
        
        $transaksi->update(
            [
                'status' => 'Dibatalkan',
            ]
            );

        return redirect()->route('user.transaksi-user');
    }
}
