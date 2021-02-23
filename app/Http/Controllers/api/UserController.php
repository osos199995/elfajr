<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use ApiResponceTrait;
    public function index(){
        $users =User::all();
        return $this->ApiResponce($users);
    }


    public function getUserDepartment($id){
        $users =User::where('department_id',$id)->get();
        return $this->ApiResponce($users);
    }
}
