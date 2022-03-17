<?php

namespace App\Http\Controllers\Master;
use App\Traits\GeneralTrait;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Models\Countries;
use App\Models\Employee;
use App\Models\WorkAddress;
use App\Models\Department;
use App\Models\JobPositions;

class JobPositionController extends Controller
{
    use GeneralTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    //-------------- Get All Data ---------------\\

    public function index()
    {

    }


    //-------------- Get Single Data ---------------\\    

    public function show()
    {
        
    }  
    

    //-------------- Create New Data ---------------\\

    public function create()
    {
        
    }


    //-------------- Store New Data ---------------\\

    public function store(Request $request)
    {
        $jobPositions =  JobPositions::create([
            'name' => $request->job_position,
            'job_description' => $request->job_description,
            'department_id' => $request->department_id,
            'work_address_id' => $request->work_address_id,
            'email' => $request->email_alias,
            'expected_new_employees' => $request->expected_new_employees,
            'recruiter_id' => $request->recruiter_id,
            'published' => $request->is_published,
        ]);
        

        $rsData = $this->returnData('jobPositions', $jobPositions,'Address created successfully');

        return response()->json($rsData, 200);  
    }


    //-------------- Edit Data Page ---------------\\
    
    public function edit()
    {
        
    }

    
    //-------------- Update Data  ---------------\\

    public function update(Request $request, JobPositions $jobPosition)
    {
        $jobPosition->update([
            'name' => $request->job_position,
            'job_description' => $request->job_description,
            'department_id' => $request->department_id,
            'work_address_id' => $request->work_address_id,
            'email' => $request->email_alias,
            'expected_new_employees' => $request->expected_new_employees,
            'recruiter_id' => $request->recruiter_id,
            'published' => $request->is_published,
        ]);
        

        $rsData = $this->returnData('jobPosition', $jobPosition,'job position updated successfully');

        return response()->json($rsData, 200);  
    }

    
    //-------------- Get Data  ---------------\\

    public function get(Request $request)
    {
        $recruiters       = Employee::orderBy('id','desc')->get();
        $departments       = Department::orderBy('id','desc')->get();
        $countries       = Countries::all();
        $workAddresses = WorkAddress::orderBy('id','desc')->get();
        $item;
        $jobPositionForm;
        
        if(isset($request->id))
        {
            $item =  JobPositions::find($request->id);

            $jobPositionForm = view('master.components.jobPosition',[
                'item' => $item,
                'workAddresses' => $workAddresses,
                'countries' => $countries,
                'departments' => $departments,
                'recruiters' => $recruiters,
            ])->render();

        }else{
            $jobPositionForm = view('master.components.jobPosition',[
                'workAddresses' => $workAddresses,
                'countries' => $countries,
                'departments' => $departments,
                'recruiters' => $recruiters,
            ])->render();
        }


        $rsData = $this->returnData('jobPositionForm', $jobPositionForm);
        return response()->json($rsData, 200);
    }


}
