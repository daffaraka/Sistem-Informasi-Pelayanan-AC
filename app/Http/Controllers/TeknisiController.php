<?php

namespace App\Http\Controllers;

use App\Models\Teknisi;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TeknisiController extends Controller
{
    public function index()
    {
        $teknisi = Teknisi::all();
        if (request()->ajax()) {

            return DataTables::of($teknisi)->addColumn('action', function ($data) {
                $button = '<a href="teknisi/edit/'.$data->id_teknisi.' " data-toggle="tooltip"  data-id="' . $data->id_teknisi . '" data-original-title="Edit" class="edit btn btn-sm btn-warning btn-xs edit-post"><i class="far fa-edit"></i> Edit</a>';
                $button .= '&nbsp;&nbsp;';
                // $button .= '<button type="button" name="detail" id="'.$data->id.'" class="detail btn btn-info btn-xs"><i class="fas fa-info-circle"></i> Detail</button>';
                // $button .= '&nbsp;&nbsp;';
                $button .= '<a href="teknisi/delete/'.$data->id_teknisi.'" name="delete" id="' . $data->id_teknisi . '" class="delete btn btn-danger btn-xs"><i class="far fa-trash-alt"></i> Delete</a>';
                return $button;
            })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        };
        return view('dashboard.admin.teknisi.teknisi-index');
    }

    public function create()
    {
        return view('dashboard.admin.teknisi.teknisi-create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        Teknisi::create($request->all());

        return redirect()->route('teknisi');
    }

    public function show(Teknisi $teknisi)
    {
        //
    }

    public function edit($id)
    {
        $teknisi = Teknisi::find($id);

        return view('dashboard.admin.teknisi.teknisi-edit',compact('teknisi'));
    }

    public function update(Request $request, $id)
    {

        $teknisi = Teknisi::find($id);


        $teknisi->update($request->all());

        return redirect()->route('teknisi');

    }

    public function destroy($id)
    {
        $teknisi = Teknisi::find($id);
        $teknisi->delete();
        return redirect()->route('teknisi');
    }
}
