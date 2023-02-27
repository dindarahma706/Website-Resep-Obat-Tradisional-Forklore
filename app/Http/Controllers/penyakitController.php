<?php

namespace App\Http\Controllers;

use App\Models\Resep;
use App\Models\Pasien;
use Illuminate\Http\Request;

class penyakitController extends Controller
{
    
    //public function Result(){
      //  $resep = Resep::paginate(10);
        //    return view('result', ['resep' => $resep]);
    //}
    public function Insert(Request $request){
        $pasien = new Pasien();
        $pasien->Nama = $request->input('Nama');
        $pasien->Umur = $request->input('Umur');
        $pasien->Gender = $request->input('Gender');
        $pasien->Penyakit = $request->input('Penyakit');
        $pasien->save();
        $penyakit = $pasien->Penyakit;
        $resep = Resep::where('Penyakit','LIKE','%'.$penyakit.'%')->get();
        
        return view('result', ['resep' => $resep] )->with("status", "Resep Obat Has Found");
    }
}
