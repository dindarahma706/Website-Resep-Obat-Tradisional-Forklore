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
        $data = ResepNew::select('judul as name', 'penyakit', 'id')
                ->where('judul','LIKE','%'.$request->input('keyword').'%')
                ->orwhere('penyakit','LIKE','%'.$request->input('keyword').'%')
                ->orderBy('judul','ASC')
                ->get();
        $keyword=$request->input('keyword');
        return view('resep.cari', ['data'=>$data,'keyword'=>$keyword]);
    }
    function getResepAPI(Request $request)
    {
        $data = ResepNew::select('id','judul as name', 'photo as image', 'cara_pembuatan as description')
        ->where('judul', 'LIKE', '%' . $request->input('keyword') . '%')
        ->orwhere('penyakit', 'LIKE', '%' . $request->input('keyword') . '%')
        ->orderBy('judul', 'ASC')
        ->get();
        $keyword = $request->input('keyword');

        foreach ($data as $resep) {
            $ingredients=Resep::select("resep.id as id", 'resep.Nama_Tumbuhan as name', 'resep.Image as image')
                        ->join('bahan_reseps', 'resep.id', '=', 'bahan_reseps.id_bahan')
                        ->where('bahan_reseps.id_resep', '=', $resep['id'])
                        ->get();
            foreach($ingredients as $ingredient){
                $ingredient['image']=asset('assets/uploads/resep/'.$ingredient['image']);
            }
            $resep['image']=asset('assets/uploads/resep/'.$resep['image']);
            $resep['ingredients']=$ingredients;
        }
        return $data;

        
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
    public function daftarBahan(Request $request){
        $keyword=$request->input('keyword');
        $resep = Resep::select('*')
                        ->where('Nama_tumbuhan','LIKE','%'.$keyword.'%')
                        ->orwhere('Penyakit', 'LIKE', '%' . $keyword . '%')
                        ->paginate(10);
        return view('admin.resep', ['resep'=>$resep,'keyword'=>$keyword]);
    }
    public function daftarBahanAPI(Request $request)
    {
        $keyword = $request->input('keyword');
        $bahan = Resep::select('resep.id as id','resep.Nama_tumbuhan as name','resep.Image as image')
        ->get();
        foreach ($bahan as $item) {
            $item['image'] = asset('assets/uploads/resep/' . $item['image']);
        }

        return $bahan;
        // return view('admin.resep', ['resep' => $resep, 'keyword' => $keyword]);
    }
    public function detailBahanAPI(Request $request,$pk)
    {
        $keyword = $request->input('keyword');
        $bahan = Resep::select("resep.id as id", 'resep.Nama_Tumbuhan as name', 'resep.Image as image')
                        ->where('id','=',$pk)
                        ->first();
        $bahan['image'] = asset('assets/uploads/resep/' . $bahan['image']);

        return $bahan;
        // return view('admin.resep', ['resep' => $resep, 'keyword' => $keyword]);
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
        return redirect('/bahan')->with("status", "Resep Added Succesfully");

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
    public function detailResepAPI($pk)
    {
        $resep = ResepNew::select('id', 'judul as name', 'photo as image', 'cara_pembuatan as description')
            ->where('id', $pk)
            ->first();
        $resep['image'] = asset('assets/uploads/resep/' . $resep['image']);

        $bahan = Resep::select("resep.id as id", 'resep.Nama_Tumbuhan as name', 'resep.Image as image')
            ->join('bahan_reseps', 'resep.id', '=', 'bahan_reseps.id_bahan')
            ->where('bahan_reseps.id_resep', '=', $pk)
            ->get();
        foreach ($bahan as $item) {
            $item['image'] = asset('assets/uploads/resep/' . $item['image']);
        }

        $resep['ingredients']=$bahan;
        return $resep;
        // return view('resep.detail', ['resep' => $resep, 'bahan' => $bahan]);
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
        return redirect('/bahan')->with("status", "Bahan Updated Succesfully");

    }
    public function Destroy($id){
        $resep = Resep::find($id);
        $path = 'assets/uploads/resep/'.$resep->Image;
        //if(File::exists($path)){
            File::delete($path);
        //}
        $resep->delete();
        return redirect('/bahan')->with('status', 'Resep Deleted Succesfully');
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





