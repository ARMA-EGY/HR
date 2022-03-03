<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

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
        return view('master.vehicles.create',[
        ]);
    }


    //-------------- Store New Data ---------------\\

    public function store(Request $request)
    {
        
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
