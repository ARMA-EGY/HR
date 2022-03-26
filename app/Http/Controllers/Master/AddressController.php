<?php

namespace App\Http\Controllers\Master;
use App\Traits\GeneralTrait;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Models\Countries;
use App\Models\WorkAddress;
use App\Models\workLocation;

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

        $address =  WorkAddress::create([
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
        
		$items     = WorkAddress::orderBy('id','desc')->get();

        $data = view('master.components.dropDown',[
            'items'         => $items,
            'id'            => $address->id,
            'data_link'     => $request->data_link,
            'input_name'    => $request->input_name,
            'id_response'   => $request->id_response,
        ])->render();
        

        $rsData = $this->returnData('data', $data,'Address created successfully');

        return response()->json($rsData, 200);
    }


    //-------------- Edit Data Page ---------------\\
    
    public function edit()
    {
        
    }

    
    //-------------- Update Data  ---------------\\

    public function update(Request $request, WorkAddress $address)
    {
        $address->update([
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
        
		$items     = WorkAddress::orderBy('id','desc')->get();

        $data = view('master.components.dropDown',[
            'items'         => $items,
            'id'            => $address->id,
            'data_link'     => $request->data_link,
            'input_name'    => $request->input_name,
            'id_response'   => $request->id_response,
        ])->render();
        
        $rsData = $this->returnData('data', $data,'Address updated successfully');

        return response()->json($rsData, 200);
    }

    
    //-------------- Get Data  ---------------\\

    public function get(Request $request)
    {
        $countries     = Countries::all();
        $item;
        $addressForm;
        
        if(isset($request->id))
        {
            $item =  WorkAddress::find($request->id);
            $addressForm = view('master.components.address',[
                'item' => $item,
                'countries' => $countries,
            ])->render();

        }else{
            $addressForm = view('master.components.address',[
                'countries' => $countries,
            ])->render();
        }


        $rsData = $this->returnData('addressForm', $addressForm);
        return response()->json($rsData, 200);
    }


}
