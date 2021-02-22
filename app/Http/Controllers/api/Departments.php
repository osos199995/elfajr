<?php

namespace App\Http\Controllers\api;

use App\Department;
use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentRequest;
use Illuminate\Http\Request;

class Departments extends Controller
{
    use ApiResponceTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $departments=Department::all();
      return $this->ApiResponce($departments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentRequest $request)
    {

    $department=  Department::create([
          'name'=>$request->name,
          'status'=>$request->status,
      ]);
        return $this->ApiResponce($department,['تم انشاء القسم بنجاح']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DepartmentRequest $request, $id)
    {

     $department =Department::find($id);
        if ($department){
     $department->update([
         'name'=>$request->name,
         'status'=>$request->status,
     ]);
        return $this->ApiResponce($department,['تم تحديث القسم بنجاح']);
        }
            return $this->ApiResponce(['هذا القسم غير موجود']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

            $department =Department::find($id);
         if ($department){
            $department->delete();
            return $this->ApiResponce($department,['تم حذف القسم بنجاح']);

        }
        return $this->ApiResponce(['هذا القسم غير موجود']);
        }

}
