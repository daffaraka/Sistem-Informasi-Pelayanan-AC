<?php

namespace App\Http\Controllers;

use App\Models\Ulasan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UlasanController extends Controller
{
  
    public function index()
    {
        $ulasan = Ulasan::with('Layanan')->get();

        if (request()->ajax()) {

            return DataTables::of($ulasan)->addColumn('action', function ($data) {
                $button = '<a href="teknisi/edit/'.$data->id_ulasan.' " data-toggle="tooltip"  data-id="' . $data->id_ulasan . '" data-original-title="Edit" class="edit btn btn-sm btn-warning btn-xs edit-post"><i class="far fa-edit"></i> Edit</a>';
                $button .= '&nbsp;&nbsp;';
                // $button .= '<button type="button" name="detail" id="'.$data->id.'" class="detail btn btn-info btn-xs"><i class="fas fa-info-circle"></i> Detail</button>';
                // $button .= '&nbsp;&nbsp;';
                $button .= '<a href="teknisi/delete/'.$data->id_ulasan.'" name="delete" id="' . $data->id_ulasan . '" class="delete btn btn-danger btn-xs"><i class="far fa-trash-alt"></i> Delete</a>';
                return $button;
            })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        };
        return view('dashboard.admin.ulasan.ulasan-index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Ulasan $ulasan)
    {
        //
    }

    public function edit(Ulasan $ulasan)
    {
        //
    }

    public function update(Request $request, Ulasan $ulasan)
    {
        //
    }

    public function destroy(Ulasan $ulasan)
    {
        //
    }
}
