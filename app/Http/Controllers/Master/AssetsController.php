<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Models\Employee;
use App\Models\Department;

use App\Models\Asset;
use App\Models\AssetsCategory;
use App\Models\MaintenanceTeam;
use App\Models\MaintenanceTeamMember;

class AssetsController extends Controller
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
		$items       = Asset::orderBy('id','desc')->get();

        return view('master.assets.index', [
            'items' => $items,
            'items_count' => count($items),
        ]);
    }


    //-------------- Get Single Data ---------------\\    

    public function show()
    {
        return view('master.assets.show',[
        ]);
    }  
    


    //-------------- Create New Data ---------------\\

    public function create()
    {
        $employees              = Employee::orderBy('id','desc')->get();
        $departments            = Department::orderBy('id','desc')->get();
        $assets                 = Asset::orderBy('id','desc')->get();
        $assetsCategories       = AssetsCategory::orderBy('id','desc')->get();
        $maintenanceTeams       = MaintenanceTeam::orderBy('id','desc')->get();
        $maintenanceTeamMembers = MaintenanceTeamMember::orderBy('id','desc')->get();

        return view('master.assets.create',[
            'employees' => $employees,
            'departments' => $departments,
            'assets' => $assets,
            'assetsCategories' => $assetsCategories,
            'maintenanceTeams' => $maintenanceTeams,
            'maintenanceTeamMembers' => $maintenanceTeamMembers,
        ]);
    }


    //-------------- Store New Data ---------------\\

    public function store(Request $request)
    {
        $asset =  Asset::create([
            'name' => $request->name,
            'asset_category_id' => $request->category_id,
            'used_by' => $request->used_by,
            'employee_id' => $request->employee_id,
            'maintenance_team_id' => $request->maintenance_team_id,

            'technician_id' => $request->technician_id,
            'used_in_location' => $request->used_in_location,
            'description' => $request->description,
            'vendor_id' => $request->vendor_id,
            'vendor_reference' => $request->vendor_reference,

            'model' => $request->model,
            'serial_number' => $request->serial_number,
            'effective_date' => $request->effective_date,
            'cost' => $request->cost,
            'warranty_expiration_date' => $request->warranty_expiration_date,
            'preventive_maintenance_frequency' => $request->preventive_maintenance_frequency,
            'maintenance_duration' => $request->maintenance_duration,
            
        ]);
        
        $request->session()->flash('success', 'Contract created successfully');

        return redirect(route('master.assets.index'));
    }


    //-------------- Edit Data Page ---------------\\
    
    public function edit(Asset $asset)
    {

        $employees              = Employee::orderBy('id','desc')->get();
        $departments            = Department::orderBy('id','desc')->get();
        $assets                 = Asset::orderBy('id','desc')->get();
        $assetsCategories       = AssetsCategory::orderBy('id','desc')->get();
        $maintenanceTeams       = MaintenanceTeam::orderBy('id','desc')->get();
        $maintenanceTeamMembers = MaintenanceTeamMember::orderBy('id','desc')->get();

        return view('master.assets.create',[
            'item' => $asset,
            'employees' => $employees,
            'departments' => $departments,
            'assets' => $assets,
            'assetsCategories' => $assetsCategories,
            'maintenanceTeams' => $maintenanceTeams,
            'maintenanceTeamMembers' => $maintenanceTeamMembers,
        ]);
    }

    
    //-------------- Update Data  ---------------\\

    public function update(Request $request, Asset $asset)
    {
        $asset->update([
            'name' => $request->name,
            'asset_category_id' => $request->category_id,
            'used_by' => $request->used_by,
            'employee_id' => $request->employee_id,
            'maintenance_team_id' => $request->maintenance_team_id,

            'technician_id' => $request->technician_id,
            'used_in_location' => $request->used_in_location,
            'description' => $request->description,
            'vendor_id' => $request->vendor_id,
            'vendor_reference' => $request->vendor_reference,

            'model' => $request->model,
            'serial_number' => $request->serial_number,
            'effective_date' => $request->effective_date,
            'cost' => $request->cost,
            'warranty_expiration_date' => $request->warranty_expiration_date,
            'preventive_maintenance_frequency' => $request->preventive_maintenance_frequency,
            'maintenance_duration' => $request->maintenance_duration,
            
        ]);
        
        $request->session()->flash('success', 'Contract created successfully');

        return redirect(route('master.assets.index'));
    }


}
