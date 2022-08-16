<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Pemesanan;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;

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

    public function index()
    {
            $layanan = Layanan::all();
            if (request()->ajax()) {
    
                return DataTables::of($layanan)->addColumn('action', function ($data) {
                    $button = '<a href="layanan/edit/'.$data->id_layanan.' " data-toggle="tooltip"  data-id="' . $data->id_layanan . '" data-original-title="Edit" class="edit btn btn-sm btn-warning btn-xs edit-post"><i class="far fa-edit"></i> Edit</a>';
                    $button .= '&nbsp;&nbsp;';
                    // $button .= '<button type="button" name="detail" id="'.$data->id.'" class="detail btn btn-info btn-xs"><i class="fas fa-info-circle"></i> Detail</button>';
                    // $button .= '&nbsp;&nbsp;';
                    $button .= '<a href="layanan/delete/'.$data->id_layanan.'" name="delete" id="' . $data->id_layanan . '" class="delete btn btn-danger btn-xs"><i class="far fa-trash-alt"></i> Delete</a>';
                    return $button;
                })
                    ->rawColumns(['action'])
                    ->addIndexColumn()
                    ->make(true);
            };
            return view('dashboard.admin.layanan.layanan-index');
        
    }

    public function create()
    {
        return view('dashboard.admin.layanan.layanan-create');
    }


    public function store(Request $request)
    {
        $file = request()->file('gambar_layanan');
        $filename = $file->getClientOriginalName();

        $extension = $file->getClientOriginalExtension();

        //uploaded location
        $location = "Gambar Layanan";

        // dd($extension);
        $file->move($location, $request->nama_layanan . '-gambar.'.$extension);

        $layananAttr = [];
        $layananAttr['nama_layanan'] = $request->nama_layanan;
        $layananAttr['gambar_layanan'] = $request->nama_layanan . '-gambar.'.$extension;
        $layananAttr['deskripsi_layanan'] = $request->deskripsi_layanan;
        $layananAttr['biaya_layanan'] = $request->biaya_layanan;

 
        Layanan::create($layananAttr);

        return redirect()->route('layanan');
    }


    public function show($id)
    {
       $layanan = Layanan::find($id);

       return view('dashboard.admin.layanan.layanan-show',compact('layanan'));
        
    }

    public function edit($id)
    {
       
        $layanan = Layanan::find($id);

        return view('dashboard.admin.layanan.layanan-edit',compact('layanan'));
    }

    public function update(Request $request, $id)
    {
        $layanan = Layanan::find($id);

        $file = request()->file('gambar_layanan');
        $filename = $file->getClientOriginalName();

        $extension = $file->getClientOriginalExtension();

        //uploaded location
        $location = "Gambar Layanan";


        if($request->hasFile('gambar_layanan')){
            if(File::exists('Gambar Layanan/'.$layanan->gambar_layanan)) {
                File::delete('Gambar Layanan/'.$layanan->gambar_layanan);
                
                $file->move($location, $request->nama_layanan . '-gambar.'.$extension);

                $layananAttr = [];
                $layananAttr['nama_layanan'] = $request->nama_layanan;
                $layananAttr['gambar_layanan'] = $request->nama_layanan . '-gambar.'.$extension;
                $layananAttr['deskripsi_layanan'] = $request->deskripsi_layanan;
                $layananAttr['biaya_layanan'] = $request->biaya_layanan;


                $layanan->update($layananAttr);

                return redirect()->route('layanan');
            } else {

                return 'Something wrong';
            }
            
        }
     
       
    }

    public function destroy($id)
    {
        $layanan = Layanan::find($id);

     
        if(File::exists('Gambar Layanan/'.$layanan->gambar_layanan)) {
            File::delete('Gambar Layanan/'.$layanan->gambar_layanan);
            $layanan->delete();
        }  else {
            $layanan->delete();
        }

      

        return redirect()->route('layanan');
    }
}
