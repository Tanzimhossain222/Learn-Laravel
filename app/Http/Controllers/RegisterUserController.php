<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisterUserController extends Controller
{
    public function create(Request $request){
       return view('auth.register');
    }

    public function store(Request $request){
      //validate
     $attributes= $request->validate([
        'first_name' =>[ 'required'],
        'last_name' => ['required'],
        'email' => ['required','email', 'max:255'],
        'password' => ['required',Password::min(6)->letters()->mixedCase()->numbers(), 'confirmed'],
      ]);

      // create and save the user
      $user = User::create($attributes);

      // login the user
      Auth::login($user);

      // redirect
      return redirect('/jobs');

    }

}
