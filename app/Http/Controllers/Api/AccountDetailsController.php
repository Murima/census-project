<?php
/**
 * Created by PhpStorm.
 * User: killer
 * Date: 1/11/17
 * Time: 7:15 AM
 */

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\User;

class AccountDetailsController extends Controller
{
    public  function __construct()
    {
        // Apply the jwt.auth middleware to all methods in this controller
        //



        $this->middleware('jwt.auth');
    }

    public function getDetails($email)
    {//get user details and send back a custom JSON
        $user = User::where('email',$email)->get()->first();
        $imgName= $user->firstname."-".$user->id.".jpg";
        $imgUrl='/storage/uploads/'.$imgName;
        $imagePath = asset($imgUrl);

        return response()->json([
            'first_name'=>$user->firstname,
            'last_name'=>$user->lastname,
            'email'=>$user->email,
            'Id'=>$user->id,
            'reports_to'=>$user->reportsto,
            'phone_number'=>$user->phone_number,
            'head_office'=>$user->headoffice,
            'county'=>$user->county,
            'supervisor_phone'=>$user->supervisor_phone,
            'account_img' => $imagePath,

        ]);
    }

}