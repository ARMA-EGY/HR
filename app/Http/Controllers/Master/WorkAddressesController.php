<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Employees\AddRequest;
use App\Http\Requests\Employees\UpdateRequest;
use App\Models\Employee;
use App\Models\Contract;
use App\Models\WorkAddress;
use App\Models\User;

class WorkAddressesController extends Controller
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

		$workAddresses       = WorkAddress::orderBy('id','desc')
        ->get();

        return view('master.workaddress.index', [
            'items' => $workAddresses,
            'items_count' => count($workAddresses),
            'type' => 'all',
        ]);
    }


    //-------------- Get Single Data ---------------\\    

    public function show(WorkAddress $workAddress)
    {
        return view('master.workaddress.show',[
            'contract' => $contract,
        ]);
    }  


    public function showall(WorkAddress $workAddress)
    {
        return view('master.workaddress.show',[
            'workAddress' => $workAddress,
        ]);
    }  
    


    //-------------- Create New Data ---------------\\

    public function create()
    {
		$employees       = User::orderBy('id','desc')->get();
        $departments       = Department::orderBy('id','desc')->get();
        $countries       = Countries::orderBy('id','desc')->get();

        $salaryStructureType       = SalaryStructureType::orderBy('id','desc')->get();
        $workingHours = WorkingHours::orderBy('id','desc')->get();
        $jobPositions = JobPositions::orderBy('id','desc')->get();
        $contractTypes = ContractTypes::orderBy('id','desc')->get();
        

        return view('master.contract.create',[
            'managers' => $employees,
            'departments' => $departments,
            'countries' => $countries,

            'salaryStructureType' => $salaryStructureType,
            'workingHours' => $workingHours,
            'jobPositions' => $jobPositions,
            'contractTypes' => $contractTypes, 
        ]);
    }


    //-------------- Store New Data ---------------\\

    public function store(AddRequest $request)
    {
        $contract =  Contract::create([
            'reference' => $request->reference,
            'employee_id' => $request->employee_id,
            'contract_start_date' => $request->contract_start_date,
            'contract_end_date' => $request->contract_end_date,
            'salary_structure_type_id' => $request->salary_structure_type_id,

            'working_hour_id' => $request->working_hour_id,
            'department_id' => $request->department_id,
            'job_position_id' => $request->job_position_id,
            'contract_type_id' => $request->contract_type_id,
            'hr_responsible_id' => $request->hr_responsible_id,

            'notes' => $request->notes,
            'wage' => $request->wage,
            'status_id' => $request->status_id,
            
        ]);
        
        $request->session()->flash('success', 'Contract created successfully');
        
        return redirect(route('master.contract.index'));
    }


    //-------------- Edit Data Page ---------------\\
    
    public function edit(Contract $contract)
    {
		$employees       = User::orderBy('id','desc')->get();
        $departments       = Department::orderBy('id','desc')->get();
        $countries       = Countries::orderBy('id','desc')->get();

        $salaryStructureType       = SalaryStructureType::orderBy('id','desc')->get();
        $workingHours = WorkingHours::orderBy('id','desc')->get();
        $jobPositions = JobPositions::orderBy('id','desc')->get();
        $contractTypes = ContractTypes::orderBy('id','desc')->get();

		return view('master.employee.create', [
            'managers' => $employees,
            'departments' => $departments,
            'countries' => $countries,

            'salaryStructureType' => $salaryStructureType,
            'workingHours' => $workingHours,
            'jobPositions' => $jobPositions,
            'contractTypes' => $contractTypes, 
            ]);
    }

    
    //-------------- Update Data  ---------------\\

    public function update(UpdateRequest $request, Contract $contract)
    {

        $contract->update([
            'reference' => $request->reference,
            'employee_id' => $request->employee_id,
            'contract_start_date' => $request->contract_start_date,
            'contract_end_date' => $request->contract_end_date,
            'salary_structure_type_id' => $request->salary_structure_type_id,

            'working_hour_id' => $request->working_hour_id,
            'department_id' => $request->department_id,
            'job_position_id' => $request->job_position_id,
            'contract_type_id' => $request->contract_type_id,
            'hr_responsible_id' => $request->hr_responsible_id,

            'notes' => $request->notes,
            'wage' => $request->wage,
            'status_id' => $request->status_id,
        ]);
		
		session()->flash('success', 'Contract updated successfully');
		
		return redirect(route('master.contract.index'));
    }
}
