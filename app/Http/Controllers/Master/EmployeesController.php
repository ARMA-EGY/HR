<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Employees\AddRequest;
use App\Http\Requests\Employees\UpdateRequest;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Countries;
use App\Models\WorkAddress;
use App\Models\Tag;
use App\Models\WorkLocation;
use App\Models\WorkingHours;
use App\Models\MaritalStatus;
use App\Models\CertificateLevel;
use App\Models\EmployeesTypes;
use App\Models\Language;
use App\Models\JobPositions;


use App\User;

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
		$employees       = Employee::orderBy('id','desc')->get();

        return view('master.employee.index', [
            'items' => $employees,
            'items_count' => count($employees),
        ]);
    }


    //-------------- Get Single Data ---------------\\    

    public function show(Employee $employee)
    {
		$managers           = Employee::orderBy('id','desc')->get();
        $departments        = Department::orderBy('id','desc')->get();
        $countries          = Countries::all();
        $workAddress        = WorkAddress::orderBy('id','desc')->get();
        $tags               = Tag::orderBy('id','desc')->get();
        $workLocations      = WorkLocation::orderBy('id','desc')->get();
        $workingHours       = WorkingHours::orderBy('id','desc')->get();
        $maritalStatuses    = MaritalStatus::orderBy('id','desc')->get();
        $certificateLevels  = CertificateLevel::orderBy('id','desc')->get();
        $employeesTypes     = EmployeesTypes::orderBy('id','desc')->get();
        $languages          = Language::orderBy('id','desc')->get();
        $jobPositions       = JobPositions::orderBy('id','desc')->get();

        return view('master.employee.show',[
            'item'              => $employee,
            'managers'          => $managers,
            'departments'       => $departments,
            'countries'         => $countries,
            'workAddress'       => $workAddress,
            'tags'              => $tags,
            'workLocations'     => $workLocations,
            'workingHours'      => $workingHours,
            'maritalStatuses'   => $maritalStatuses,
            'certificateLevels' => $certificateLevels,
            'employeesTypes'    => $employeesTypes,
            'languages'         => $languages,
            'jobPositions'      => $jobPositions,  
        ]);
    }  
    


    //-------------- Create New Data ---------------\\

    public function create()
    {
		$managers           = Employee::orderBy('id','desc')->get();
        $departments        = Department::orderBy('id','desc')->get();
        $countries          = Countries::all();
        $workAddress        = WorkAddress::orderBy('id','desc')->get();
        $tags               = Tag::orderBy('id','desc')->get();
        $workLocations      = WorkLocation::orderBy('id','desc')->get();
        $workingHours       = WorkingHours::orderBy('id','desc')->get();
        $maritalStatuses    = MaritalStatus::orderBy('id','desc')->get();
        $certificateLevels  = CertificateLevel::orderBy('id','desc')->get();
        $employeesTypes     = EmployeesTypes::orderBy('id','desc')->get();
        $languages          = Language::orderBy('id','desc')->get();
        $jobPositions       = JobPositions::orderBy('id','desc')->get();

        return view('master.employee.create',[
            'managers'          => $managers,
            'departments'       => $departments,
            'countries'         => $countries,
            'workAddress'       => $workAddress,
            'tags'              => $tags,
            'workLocations'     => $workLocations,
            'workingHours'      => $workingHours,
            'maritalStatuses'   => $maritalStatuses,
            'certificateLevels' => $certificateLevels,
            'employeesTypes'    => $employeesTypes,
            'languages'         => $languages,
            'jobPositions'      => $jobPositions,           
        ]);
    }


    //-------------- Store New Data ---------------\\

    public function store(Request $request)
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
            'address_id' => $request->address_id,
            'language_id' => $request->language_id,
            'email' => $request->email,
            'phone' => $request->phone,
            'home_work_distance' => $request->home_work_distance,

            'nationality_id' => $request->nationality_id,
            'identification_no' => $request->identification_no,
            'passport' => $request->passport,
            'gender' => $request->gender,
            'dateofbirth' => $request->dateofbirth,
            'placeofbirth' => $request->placeofbirth,
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
            'pin_code' => $request->pin_code,
            'badge_id' => $request->badge_id,
            'job_position_id' => $request->job_position_id,
            
        ]);
        //dd($employee);
        $request->session()->flash('success', 'Employee created successfully');
        
        return redirect(route('master.employee.index'));
    }


    //-------------- Edit Data Page ---------------\\
    
    public function edit(Employee $employee)
    {
		$managers       = User::orderBy('id','desc')->get();
        $departments       = Department::orderBy('id','desc')->get();
        $countries       = Countries::all();
        $workAddress = WorkAddress::orderBy('id','desc')->get();
        $tags       = Tag::orderBy('id','desc')->get();
        $workLocations = WorkLocation::orderBy('id','desc')->get();
        $workingHours = WorkingHours::orderBy('id','desc')->get();
        $maritalStatuses = MaritalStatus::orderBy('id','desc')->get();
        $certificateLevels = CertificateLevel::orderBy('id','desc')->get();
        $employeesTypes = EmployeesTypes::orderBy('id','desc')->get();
        $languages = Language::orderBy('id','desc')->get();
        $jobPositions = JobPositions::orderBy('id','desc')->get();

		return view('master.employee.create', [
            'item' => $employee,
            'managers' => $managers,
            'departments' => $departments,
            'countries' => $countries,
            'workAddress' => $workAddress,
            'tags' => $tags,
            'workLocations' => $workLocations,
            'workingHours' => $workingHours,
            'maritalStatuses' => $maritalStatuses,
            'certificateLevels' => $certificateLevels,
            'employeesTypes' => $employeesTypes,
            'languages' => $languages,
            'jobPositions' => $jobPositions,
            ]);
    }

    
    //-------------- Update Data  ---------------\\

    public function update(Request $request, Employee $employee)
    {
        $employee->update([
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
            'email' => $request->email,
            'phone' => $request->phone,
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
            'pin_code' => $request->pin_code,
            'badge_id' => $request->badge_id,
            'job_position_id' => $request->job_position_id,
        ]);
		
		session()->flash('success', 'Employee updated successfully');
		
		return redirect(route('master.employee.index'));
    }
}
