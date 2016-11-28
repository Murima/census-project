<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    //This is the user controller for users

    public function signUP( Request $request){

        $firstname = $request['firstname'];
        $lastname = $request['lastname'];
        $id = $request['ID'];
        $email = $request['email'];
        $county = $request['county'];

        $user = new User();

        $user->firstname = $firstname;
        $user-> lastname = $lastname;
        $user-> id = $id;
        $user-> email = $email;
        $user-> county = $county;

        $user->save();

        return view('success');

    }
}
