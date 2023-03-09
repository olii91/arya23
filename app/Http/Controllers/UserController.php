<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller

{
  
    public function index()
    {
        $user = User::all();
        return view('user.index')->with('user',$user); 
    }
    public function create()
    {
        return view('user.create');
    }   
    public function store(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255','unique:users'],
            'telpon'=>['required','numeric'],
            'password' => ['required', 'string', 'min:8'],
            'level' => ['required','string'],
       ]);
        try{
            $user = new User;
            $user->username = $request->username;
            $user->name= $request->name;
            $user->email = $request->email;
            $user->telpon=$request->telpon;
            $user->password = Hash::make($request->password);
            $user->level= $request->level;
            $user->save();
       }
        catch(\Exception $e ){
            return redirect()->back()->withErrors(['User gagal disimpan']);
       }
        return redirect('user')->with('status','User Berhasil ditambahkan');
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $user =  User::find($id);
        return view('user.edit')->with('user',$user);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => ['required', 'string', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255','unique:users'],
            'telpon'=>['required','string'],
            'password' => ['required', 'string', 'min:8'],
            'level' => ['required','string'],
        ]);

        try{
            $user = User::find($id);
            $user->name = $request->name;
            $user->username = $request->username;
            $user->telpon = $request->telpon;
            $user->email = $request->email;
            if($request->password !=""){
                $user->password = Hash::make($request->password);
            }
            $user->level= $request->level;
            $user->save();
        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['User gagal diperbarui']);
        }
        return redirect('user')->with('status', 'User Berhasil diperbarui');

    }
    public function destroy($id)
    {
        try{
            $user = User::findOrFail($id);
            $user->delete();
        }
        catch(\Exception $e ){
            return redirect()->back()->withErrors(['User gagal dihapus']);
        }
        return redirect()->back()->with('status','User Berhasil dihapus');
    }
}
