<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DaftarLayananController extends Controller
{
    public function index()
    {
        $layanan = Layanan::all();
        if (request()->ajax()) {

            return DataTables::of($layanan)->addColumn('action', function ($data) {
                $button = '<a href="artist/edit/'.$data->id_layanan.' " data-toggle="tooltip"  data-id="' . $data->id_layanan . '" data-original-title="Edit" class="edit btn btn-sm btn-warning btn-xs edit-post"><i class="far fa-edit"></i> Edit</a>';
                $button .= '&nbsp;&nbsp;';
                // $button .= '<button type="button" name="detail" id="'.$data->id.'" class="detail btn btn-info btn-xs"><i class="fas fa-info-circle"></i> Detail</button>';
                // $button .= '&nbsp;&nbsp;';
                $button .= '<a href="artist/delete/'.$data->id_layanan.'" name="delete" id="' . $data->id_layanan . '" class="delete btn btn-danger btn-xs"><i class="far fa-trash-alt"></i> Delete</a>';
                return $button;
            })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        };
        return view('dashboard.admin.layanan.layanan-index');
    }
}
