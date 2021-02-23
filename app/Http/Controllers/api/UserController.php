<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
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
    // ali
    public function editUser(RegisterRequest $request , $id){
        $user=User::find($id);
        if ($user){
            $user->update([
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
            return $this->ApiResponce($user,"updated success");
        }
        return $this->ApiResponce("did not fiend");

    }
}
