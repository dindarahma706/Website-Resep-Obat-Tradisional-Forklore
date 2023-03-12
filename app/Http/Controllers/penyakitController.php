<?php

namespace App\Http\Controllers;

use App\Models\Resep;
use App\Models\Pasien;
use App\Models\Craft;
use Illuminate\Http\Request;

class penyakitController extends Controller
{
    
    //public function Result(){
      //  $resep = Resep::paginate(10);
        //    return view('result', ['resep' => $resep]);
    //}
    
    
//     public function Insert(Request $request){
//         $pasien = new Pasien();
//         $pasien->Nama = $request->input('Nama');
//         $pasien->Umur = $request->input('Umur');
//         $pasien->Gender = $request->input('Gender');
//         $pasien->Penyakit = $request->input('Penyakit');
//         $pasien->save();
//         $penyakit = $pasien->Penyakit;
//         $resep = Resep::where('Penyakit','LIKE','%'.$penyakit.'%')->get();
        
//         return view('result', ['resep' => $resep] )->with("status", "Resep Obat Has Found");
//     }
    
    public function Insert(Request $request){
        $racik = Craft::all();
        $racik->bahan1 = $request->input('bahan1');
        $racik->bahan2 = $request->input('bahan2');
        $racik->bahan3 = $request->input('bahan3');
        $hasil = Craft::where('bahan1', 'LIKE', '%'.$racik->bahan1.'%')
        ->where('bahan2', 'LIKE', '%'.$racik->bahan2.'%')
        ->where('bahan3', 'LIKE', '%'.$racik->bahan3.'%')
        ->get();
        return view('result', compact('hasil'));
    }
    public function History(){
        $pasien = Pasien::all();
        return view('history', ['pasien' => $pasien] )->with("status", "Resep Obat Has Found");
    }
}
