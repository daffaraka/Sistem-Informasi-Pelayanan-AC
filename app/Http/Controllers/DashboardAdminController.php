<?php

namespace App\Http\Controllers;

use App\Models\Teknisi;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DashboardAdminController extends Controller
{
    
    public function daftarTransaksi()
    {
        $transaksi = Transaksi::with(['User','Teknisi','Layanan'])->get();

      
        if (request()->ajax()) {

            return DataTables::of($transaksi)->addColumn('action', function ($data) {
                $button = '<a href="daftar-transaksi/detail/'.$data->id_transaksi.' " data-toggle="tooltip"  data-id="' . $data->id_transaksi . '" data-original-title="Edit" class="edit btn btn-sm btn-warning edit-post text-dark"><i class="far fa-edit"></i> Detail</a>';
                $button .= '&nbsp;&nbsp;';
                // $button .= '<button type="button" name="detail" id="'.$data->id.'" class="detail btn btn-info btn-xs"><i class="fas fa-info-circle"></i> Detail</button>';
                // $button .= '&nbsp;&nbsp;';
                return $button;
            })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        };
       
        return view('dashboard.admin.daftar transaksi.transaksi-index');
    }

    public function detailTransaksi($id)
    {
        $transaksi = Transaksi::find($id);
        
        return view('dashboard.admin.daftar transaksi.transaksi-show',compact('transaksi'));
    }


    public function tolakTransaksi($id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->update(
            [
                'status' => 'Dibatalkan',
            ]
        );

        return redirect()->route('admin.detailTransaksi',['id'=>$transaksi->id_transaksi]);
    }


    public function pilihTeknisi($id)
    {

        $transaksi = Transaksi::find($id);
        $teknisi = Teknisi::all();

        

        if(count($teknisi) < 1) {
            return redirect()->route('teknisi.create');
        } else {
            return view('dashboard.admin.daftar transaksi.transaksi-pilih-teknisi',compact(['transaksi','teknisi']));
        }
    }

    public function terimaTransaksi($id, Request $request)
    {
        $transaksi = Transaksi::find($id);

        // dd($request->all());
        $transaksi->update(
            [
                'status' => 'Diterima',
                'id_teknisi' => $request->id_teknisi,
            ]
        );

        return redirect()->route('admin.detailTransaksi',['id'=>$transaksi->id_transaksi]);
    }

 
}
