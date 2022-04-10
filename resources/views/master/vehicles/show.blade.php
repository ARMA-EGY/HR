@extends('layouts.master')

@section('sidebar')
    @include('layouts.sidebar.master')
@endsection

@section('style')

@endsection


@section('content')

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row mt-5">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">{{__('master.CREATE-VEHICLE')}}</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">{{__('master.VEHICLES')}}</a></li>
                                        <li class="breadcrumb-item active">{{__('master.CREATE-VEHICLE')}}</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">


                                <div class="card card-shadow mb-2">
                                    <div class="card-body">
                                            
                                        <div class="row">
                                            <label for="model" class="col-md-2 col-form-label pb-2 pt-1">Model</label>
                                            <div class="col-md-6">
                                                <div class="mb-1">
                                                    <input id="model" name="model" type="text" class="form-control" value="{{ isset($item) ? $item->model : old('model') }}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label for="license_plate" class="col-md-2 col-form-label pb-2 pt-1">License Plate</label>
                                            <div class="col-md-6">
                                                <div class="mb-1">
                                                    <input id="license_plate" name="license_plate" type="text" class="form-control" value="{{ isset($item) ? $item->license_plate : old('license_plate') }}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label for="tags" class="col-md-2 col-form-label pb-2 pt-1">Tags</label>
                                            <div class="col-md-6">
                                                <select class="select2 form-control select2-multiple" name="tags[]" multiple="multiple" data-placeholder="Choose ..." disabled>
                                                @foreach($tags as $tag)
                                                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">

                                            <div class="col-md-6">

                                                <p class="card-title-desc horizontal_separator mt-4 text-sm">Driver</p>
                                                <div class="row">
                                                    <label for="driver_id" class="col-md-4 col-form-label pb-2 pt-1">Driver</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control form-control-sm select2" name="driver_id" id="driver_id" disabled>
                                                            @foreach($employees as $employee)
                                                                <option value="{{$employee->id}}" @if (isset($item)) @if($item->driver_id == $employee->id) selected @endif @endif>{{$employee->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label for="future_driver_id" class="col-md-4 col-form-label pb-2 pt-1">Future Driver</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control form-control-sm select2" name="future_driver_id" id="future_driver_id" disabled>
                                                            @foreach($employees as $employee)
                                                                <option value="{{$employee->id}}" @if (isset($item)) @if($item->future_driver_id == $employee->id) selected @endif @endif>{{$employee->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label for="assignment_date" class="col-md-4 col-form-label pb-2 pt-1">Assignment Date</label>
                                                    <div class="col-md-8">
                                                        <input class="form-control form-control-sm" type="date" name="assignment_date" id="assignment_date" value="{{ isset($item) ? $item->assignment_date : old('assignment_date') }}" disabled>
                                                    </div>
                                                </div>
                                                
                                            </div>

                                            <div class="col-md-6">

                                                <p class="card-title-desc horizontal_separator mt-4 text-sm">Vehicle</p>
                                                <div class="row">
                                                    <label for="chassis_number" class="col-md-4 col-form-label pb-2 pt-1">Chassis Number</label>
                                                    <div class="col-md-8">
                                                        <input class="form-control form-control-sm" type="text" name="chassis_number" id="chassis_number" value="{{ isset($item) ? $item->chassis_number : old('chassis_number') }}" disabled>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label for="fleet_manager_id" class="col-md-4 col-form-label pb-2 pt-1">Fleet Manager</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control form-control-sm select2" name="fleet_manager_id" id="fleet_manager_id" disabled>
                                                            @foreach($employees as $employee)
                                                                <option value="{{$employee->id}}" @if (isset($item)) @if($item->fleet_manager_id == $employee->id) selected @endif @endif>{{$employee->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label for="location" class="col-md-4 col-form-label pb-2 pt-1">Location</label>
                                                    <div class="col-md-8">
                                                        <input class="form-control form-control-sm" type="text" name="location" id="location" value="{{ isset($item) ? $item->location : old('location') }}" disabled>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
        
                                    </div>
                                </div>
                                
                                <div class="card card-shadow">
                                    <div class="card-body">

                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link active" id="tax_information-tab" data-toggle="tab" href="#tax_information" role="tab" aria-controls="tax_information" aria-selected="false">Tax Information</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" id="model2-tab" data-toggle="tab" href="#model2" role="tab" aria-controls="model2" aria-selected="false">Model</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" id="note-tab" data-toggle="tab" href="#note" role="tab" aria-controls="note" aria-selected="true">Note</a>
                                            </li>
                                        </ul>

                                        <div class="tab-content" id="myTabContent">

                                            <div class="tab-pane fade show active" id="tax_information" role="tabpanel" aria-labelledby="tax_information-tab">
                                                
                                                <div class="row">

                                                    <div class="col-md-6 mt-4">

                                                        <p class="card-title-desc horizontal_separator mt-4 text-sm">Fiscality</p>
                                                        <div class="row">
                                                            <label for="horsepower_taxation" class="col-md-4 col-form-label pb-2 pt-1">Horsepower Taxation</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control form-control-sm" type="number" step="0.01" placeholder="0.00" name="horsepower_taxation" id="horsepower_taxation" value="{{ isset($item) ? $item->horsepower_taxation : old('horsepower_taxation') }}" disabled>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>

                                                    <div class="col-md-6 mt-4">

                                                        <p class="card-title-desc horizontal_separator mt-4 text-sm">Contract</p>
                                                        <div class="row">
                                                            <label for="first_contract_date" class="col-md-4 col-form-label pb-2 pt-1">First Contract Date</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control form-control-sm" type="date" name="first_contract_date" id="first_contract_date" value="{{ isset($item) ? $item->first_contract_date : old('first_contract_date') }}" disabled>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <label for="catalog_value" class="col-md-4 col-form-label pb-2 pt-1">Catalog Value (VAT Incl.)</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control form-control-sm" type="number" step="0.01" placeholder="0.00" name="catalog_value" id="catalog_value" value="{{ isset($item) ? $item->catalog_value : old('catalog_value') }}" disabled>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <label for="purchase_value" class="col-md-4 col-form-label pb-2 pt-1">Purchase Value</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control form-control-sm" type="number" step="0.01" placeholder="0.00" name="purchase_value" id="purchase_value" value="{{ isset($item) ? $item->purchase_value : old('purchase_value') }}" disabled>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <label for="residual_value" class="col-md-4 col-form-label pb-2 pt-1">Residual Value</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control form-control-sm" type="number" step="0.01" placeholder="0.00" name="residual_value" id="residual_value" value="{{ isset($item) ? $item->residual_value : old('residual_value') }}" disabled>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                        
                                                </div>

                                            </div>

                                            <div class="tab-pane fade" id="model2" role="tabpanel" aria-labelledby="model2-tab">
                                                
                                                <div class="row">

                                                    <div class="col-md-6 mt-4">

                                                        <p class="card-title-desc horizontal_separator mt-4 text-sm">Model</p>
                                                        <div class="row">
                                                            <label for="model_year" class="col-md-4 col-form-label pb-2 pt-1">Model Year</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control form-control-sm" type="text" name="model_year" id="model_year" value="{{ isset($item) ? $item->model_year : old('model_year') }}" disabled>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <label for="color" class="col-md-4 col-form-label pb-2 pt-1">Color</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control form-control-sm" type="text" name="color" id="color" value="{{ isset($item) ? $item->color : old('color') }}" disabled>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <label for="transmission" class="col-md-4 col-form-label pb-2 pt-1">Transmission</label>
                                                            <div class="col-md-8">
                                                                <select class="select2 form-control form-control-sm" name="transmission" disabled>
                                                                    <option value="Automatic" @if (isset($item)) @if($item->employee_id == 'Automatic') selected @endif @endif>Automatic</option>
                                                                    <option value="Manual" @if (isset($item)) @if($item->employee_id == 'Manual') selected @endif @endif>Manual</option>
                                                                    <option value=""></option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>

                                                    <div class="col-md-6 mt-4">

                                                        <p class="card-title-desc horizontal_separator mt-4 text-sm">Engine</p>
                                                        <div class="row">
                                                            <label for="horsepower" class="col-md-4 col-form-label pb-2 pt-1">Horsepower</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control form-control-sm" type="number" step="0.01" placeholder="0.00" name="horsepower" id="horsepower" value="{{ isset($item) ? $item->horsepower : old('horsepower') }}" disabled>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <label for="power" class="col-md-4 col-form-label pb-2 pt-1">Power</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control form-control-sm" type="number" step="0.01" placeholder="0.00" name="power" id="power" value="{{ isset($item) ? $item->power : old('power') }}" disabled>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <label for="fuel_type" class="col-md-4 col-form-label pb-2 pt-1">Fuel Type</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control form-control-sm" type="text" name="fuel_type" id="fuel_type" value="{{ isset($item) ? $item->fuel_type : old('fuel_type') }}" disabled>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <label for="co2_emissions" class="col-md-4 col-form-label pb-2 pt-1">CO2 Emissions</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control form-control-sm" type="number" step="0.01" placeholder="0.00" name="co2_emissions" id="co2_emissions" value="{{ isset($item) ? $item->co2_emissions : old('co2_emissions') }}" disabled>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <label for="co2_standard" class="col-md-4 col-form-label pb-2 pt-1">Co2 Standard</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control form-control-sm" type="text" name="co2_standard" id="co2_standard" value="{{ isset($item) ? $item->co2_standard : old('co2_standard') }}" disabled>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                        
                                                </div>

                                            </div>

                                            <div class="tab-pane fade" id="note" role="tabpanel" aria-labelledby="note-tab">

                                                <div class="row mt-4">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <textarea class="form-control" name="note" rows="5" disabled>{{ isset($item) ? $item->note : old('note') }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <!-- end row -->

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            
        </div>
        <!-- end main content-->

@endsection

@section('script')

<script>
    $('#myTab a').on('click', function (event) 
    {
        event.preventDefault()
        $(this).tab('show')
    })

    if ($("#used_by").val() == 'department')
    {
        $('.department').slideDown();
        $('.employee').slideUp();
    }
    else if ($("#used_by").val() == 'employee')
    {
        $('.department').slideDown();
        $('.employee').slideUp();
    }
    else
    {
        $('.department').slideUp();
        $('.employee').slideUp();
    }

    $(document).on("change","#used_by", function()
    {
        var value = $(this).val();
        var classname = '.' + value;
        $('.other').slideUp();
        $(classname).slideDown();
    });
</script>

@endsection
