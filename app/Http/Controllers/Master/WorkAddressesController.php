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
use App\Models\Countries;
use App\Models\contractTypes;

class WorkAddressesController extends Controller
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
        $countries     = Countries::all();
        $address_type  = AddressType::orderBy('id','desc')->get();
        $title         = Title::orderBy('id','desc')->get();
        $tags          = Tag::orderBy('id','desc')->get();
        

        $workAddressForm = view('master.workaddress.create',[
            'countries' => $countries,
            'address_type' => $address_type,
            'title' => $title,
            'tags' => $tags,
        ])->render();

        $rsData = $this->returnData('workAddressForm', $workAddressForm);
        return response()->json($rsData, 200);
    }


    //-------------- Store New Data ---------------\\

    public function store(Request $request)
    {
        $individual_company;
        if($request->type == 'individual')
        {
            $individual_company = 1;
        }elseif($request->type == 'company')
        {
            $individual_company = 2;
        }


        $workAddress =  WorkAddress::create([
            'individual_company' => $individual_company,
            'name' => $request->address_name,
            'address_type_id' => $request->Address_id,
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
        $countries     = Countries::all();
        $address_type  = AddressType::orderBy('id','desc')->get();
        $title         = Title::orderBy('id','desc')->get();
        $tags          = Tag::orderBy('id','desc')->get();

		$workAddressForm = view('master.workaddress.create', [
            'workAddress' => $workAddress,
            'countries' => $countries,
            'address_type' => $address_type,
            'title' => $title,
            'tags' => $tags,
        ])->render();

        $rsData = $this->returnData('workAddressForm', $workAddressForm);
        return response()->json($rsData, 200);
    }

    
    //-------------- Update Data  ---------------\\

    public function update(Request $request, WorkAddress $workAddress)
    {
        $individual_company;
        if($request->type == 'individual')
        {
            $individual_company = 1;
        }elseif($request->type == 'company')
        {
            $individual_company = 2;
        }

        $workAddress->update([
            'individual_company' => $individual_company,
            'name' => $request->address_name,
            'address_type_id' => $request->Address_id,
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
        $countries     = Countries::all();
        $address_type  = AddressType::orderBy('id','desc')->get();
        $titles        = Title::orderBy('id','desc')->get();
        $tags          = Tag::orderBy('id','desc')->get();
        $contractTypes = ContractTypes::orderBy('id','desc')->get();
        $item;
        $workAddressForm;

        if(isset($request->id))
        {
            $item =  WorkAddress::find($request->id);

            $workAddressForm = view('master.components.workAddress',[
                'item' => $item,
                'countries' => $countries,
                'address_type' => $address_type,
                'titles' => $titles,
                'tags' => $tags,
                'contractTypes' => $contractTypes,
            ])->render();
        }else{
            $workAddressForm = view('master.components.workAddress',[
                'countries' => $countries,
                'address_type' => $address_type,
                'titles' => $titles,
                'tags' => $tags,
                'contractTypes' => $contractTypes,
            ])->render();      
        }


        $rsData = $this->returnData('workAddressForm', $workAddressForm);
        return response()->json($rsData, 200);
    }
}
