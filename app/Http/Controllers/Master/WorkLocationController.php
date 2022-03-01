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
use App\Models\AddressType;
use App\Models\Title;
use App\Models\Tag;
use App\Models\WorkLocation;

class WorkLocationController extends Controller
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

		$workLocation       = WorkLocation::orderBy('id','desc')
        ->get();

        return view('master.worklocation.index', [
            'items' => $workLocation,
            'items_count' => count($workLocation),
        ]);
    }


    //-------------- Get Single Data ---------------\\    

    public function show(WorkLocation $workLocation)
    {
        return view('master.worklocation.show',[
            'workLocation' => $workLocation,
        ]);
    }  


    //-------------- Create New Data ---------------\\

    public function create()
    {
        $workLocationForm = view('master.worklocation.create',[
        ])->render();

        $rsData = $this->returnData('workLocationForm', $workLocationForm);
        return response()->json($rsData, 200);
    }


    //-------------- Store New Data ---------------\\

    public function store(Request $request)
    {
        $workLocation =  WorkLocation::create([
            'name' => $request->name,
            'work_address_id' => $request->work_address_id,
            'location_number' => $request->location_number,
        ]);
        

        $rsData = $this->returnData('workLocation', $workLocation,'Work Location created successfully');

        return response()->json($rsData, 200);
    }


    //-------------- Edit Data Page ---------------\\
    
    public function edit(WorkLocation $workLocation)
    {
		$workLocationForm = view('master.worklocation.create', [
        ])->render();

        $rsData = $this->returnData('workLocationForm', $workLocationForm);
        return response()->json($rsData, 200);
    }

    
    //-------------- Update Data  ---------------\\

    public function update(Request $request, workLocation $workLocation)
    {
        $workLocationForm->update([
            'name' => $request->name,
            'work_address_id' => $request->work_address_id,
            'location_number' => $request->location_number,
        ]);
		

        $rsData = $this->returnData('workLocationForm', $workLocationForm,'Work Location updated successfully');
          
        return response()->json($rsData, 200);
    }

    
    //-------------- Get Data  ---------------\\

    public function get(Request $request)
    {
        
        return view('master.components.workLocation',[

        ]);
    }


}
