<?php

namespace App\Http\Controllers;

use App\Models\bahanResep;
use App\Models\Resep;
use App\Models\User;
use App\Models\Craft;
use App\Models\ResepNew;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Yajra\Datatables\Datatables;

class frontendController extends Controller
{
    function Index(){
        return view('index');
    }
    function getResep(Request $request){
        $data = ResepNew::select('judul', 'penyakit', 'id')
                ->where('judul','LIKE','%'.$request->input('keyword').'%')
                ->orwhere('penyakit','LIKE','%'.$request->input('keyword').'%')
                ->orderBy('judul','ASC')
                ->get();
        return view('resep.cari', ['data'=>$data]);
    }
//     function Form(){
//         return view('form');
//     }
    function Form(){
        $racik1 = Craft::select('bahan1')->distinct()->get();
        $racik2 = Craft::select('bahan2')->distinct()->get();
        $racik3 = Craft::select('bahan3')->distinct()->get();
        $bahan=Resep::select('*')->distinct()->get();
        return view('form', compact('racik1', 'racik2', 'racik3', 'bahan'));
    }
    function Users(){
        $user = User::all();
        return view('admin.users', compact('user'));
    }
    public function Resep(){
        $resep = Resep::all();
        return view('admin.resep', compact('resep'));
    }
    public function Add(){
        return view('admin.add');
    }
    public function Insert(Request $request){
        $resep = new Resep();
        if($request->hasFile('Image')){
            $file = $request->file('Image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/resep/',$filename);
            $resep->Image = $filename;
        }
        $resep->Nama_Tumbuhan = $request->input('Nama_Tumbuhan');
        $resep->Penyakit = $request->input('Penyakit');
        $resep->Deskripsi = $request->input('Deskripsi');
        $resep->save();
        return redirect('/resep')->with("status", "Resep Added Succesfully");

    }
    public function Submision(Request $request){
        $input=$request->all();
        // Add Resep
        $resep= new ResepNew;
        $resep->judul=$input['judul'];
        $resep->penyakit=$input['penyakit'];
        $resep->cara_pembuatan=$input['cara_pembuatan'];

        if($request->hasFile('photo')){
            $path = 'assets/uploads/resep/'.$resep->photo;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('photo');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/resep/',$filename);
            $resep->photo = $filename;
        }        
        $resep->save();

        $id_resep=ResepNew::select('id')
                ->orderBy('id','DESC')
                ->first();
        $id_bahan= $input['id_bahan'];
        // return $id_bahan;
        // Tambah Bahan Resep
        foreach ($id_bahan as $value) {
            $bahanResep = new bahanResep;
            $bahanResep->id_resep=$id_resep->id;
            $bahanResep->id_bahan=$value;
            $bahanResep->save();
        }

        

        // ResepNew::create($input);
        return redirect('/daftar-resep');

        
    }
    public function Edit($id){
        $resep = Resep::find($id);
        return view('admin.edit', compact('resep'));
    }

    public function detailResep($id){
        $resep = ResepNew::select('*')
                ->where('id', $id)
                ->first();
        $bahan = Resep::select("resep.*")
                ->join('bahan_reseps', 'resep.id','=','bahan_reseps.id_bahan')
                ->where('bahan_reseps.id_resep','=',$id)
                ->get();
        
        return view('resep.detail',['resep'=>$resep,'bahan'=>$bahan]);
        
    }

    public function Update(Request $request, $id){
        $resep = Resep::find($id);
        if($request->hasFile('Image')){
            $path = 'assets/uploads/resep/'.$resep->Image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('Image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/resep/',$filename);
            $resep->Image = $filename;
        }
        $resep->Nama_Tumbuhan = $request->input('Nama_Tumbuhan');
        $resep->Penyakit = $request->input('Penyakit');
        $resep->Deskripsi = $request->input('Deskripsi');
        $resep->update();
        return redirect('/resep')->with("status", "Resep Updated Succesfully");

    }
    public function Destroy($id){
        $resep = Resep::find($id);
        $path = 'assets/uploads/resep/'.$resep->Image;
        //if(File::exists($path)){
            File::delete($path);
        //}
        $resep->delete();
        return redirect('/resep')->with('status', 'Resep Deleted Succesfully');
    }
    public function VerifyUser($id){
        $user = User::find($id);
        $user->status='1';
        $user->update();
        return redirect('/users')->with('status', 'User Verified Succesfully');
    }
    public function BlockUser($id)
    {
        $user = User::find($id);
        $user->status = '0';
        $user->role='0';
        $user->update();
        return redirect('/users')->with('status', 'User Verified Succesfully');
    }
}





