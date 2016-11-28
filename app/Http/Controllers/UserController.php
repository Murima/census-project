<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\AuthServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


class UserController extends Controller
{
    //This is the user controller for users

    public function gethomePage() {
        redirect('dashboard');

    }

    public function signUP( Request $request){

        $firstname = $request['firstname'];
        $lastname = $request['lastname'];
        $id = $request['ID'];
        $email = $request['email'];
        $password = $request['password'];
        $county = $request['county'];

        $user = new User();

        $user->firstname = $firstname;
        $user-> lastname = $lastname;
        $user-> id = $id;
        $user-> email = $email;
        $user-> password= $password;
        $user-> county = $county;

        $user->save();

        return view('success');

    }

    public function signIn( Request $request){

        if ($request->isMethod('post')){

            $validator = \Validator::make($request['email'], $request['password'], array(
                "username" => "required|min:4",
                "password" => "required|min:6"
            ));

            if ($validator->passes()) {
                $credentials = array(
                    'email' => $request['email'],
                    'password' => $request['password']
                );


                if (\Auth::attempt($credentials)) {
                    return redirect()->route('dashboard');

                }

            }
            return redirect()->route('dashboard');
        }


        return view("loginpage");
    }
}
