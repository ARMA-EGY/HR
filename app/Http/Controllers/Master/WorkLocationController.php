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
use App\Models\WorkLocation;

class WorkLocationController extends Controller
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
            'name' => $request->work_location,
            'work_address_id' => $request->work_address,
            'location_number' => $request->location_number,
        ]);
        
		$items     = WorkLocation::orderBy('id','desc')->get();

        $data = view('master.components.dropDown',[
            'items'         => $items,
            'id'            => $workLocation->id,
            'data_link'     => $request->data_link,
            'input_name'    => $request->input_name,
            'id_response'   => $request->id_response,
        ])->render();

        $rsData = $this->returnData('data', $data,'Work Location created successfully');

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
        $workLocation->update([
            'name' => $request->work_location,
            'work_address_id' => $request->work_address,
            'location_number' => $request->location_number,
        ]);
        
		$items     = WorkLocation::orderBy('id','desc')->get();

        $data = view('master.components.dropDown',[
            'items'         => $items,
            'id'            => $workLocation->id,
            'data_link'     => $request->data_link,
            'input_name'    => $request->input_name,
            'id_response'   => $request->id_response,
        ])->render();
		
        $rsData = $this->returnData('data', $data,'Work Location updated successfully');
          
        return response()->json($rsData, 200);
    }

    
    //-------------- Get Data  ---------------\\

    public function get(Request $request)
    {
        $workAddresses = WorkAddress::orderBy('id','desc')->get();
        $item;
        $workLocationForm;

        if(isset($request->id))
        {
            $item =  workLocation::find($request->id);
            $workLocationForm = view('master.components.workLocation',[
                'item' => $item,
                'workAddresses' => $workAddresses,
            ])->render();
        }else{
            $workLocationForm = view('master.components.workLocation',[
                'workAddresses' => $workAddresses,
            ])->render();
        }




        $rsData = $this->returnData('workLocationForm', $workLocationForm);
        return response()->json($rsData, 200);
    }


}
