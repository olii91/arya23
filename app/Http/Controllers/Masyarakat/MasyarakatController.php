<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Masyarakat;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class masyarakatController extends Controller

{
  
    public function index()
    {
        $masyarakat = masyarakat::all();
        return view('masyarakat.index')->with('masyarakat',$masyarakat); 
    }
    public function create()
    {
        return view('masyarakat.create');
    }   
    public function store(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'unique:masyarakats'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255','unique:masyarakats'],
            'telpon'=>['required','numeric'],
            'password' => ['required', 'string', 'min:8'],
            'level' => ['required','string'],
       ]);
        try{
            $masyarakat = new masyarakat;
            $masyarakat->masyarakatname = $request->masyarakatname;
            $masyarakat->name= $request->name;
            $masyarakat->email = $request->email;
            $masyarakat->telpon=$request->telpon;
            $masyarakat->password = Hash::make($request->password);
            $masyarakat->level= $request->level;
            $masyarakat->save();
       }
        catch(\Exception $e ){
            return redirect()->back()->withErrors(['masyarakat gagal disimpan']);
       }
        return redirect('masyarakat')->with('status','masyarakat Berhasil ditambahkan');
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $masyarakat =  masyarakat::find($id);
        return view('masyarakat.edit')->with('masyarakat',$masyarakat);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => ['required', 'string', 'unique:masyarakats'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255','unique:masyarakats'],
            'telpon'=>['required','string'],
            'password' => ['required', 'string', 'min:8'],
            'level' => ['required','string'],
        ]);

        try{
            $masyarakat = masyarakat::find($id);
            $masyarakat->name = $request->name;
            $masyarakat->username = $request->username;
            $masyarakat->telpon = $request->telpon;
            $masyarakat->email = $request->email;
            if($request->password !=""){
                $masyarakat->password = Hash::make($request->password);
            }
            $masyarakat->level= $request->level;
            $masyarakat->save();
        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['masyarakat gagal diperbarui']);
        }
        return redirect('masyarakat')->with('status', 'masyarakat Berhasil diperbarui');

    }
    public function destroy($id)
    {
        try{
            $masyarakat = masyarakat::findOrFail($id);
            $masyarakat->delete();
        }
        catch(\Exception $e ){
            return redirect()->back()->withErrors(['masyarakat gagal dihapus']);
        }
        return redirect()->back()->with('status','masyarakat Berhasil dihapus');
    }
}
