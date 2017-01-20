<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\AuthServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    //This is the user controller class for users



    public function signUP( Request $request){

        $this->validate($request, [
            'firstname'=> 'required',
            'lastname'=> 'required',
            'email'=> 'required|unique:users',
            'id'=> 'unique:users',
            'password'=> 'required'

        ]);

        $firstname = $request['firstname'];
        $lastname = $request['lastname'];
        $id = $request['ID'];
        $email = $request['email'];
        $password = bcrypt($request['password']);
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
            $credentials = array(
                'email' => $request['email'],
                'password' => $request['password']
            );
            $user = User::where('email',$request->get('email'))->first();
            if($user->is_admin == 1) {
                if (\Auth::attempt($credentials)) {
                    return redirect()->route('dashboard');

                }

            }

            elseif($user->is_official == 1) {
                if (\Auth::attempt($credentials)) {
                    return redirect()->route('dashboard-official');
                }
            }
            elseif ($user==null){
                return redirect()->back()->with('errors',['Authentication failed please try again']);
            }


            return redirect()->back()->with('errors',['Authentication failed please try again']);
        }


        return view("auth.login");
    }


    public function getDashboard() {
        return view('dashboard');

    }

    public function signUpOfficial (Request $request)
    {
        if ($request->isMethod('post'))
        {
            $this->validate($request, [
                'firstname'=> 'required',
                'lastname'=> 'required',
                'email'=> 'required|unique:users',
                'id'=> 'unique:users|min:6',
                'password'=> 'required'

            ]);

            $firstname = $request['firstname'];
            $lastname = $request['lastname'];
            $id = $request['ID'];
            $email = $request['email'];
            $password = bcrypt($request['password']);
            $county = $request['county'];

            $file = $request->file('image');
            $filename = $request['firstname'].'-'.$request['ID'].'.jpg';

            if ($file)
            {
                Storage::disk('local')->put($filename, File::get($file));
            }

            $user = new User();

            $user->firstname = $firstname;
            $user-> lastname = $lastname;
            $user->is_official=1;
            $user-> id = $id;
            $user-> email = $email;
            $user-> password= $password;
            $user-> county = $county;


            $user->save();

            $request->session()->flash('alert-success','User successfully added!');

            $user = User::where('is_official',1)->count();

            return \View::make('register-official')->with(compact('user'));

            //return redirect()->route('register-official');

        }
        return view('register-official');
    }

    public function signUpEnumerator( Request $request)
    {
        $is_enumerator = 1;

        $this->validate($request, [
            'firstname'=> 'required',
            'lastname'=> 'required',
            'email'=> 'required|unique:users',
            'id'=> 'unique:users|min:6',
            'password'=> 'required'

        ]);

        $firstname = $request['firstname'];
        $lastname = $request['lastname'];
        $id = $request['ID'];
        $email = $request['email'];
        $password = bcrypt($request['password']);
        $county = $request['county'];

        $phone_number = $request->get('phone_number');
        $headoffice = $request->get('headoffice');
        $reportsto = $request->get('reportsto');
        $supervisor_phone = $request->get('supervisor_phone');

        $file = $request->file('image');
        $filename = $request['firstname'].'-'.$request['ID'].'.jpg';

        if ($file)
        {
            Storage::disk('local')->put($filename, File::get($file));
        }

        $user = new User();

        $user->firstname = $firstname;
        $user-> lastname = $lastname;
        $user-> id = $id;
        $user-> email = $email;
        $user-> password= $password;
        $user-> county = $county;

        $user->is_enumerator = $is_enumerator;
        $user->phone_number = $phone_number;
        $user->headoffice = $headoffice;
        $user->reportsto = $reportsto;
        $user->supervisor_phone = $supervisor_phone;



        $user->save();

        $request->session()->flash('alert-success','Enumerator successfully added!');
        $user = User::where('is_official',1)->count();

        return \View::make('register-enumerator')->with(compact('user'));
    }

    public function getUserImage($filename){
        $file = Storage::disk('local')->get($filename);

        return new Response($file, 200);
    }

}
