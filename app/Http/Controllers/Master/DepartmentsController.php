<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Department\AddRequest;
use App\Http\Requests\Department\UpdateRequest;
use App\Models\Department;
use App\User;

class DepartmentsController extends Controller
{
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
		$departments       = Department::orderBy('id','desc')
        ->get();

        return view('master.department.index', [
            'items' => $departments,
            'items_count' => count($departments),
            'type' => 'all',
        ]);
    }


    //-------------- Get Single Data ---------------\\    

    public function show(Department $department)
    {
        return view('master.department.show',[
            'department' => $department,
        ]);
    }  
    


    //-------------- Create New Data ---------------\\

    public function create()
    {
		$managers       = User::orderBy('id','desc')->get();
        $departments       = Department::orderBy('id','desc')->get();
        return view('master.department.create',[
            'managers' => $managers,
            'departments' => $departments,
        ]);
    }


    //-------------- Store New Data ---------------\\

    public function store(Request $request)
    {
        $department =  Department::create([
            'name' => $request->department_name,
            'parent_department_id' => $request->parent_department_id,
            'manager_id' => $request->manager_id,
            'employee_appraisal_template' => $request->employee_appraisal_template,
            'manager_appraisal_template' => $request->manager_appraisal_template,
        ]);
        
        $request->session()->flash('success', 'Department created successfully');
        
        return redirect(route('master.department.index'));
    }


    //-------------- Edit Data Page ---------------\\
    
    public function edit(Department $department)
    {
		$managers       = User::orderBy('id','desc')->get();
        $departments       = Department::orderBy('id','desc')->get();
		return view('master.department.create', [
            'item' => $department,
            'managers' => $managers,
            'departments' => $departments,
            ]);
    }

    
    //-------------- Update Data  ---------------\\

    public function update(Request $request, Department $department)
    {

        $department->update([
            'name' => $request->department_name,
            'parent_department_id' => $request->parent_department_id,
            'manager_id' => $request->manager_id,
            'employee_appraisal_template' => $request->employee_appraisal_template,
            'manager_appraisal_template' => $request->manager_appraisal_template,
        ]);
		
		session()->flash('success', 'Department updated successfully');
		
		return redirect(route('master.department.index'));
    }


}
