<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DashboardAdminController extends Controller
{
    
    public function daftarTransaksi()
    {
        $transaksi = Transaksi::with('User')->get();

      
        if (request()->ajax()) {

            return DataTables::of($transaksi)->addColumn('action', function ($data) {
                $button = '<a href="daftar-transaksi/edit/'.$data->id_transaksi.' " data-toggle="tooltip"  data-id="' . $data->id_transaksi . '" data-original-title="Edit" class="edit btn btn-sm btn-warning btn-xs edit-post"><i class="far fa-edit"></i> Edit</a>';
                $button .= '&nbsp;&nbsp;';
                // $button .= '<button type="button" name="detail" id="'.$data->id.'" class="detail btn btn-info btn-xs"><i class="fas fa-info-circle"></i> Detail</button>';
                // $button .= '&nbsp;&nbsp;';
                $button .= '<a href="daftar-transaksi/delete/'.$data->id_transaksi.'" name="delete" id="' . $data->id_transaksi . '" class="delete btn btn-danger btn-xs"><i class="far fa-trash-alt"></i> Delete</a>';
                return $button;
            })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        };
       
        return view('dashboard.admin.daftar transaksi.transaksi-index');
    }

    public function daftarReview()
    {
        # code...
    }
}
