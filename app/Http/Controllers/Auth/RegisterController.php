<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Masyarakat;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
   

    use RegistersUsers;

    
    protected $redirectTo = RouteServiceProvider::HOME;

   
    public function __construct()
    {
        $this->middleware('guest');
    }

  
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama' => ['required', 'string', 'max:255'],
            'nik' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'telepon' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    
    protected function create(array $data)
    {
        return Masyarakat::create([
            'nama' => $data['nama'],
            'nik' => $data['nik'],
            'username' => $data['username'],
            'telepon' => $data['telepon'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
