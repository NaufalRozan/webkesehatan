<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnakController extends Controller
{
    //
    public function index(Request $request)
    {
        if($request->has('cari')){
            $data_anak = \App\Models\Anak::where('nama', 'LIKE', '%'. $request->cari . '%')->get();
        }else{
            $data_anak = \App\Models\Anak::all();
        }
        $data_anak = DB::table('anak')->paginate(5);
        return view('anak.index', ['data_anak' => $data_anak,
        ]);
    }

    public function create(Request $request)
    {
        
        $data_anak = \App\Models\Anak::all();
        foreach($data_anak as $datanyaanak);
        \App\Models\Anak::create($request->all());
        $datanyaanak->ket = '';
        if($datanyaanak->jenis_kelamin == 'L'){
            if($datanyaanak->usia <= 6){
                if($datanyaanak->lingkar_kepala < 35){
                    $datanyaanak->ket = 'kecil';
                }
                elseif($datanyaanak->usia <= 43.5){
                    $datanyaanak->ket = 'normal';
                }
                else{
                    $datanyaanak->ket = 'besar';
                }
            }
            if($datanyaanak->usia <= 12){
                if($datanyaanak->lingkar_kepala < 43.5){
                    $datanyaanak->ket = 'kecil';
                }
                elseif($datanyaanak->usia <= 46){
                    $datanyaanak->ket = 'normal';
                }
                else{
                    $datanyaanak->ket = 'besar';
                }
            }
            else{
                if($datanyaanak->lingkar_kepala < 46){
                    $datanyaanak->ket = 'kecil';
                }
                elseif($datanyaanak->usia <= 49){
                    $datanyaanak->ket = 'normal';
                }
                else{
                    $datanyaanak->ket = 'besar';
                }
            }
        }else{
            if($datanyaanak->usia <= 6){
                if($datanyaanak->lingkar_kepala < 34){
                    $datanyaanak->ket = 'kecil';
                }
                elseif($datanyaanak->usia <= 42){
                    $datanyaanak->ket = 'normal';
                }
                else{
                    $datanyaanak->ket = 'besar';
                }
            }
            if($datanyaanak->usia <= 12){
                if($datanyaanak->lingkar_kepala < 42){
                    $datanyaanak->ket = 'kecil';
                }
                elseif($datanyaanak->usia <= 45){
                    $datanyaanak->ket = 'normal';
                }
                else{
                    $datanyaanak->ket = 'besar';
                }
            }
            else{
                if($datanyaanak->lingkar_kepala < 45){
                    $datanyaanak->ket = 'kecil';
                }
                elseif($datanyaanak->usia <= 47.2){
                    $datanyaanak->ket = 'normal';
                }
                else{
                    $datanyaanak->ket = 'besar';
                }
            }
        }
        return redirect('/anak')->with('Sukses', 'Data berhasil di input!');
    }

    public function edit($id)
    {
        $data_anak = \App\Models\Anak::find($id);
        return view('anak.edit', ['anak' => $data_anak]);
    }

    public function update(Request $request, $id)
    {
        $data_anak = \App\Models\Anak::find($id);
        $data_anak->update($request->all());
        return redirect('anak')->with('sukses', 'Data berhasil diupdate');
    }
    public function delete($id)
    {
        $data_anak = \App\Models\Anak::find($id);
        $data_anak->delete();
        return redirect('anak')->with('Sukses', 'Data berhasil dihapus');
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;
        $data_anak = DB::table('anak')
        ->where('nik', 'like', "%".$cari."%")
        ->paginate();

        return view('anak.index', ['data_anak' => $data_anak]);
    }
}
