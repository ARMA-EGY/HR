<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Models\Employee;
use App\Models\Department;

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

        return view('master.assets.index', [
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
        $employees       = Employee::orderBy('id','desc')->get();
        $departments       = Department::orderBy('id','desc')->get();
        $countries       = Countries::all();

        return view('master.assets.create',[
        ]);
    }


    //-------------- Store New Data ---------------\\

    public function store(Request $request)
    {
        
        return redirect(route('master.assets.index'));
    }


    //-------------- Edit Data Page ---------------\\
    
    public function edit()
    {

		return view('master.assets.create', [
            ]);
    }

    
    //-------------- Update Data  ---------------\\

    public function update(Request $request)
    {

		return redirect(route('master.assets.index'));
    }


}
