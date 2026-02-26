<?php
namespace App\Http\Controllers;

use App\Models\User;
use Symfony\Component\Mime\Email;


class ValidateController{

    public static function validate($request){
        $email = User::with($request->email);

        if(empty($request->name) && empty($request->email) && $email == $request->email)
            return false;
        else
            return true;
    }

}