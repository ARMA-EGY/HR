<?php

namespace App\Http\Controllers\Master;
use App\Traits\GeneralTrait;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Employees\AddRequest;
use App\Http\Requests\Employees\UpdateRequest;
use App\Models\Employee;
use App\Models\Contract;
use App\Models\WorkAddress;
use App\Models\User;
use App\Models\AddressType;
use App\Models\Title;
use App\Models\Tag;
use App\Models\WorkingHours;

class WorkingHoursController extends Controller
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
    public function index()
    {
		$workingHours       = WorkingHours::orderBy('id','desc')
        ->get();

        return view('master.workinghours.index', [
            'items' => $workingHours,
            'items_count' => count($workingHours),
        ]);
    }


    //-------------- Get Single Data ---------------\\    

    public function show(WorkingHours $workingHours)
    {
        return view('master.workinghours.show',[
            'workingHours' => $workingHours,
        ]);
    }  


    //-------------- Create New Data ---------------\\

    public function create()
    {
        $workingHoursForm = view('master.workinghours.create',[
        ])->render();

        $rsData = $this->returnData('workingHoursForm', $workingHoursForm);
        return response()->json($rsData, 200);
    }


    //-------------- Store New Data ---------------\\

    public function store(Request $request)
    {
        $workingHour =  WorkAddress::create([
            'name' => $request->name,
            'average_hour_per_day' => $request->average_hour_per_day,
        ]);
        

        $rsData = $this->returnData('workingHour', $workingHour,'Working Hour created successfully');

        return response()->json($rsData, 200);
    }


    //-------------- Edit Data Page ---------------\\
    
    public function edit(WorkingHours $WorkingHours)
    {
		$workingHoursForm = view('master.workinghours.create', [
        ])->render();

        $rsData = $this->returnData('workingHoursForm', $workingHoursForm);
        return response()->json($rsData, 200);
    }

    
    //-------------- Update Data  ---------------\\

    public function update(Request $request, WorkingHours $WorkingHours)
    {
        $WorkingHours->update([
            'name' => $request->name,
            'average_hour_per_day' => $request->average_hour_per_day,
        ]);
		

        $rsData = $this->returnData('workingHoursForm', $workingHoursForm,'working Hours updated successfully');
          
        return response()->json($rsData, 200);
    }

    
    //-------------- Get Data  ---------------\\

    public function get(Request $request)
    {
        $item;
        $workLocationForm;
        
        if(isset($request->id))
        {
            $item =  workLocation::find($request->id);

            $workLocationForm = view('master.components.workLocation',[
                'item' => $item,
            ])->render();
        }else{
            $workingHoursForm = view('master.components.workingHours',[
                ])->render();
        }

        $rsData = $this->returnData('workingHoursForm', $workingHoursForm);
        return response()->json($rsData, 200);
    }


}
