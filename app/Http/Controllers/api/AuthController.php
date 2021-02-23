<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Requests\RegisterAuthRequest;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
class AuthController extends Controller
{



    public $token = true;

        public function Register(RegisterRequest $request)
        {

            $user = User::create([
                'f_name' => $request->f_name,
                'm_name' => $request->m_name,
                'l_name' => $request->l_name,
                'date_hiring' => $request->date_hiring,
                'salary' => $request->salary,
                'employee_national_id' => $request->employee_national_id,
                'email' => $request->email,
                'phone' => $request->phone,
                'role_id' => $request->role_id,
                'department_id' => $request->department_id,
                'image' => $request->image,
                'address' => $request->address,
                'birth_date' => $request->birth_date,
                'job_title' => $request->job_title,
                'cv' => $request->cv,
                'password' => bcrypt($request->password),
            ]);
            return response()->json(['message'=>'your registered successfully',200]);
        }

    public function login(Request  $request)
    {
        $credentials = request(['email', 'password']);

        $user=User::where('email',$request->email)->first();

        if (!$userToken=JWTAuth::fromUser($user)) {
            return response()->json(['error' => 'invalid_credentials'], 401);
        }

        return response()->json(compact('userToken'));

    }


}
