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
            'workAddress' => $workAddress,
        ]);
    }  


    //-------------- Create New Data ---------------\\

    public function create()
    {
        $countries     = Countries::orderBy('id','desc')->get();

        //no models created for this tables
        // $address_type  = AddressType::orderBy('id','desc')->get();
        // $title         = Title::orderBy('id','desc')->get();
        // $tags          = Tag::orderBy('id','desc')->get();
        

        $workAddressForm = view('master.workaddress.create',[
            'countries' => $countries,

            //no models created for this tables
            // 'address_type' => $address_type,
            // 'title' => $title,
            // 'tags' => $tags,
        ])->render();

        $rsData = $this->returnData('workAddressForm', $workAddressForm);
        return response()->json($rsData, 200);
    }


    //-------------- Store New Data ---------------\\

    public function store(AddRequest $request)
    {
        $workAddress =  WorkAddress::create([
            'individual_company' => $request->individual_company,
            'name' => $request->name,
            'address_type_id' => $request->address_type_id,
            'street' => $request->street,
            'street2' => $request->street2,
            'city' => $request->city,
            'state' => $request->state,
            'zip' => $request->zip,
            'country_id' => $request->country_id,
            'tax_id' => $request->tax_id,
            'job_position' => $request->job_position,
            'phone' => $request->phone,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'website' => $request->website,
            'title_id' => $request->title_id,
            'tag_id' => $request->tag_id,
            
        ]);
        

        $rsData = $this->returnData('workAddress', $workAddress,'Address created successfully');

        return response()->json($rsData, 200);
    }


    //-------------- Edit Data Page ---------------\\
    
    public function edit(WorkAddress $workAddress)
    {
        $countries     = Countries::orderBy('id','desc')->get();

        //no models created for this tables
        // $address_type  = AddressType::orderBy('id','desc')->get();
        // $title         = Title::orderBy('id','desc')->get();
        // $tags          = Tag::orderBy('id','desc')->get();

		$workAddressForm = view('master.workaddress.create', [
            'workAddress' => $workAddress,
            'countries' => $countries,

            //no models created for this tables
            // 'address_type' => $address_type,
            // 'title' => $title,
            // 'tags' => $tags,
        ])->render();

        $rsData = $this->returnData('workAddressForm', $workAddressForm);
        return response()->json($rsData, 200);
    }

    
    //-------------- Update Data  ---------------\\

    public function update(UpdateRequest $request, WorkAddress $workAddress)
    {
        $workAddress->update([
            'individual_company' => $request->individual_company,
            'name' => $request->name,
            'address_type_id' => $request->address_type_id,
            'street' => $request->street,
            'street2' => $request->street2,
            'city' => $request->city,
            'state' => $request->state,
            'zip' => $request->zip,
            'country_id' => $request->country_id,
            'tax_id' => $request->tax_id,
            'job_position' => $request->job_position,
            'phone' => $request->phone,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'website' => $request->website,
            'title_id' => $request->title_id,
            'tag_id' => $request->tag_id,
        ]);
		

        $rsData = $this->returnData('workAddress', $workAddress,'Address updated successfully');
          
        return response()->json($rsData, 200);
    }

    
    //-------------- Get Data  ---------------\\

    public function get(Request $request)
    {
        
        return view('master.components.workAddress',[

        ]);
    }
}
