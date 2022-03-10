<?php

namespace App\Http\Controllers\Master;
use App\Traits\GeneralTrait;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Models\Countries;
use App\Models\WorkAddress;

class AddressController extends Controller
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
    //-------------- Get All Data ---------------\\

    public function index()
    {

    }


    //-------------- Get Single Data ---------------\\    

    public function show()
    {
        
    }  
    

    //-------------- Create New Data ---------------\\

    public function create()
    {
        
    }


    //-------------- Store New Data ---------------\\

    public function store(Request $request)
    {

        $workAddress =  WorkAddress::create([
            'name' => $request->address_name,
            'street' => $request->street,
            'street2' => $request->street2,
            'city' => $request->city,
            'state' => $request->state,
            'zip' => $request->zip,
            'country_id' => $request->country_id,
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
    
    public function edit()
    {
        
    }

    
    //-------------- Update Data  ---------------\\

    public function update()
    {
        
    }

    
    //-------------- Get Data  ---------------\\

    public function get(Request $request)
    {
        $countries     = Countries::all();

        $addressForm = view('master.components.address',[
            'countries' => $countries,
        ])->render();

        $rsData = $this->returnData('addressForm', $addressForm);
        return response()->json($rsData, 200);
    }


}
