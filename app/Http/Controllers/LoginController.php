<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{
    public function showLoginForm(){
        return view('backend.pages.auth.login-backend');
    }



    public function loginProcess(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credential = $request->only(['email', 'password']);

        if (Auth::attempt($credential)) {
            if (auth()->user()->role == 'customer') {
                return redirect()->route('home');
            } elseif (auth()->user()->role == 'admin') {
                notify()->error('error','Login Success');
                return redirect()->route('dashboard');
            }
        } else {
            notify()->error('error','Something went wrong, check again');
            return redirect()->back();
        }
    }


public function logout(){

    Auth::logout();
    return redirect()->route('home');

}


public function registration(){
    return view('backend.pages.auth.registration');
}

public function registrationStore(Request $request){

    $validator = Validator::make($request->all(), [
        'email' => 'required|email|unique:users',
        'phone' => [
            'required',
            'regex:/^(?:\+?88|0088)?01[13-9]\d{8}$/'
        ],
        'address' => 'required',
        'name' => 'required',
        'password' => 'required|min:5',
    ], [
        'phone.regex' => 'The phone number should be a valid number.'
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }
   // dd($request->all());

    User::create([

        "email"=>$request->email,

        "phone"=>$request->phone,

        "address"=>$request->address,

        "name"=>$request->name,

        "password"=>bcrypt($request->password),

        "role"=>'customer',

    ]);
    notify()->success('Registration successful!.');
    return redirect('/login-frontend')->withSuccess('Registration Success');

}

public function showLoginFormFrontend(){
    return view('backend.pages.auth.login');
}

}
