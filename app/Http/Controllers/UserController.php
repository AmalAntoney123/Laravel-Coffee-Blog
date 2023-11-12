<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request){
        $incomingFiels = $request->validate([
            'name'=>['required','min:3','max:10',Rule::Unique('users','name')],
            'email'=>['required','email',Rule::Unique('users','email')],
            'password'=>['required','min:8','max:200'],
        ]);
        $incomingFiels['password'] = bcrypt($incomingFiels['password']);
        $user=User::create($incomingFiels);
        Auth()->login($user);
        return redirect('/');
    }
    public function login(Request $request){
        $incomingFiels = $request->validate([
            'name'=>['required'],
            'password'=>['required'],
        ]);
        if (Auth()->attempt($incomingFiels)) {
            $request->session()->regenerate();
        }
        return redirect('/userAccount');
    }
    public function logout(){
        Auth()->logout();
        return redirect('/');
    }
}
