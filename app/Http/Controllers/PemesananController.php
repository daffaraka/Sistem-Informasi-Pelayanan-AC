<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PemesananController extends Controller
{
    public function index()
    {
        $pemesanan = Pemesanan::with('User')->get();

      
        if (request()->ajax()) {

            return DataTables::of($pemesanan)->addColumn('action', function ($data) {
                $button = '<a href="artist/edit/'.$data->id_pemesanan.' " data-toggle="tooltip"  data-id="' . $data->id_pemesanan . '" data-original-title="Edit" class="edit btn btn-sm btn-warning btn-xs edit-post"><i class="far fa-edit"></i> Edit</a>';
                $button .= '&nbsp;&nbsp;';
                // $button .= '<button type="button" name="detail" id="'.$data->id.'" class="detail btn btn-info btn-xs"><i class="fas fa-info-circle"></i> Detail</button>';
                // $button .= '&nbsp;&nbsp;';
                $button .= '<a href="artist/delete/'.$data->id_pemesanan.'" name="delete" id="' . $data->id_pemesanan . '" class="delete btn btn-danger btn-xs"><i class="far fa-trash-alt"></i> Delete</a>';
                return $button;
            })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        };
       
        return view('dashboard.admin.pemesanan.pemesanan-index');
    }

    public function show(Pemesanan $pemesanan)
    {
        //
    }

    public function edit(Pemesanan $pemesanan)
    {
        //
    }

    public function update(Request $request, Pemesanan $pemesanan)
    {
        //
    }


    public function destroy(Pemesanan $pemesanan)
    {
        //
    }
}
