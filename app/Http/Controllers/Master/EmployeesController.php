<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Employees\AddRequest;
use App\Http\Requests\Employees\UpdateRequest;
use App\Models\Employee;
use App\Models\User;

class EmployeesController extends Controller
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
    public function index()
    {

		$employees       = Employee::orderBy('id','desc')
        ->get();

        return view('master.employee.index', [
            'items' => $employees,
            'items_count' => count($employees),
            'type' => 'all',
        ]);
    }


    //-------------- Get Single Data ---------------\\    

    public function show(Employee $employee)
    {
        return view('master.employee.show',[
            'employee' => $employee,
        ]);
    }  
    


    //-------------- Create New Data ---------------\\

    public function create()
    {
		$managers       = User::orderBy('id','desc')->get();
        $departments       = Department::orderBy('id','desc')->get();
        $countries       = Countries::orderBy('id','desc')->get();

        $tags       = Tag::orderBy('id','desc')->get();
        $employeeWorkAddresses = EmployeeWorkAddresses::orderBy('id','desc')->get();
        $employeeWorkLocations = EmployeeWorkLocations::orderBy('id','desc')->get();
        $workingHours = WorkingHours::orderBy('id','desc')->get();
        $timeZones = TimeZones::orderBy('id','desc')->get();
        $maritalStatus = MaritalStatus::orderBy('id','desc')->get();
        $certificateLevel = CertificateLevel::orderBy('id','desc')->get();
        $employeesTypes = EmployeesTypes::orderBy('id','desc')->get();
        

        return view('master.employee.create',[
            'managers' => $managers,
            'departments' => $departments,
            'countries' => $countries,

            'tags' => $tags,
            'employeeWorkAddresses' => $employeeWorkAddresses,
            'employeeWorkLocations' => $employeeWorkLocations,
            'workingHours' => $workingHours,
            'timeZones' => $timeZones,
            'maritalStatus' => $maritalStatus,
            'certificateLevel' => $certificateLevel,
            'employeesTypes' => $employeesTypes,
                     
        ]);
    }


    //-------------- Store New Data ---------------\\

    public function store(AddRequest $request)
    {
        $employee =  Employee::create([
            'name' => $request->name,
            'job_position' => $request->job_position,
            'work_mobile' => $request->work_mobile,
            'work_phone' => $request->work_phone,
            'work_email' => $request->work_email,

            'department_id' => $request->department_id,
            'manager_id' => $request->manager_id,
            'coach_id' => $request->coach_id,
            'work_address_id' => $request->work_address_id,
            'work_location_id' => $request->work_location_id,

            'working_hour_id' => $request->working_hour_id,
            'time_zone_id' => $request->time_zone_id,
            'address_id' => $request->address_id,
            'language_id' => $request->language_id,
            'home_work_distance' => $request->home_work_distance,

            'nationality_id' => $request->nationality_id,
            'identification_no' => $request->identification_no,
            'passport' => $request->passport,
            'gender' => $request->gender,
            'dateofbirth' => $request->dateofbirth,

            'countryofbirth_id' => $request->countryofbirth_id,
            'maritalstatus_id' => $request->maritalstatus_id,
            'no_ofchildren' => $request->no_ofchildren,
            'emergency_contact' => $request->emergency_contact,
            'emergency_phone' => $request->emergency_phone,

            'visa_no' => $request->visa_no,
            'work_permit_no' => $request->work_permit_no,
            'visa_expire_date' => $request->visa_expire_date,
            'work_permit_expire_date' => $request->work_permit_expire_date,
            'certificate_level_id' => $request->certificate_level_id,

            'field_of_study' => $request->field_of_study,
            'school' => $request->school,
            'type_id' => $request->type_id,
            
        ]);
        
        $request->session()->flash('success', 'Employee created successfully');
        
        return redirect(route('master.employee.index'));
    }


    //-------------- Edit Data Page ---------------\\
    
    public function edit(Employee $employee)
    {
		$managers       = User::orderBy('id','desc')->get();
        $departments       = Department::orderBy('id','desc')->get();
        $countries       = Countries::orderBy('id','desc')->get();

        $tags       = Tag::orderBy('id','desc')->get();
        $employeeWorkAddresses = EmployeeWorkAddresses::orderBy('id','desc')->get();
        $employeeWorkLocations = EmployeeWorkLocations::orderBy('id','desc')->get();
        $workingHours = WorkingHours::orderBy('id','desc')->get();
        $timeZones = TimeZones::orderBy('id','desc')->get();
        $maritalStatus = MaritalStatus::orderBy('id','desc')->get();
        $certificateLevel = CertificateLevel::orderBy('id','desc')->get();
        $employeesTypes = EmployeesTypes::orderBy('id','desc')->get();

		return view('master.employee.create', [
            'item' => $employee,
            'managers' => $managers,
            'departments' => $departments,
            'countries' => $countries,

            'tags' => $tags,
            'employeeWorkAddresses' => $employeeWorkAddresses,
            'employeeWorkLocations' => $employeeWorkLocations,
            'workingHours' => $workingHours,
            'timeZones' => $timeZones,
            'maritalStatus' => $maritalStatus,
            'certificateLevel' => $certificateLevel,
            'employeesTypes' => $employeesTypes,
            ]);
    }

    
    //-------------- Update Data  ---------------\\

    public function update(UpdateRequest $request, Employee $employee)
    {

        $department->update([
            'name' => $request->name,
            'job_position' => $request->job_position,
            'work_mobile' => $request->work_mobile,
            'work_phone' => $request->work_phone,
            'work_email' => $request->work_email,

            'department_id' => $request->department_id,
            'manager_id' => $request->manager_id,
            'coach_id' => $request->coach_id,
            'work_address_id' => $request->work_address_id,
            'work_location_id' => $request->work_location_id,

            'working_hour_id' => $request->working_hour_id,
            'time_zone_id' => $request->time_zone_id,
            'address_id' => $request->address_id,
            'language_id' => $request->language_id,
            'home_work_distance' => $request->home_work_distance,

            'nationality_id' => $request->nationality_id,
            'identification_no' => $request->identification_no,
            'passport' => $request->passport,
            'gender' => $request->gender,
            'dateofbirth' => $request->dateofbirth,

            'countryofbirth_id' => $request->countryofbirth_id,
            'maritalstatus_id' => $request->maritalstatus_id,
            'no_ofchildren' => $request->no_ofchildren,
            'emergency_contact' => $request->emergency_contact,
            'emergency_phone' => $request->emergency_phone,

            'visa_no' => $request->visa_no,
            'work_permit_no' => $request->work_permit_no,
            'visa_expire_date' => $request->visa_expire_date,
            'work_permit_expire_date' => $request->work_permit_expire_date,
            'certificate_level_id' => $request->certificate_level_id,

            'field_of_study' => $request->field_of_study,
            'school' => $request->school,
            'type_id' => $request->type_id,
        ]);
		
		session()->flash('success', 'Employee updated successfully');
		
		return redirect(route('master.employee.index'));
    }
}
