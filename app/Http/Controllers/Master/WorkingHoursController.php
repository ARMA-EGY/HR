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
use App\Models\WorkingHoursSchedule;
use App\Models\workLocation;

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
        $workingHour =  WorkingHours::create([
            'name' => $request->schedule_name,
            'average_hour_per_day' => $request->average_hour_per_day,
        ]);



        for($i = 0; $i < count($request->name); $i++)
        {
            $workingHoursSchedule =  WorkingHoursSchedule::create([
                'working_hour_id' => $workingHour->id,
                'name' => $request->name[$i],
                'day_of_week' => $request->day_of_week[$i],
                'day_period' => $request->day_period[$i],
                'work_from' => $request->work_from[$i],
                'work_to' => $request->work_to[$i],
            ]);
        }



        $rsData = $this->returnData('data', $data,'Working Hour created successfully');

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


		WorkingHoursSchedule::where('working_hour_id',$WorkingHours->id)->delete();


        for($i = 0; $i < count($request->name); $i++)
        {
            $workingHoursSchedule =  WorkingHoursSchedule::create([
                'working_hour_id' => $WorkingHours->id,
                'name' => $request->name[$i],
                'day_of_week' => $request->day_of_week[$i],
                'day_period' => $request->day_period[$i],
                'work_from' => $request->work_from[$i],
                'work_to' => $request->work_to[$i],
            ]);
        }
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
            $item =  WorkingHours::with('WorkingHoursSchedule')->where('id',$request->id)->first();
            
            $workingHoursForm = view('master.components.workingHours',[
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
