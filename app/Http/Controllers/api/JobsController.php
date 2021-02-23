<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobsRequest;
use App\Jobs;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    use ApiResponceTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs=Jobs::all();
        return $this->ApiResponce($jobs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobsRequest $request)
    {

        $job=  Jobs::create([
            'name'=>$request->name,
            'status'=>$request->status,
        ]);
        return $this->ApiResponce($job,['تم انشاء الوظيفة بنجاح']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(JobsRequest $request, $id)
    {

        $job =Jobs::find($id);
        if ($job){
            $job->update([
                'name'=>$request->name,
                'status'=>$request->status,
            ]);
            return $this->ApiResponce($job,['تم تحديث الوظيفة بنجاح']);
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

        $job =Jobs::find($id);
        if ($job){
            $job->delete();
            return $this->ApiResponce($job,['تم حذف الوظيفة بنجاح']);

        }
        return $this->ApiResponce(['هذه الوظيفة غير موجود']);
    }
}
