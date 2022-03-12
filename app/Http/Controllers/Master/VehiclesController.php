<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Models\vehicle;
use App\Models\Employee;
use App\Models\Tag;

class VehiclesController extends Controller
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

        return view('master.vehicles.index', [
        ]);
    }


    //-------------- Get Single Data ---------------\\    

    public function show()
    {
        return view('master.vehicles.show',[
        ]);
    }  
    


    //-------------- Create New Data ---------------\\

    public function create()
    {
        $employees  = Employee::orderBy('id','desc')->get();
        $tags       = Tag::orderBy('id','desc')->get();

        return view('master.vehicles.create',[
            'employees' => $employees,
            'tags' => $tags,
        ]);
    }


    //-------------- Store New Data ---------------\\

    public function store(Request $request)
    {
        $asset =  vehicle::create([
            'model' => $request->model,
            'license_plate' => $request->license_plate,
            'driver_id' => $request->driver_id,
            'future_driver_id' => $request->future_driver_id,
            'assignment_date' => $request->assignment_date,
            'chassis_number' => $request->chassis_number,
            'fleet_manager_id' => $request->fleet_manager_id,
            'location' => $request->location,
            'horsepower_taxation' => $request->horsepower_taxation,
            'first_contract_date' => $request->first_contract_date,
            'catalog_value' => $request->catalog_value,
            'purchase_value' => $request->purchase_value,
            'residual_value' => $request->residual_value,
            'model_year' => $request->model_year,
            'transmission' => $request->transmission,
            'color' => $request->color,
            'horsepower' => $request->horsepower,
            'power' => $request->power,
            'fuel_type' => $request->fuel_type,
            'co2_emissions' => $request->co2_emissions,
            'co2_standard' => $request->co2_standard,
            'notes' => $request->note,
        ]);
        
        $request->session()->flash('success', 'vehicle created successfully');

        return redirect(route('master.vehicles.index'));
    }


    //-------------- Edit Data Page ---------------\\
    
    public function edit()
    {

		return view('master.vehicles.create', [
            ]);
    }

    
    //-------------- Update Data  ---------------\\

    public function update(Request $request)
    {

		return redirect(route('master.vehicles.index'));
    }


}
