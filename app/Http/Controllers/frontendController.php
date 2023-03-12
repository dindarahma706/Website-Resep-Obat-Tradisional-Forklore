<?php

namespace App\Http\Controllers;
use App\Models\Resep;
use App\Models\User;
use App\Models\Craft;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class frontendController extends Controller
{
    function Index(){
        return view('index');
    }
//     function Form(){
//         return view('form');
//     }
    function Form(){
        $racik1 = Craft::select('bahan1')->distinct()->get();
        $racik2 = Craft::select('bahan2')->distinct()->get();
        $racik3 = Craft::select('bahan3')->distinct()->get();
        return view('form', compact('racik1', 'racik2', 'racik3'));
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
    public function Edit($id){
        $resep = Resep::find($id);
        return view('admin.edit', compact('resep'));
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





