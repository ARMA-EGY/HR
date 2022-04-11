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
                                <h4 class="mb-sm-0 font-size-18">{{__('master.VEHICLE-DETAILS')}}</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">{{__('master.VEHICLES')}}</a></li>
                                        <li class="breadcrumb-item active">{{__('master.VEHICLE-DETAILS')}}</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">

                            <div class="card card-shadow mb-2">
                                <div class="card-body text-left">
                                        
                                    <div class="row">
                                        <label for="model" class="col-md-2 col-form-label pb-2 pt-1">{{__('master.VEHICLE-MODEL')}}</label>
                                        <div class="col-md-6">
                                            <div class="mb-1">
                                                <input id="model" name="model" type="text" class="form-control" value="{{ isset($item) ? $item->model : old('model') }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label for="license_plate" class="col-md-2 col-form-label pb-2 pt-1">{{__('master.LICENSE-PLATE')}}</label>
                                        <div class="col-md-6">
                                            <div class="mb-1">
                                                <input id="license_plate" name="license_plate" type="text" class="form-control" value="{{ isset($item) ? $item->license_plate : old('license_plate') }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label for="tags" class="col-md-2 col-form-label pb-2 pt-1">{{__('master.TAGS')}}</label>
                                        <div class="col-md-6">
                                            <select class="select2 form-control select2-multiple" name="tags[]" multiple="multiple" data-placeholder="{{__('master.CHOOSE')}}..." disabled>
                                            @foreach($tags as $tag)
                                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-md-6">

                                            <p class="card-title-desc horizontal_separator mt-4 text-sm">{{__('master.DRIVER')}}</p>
                                            <div class="row">
                                                <label for="driver_id" class="col-md-4 col-form-label pb-2 pt-1">{{__('master.DRIVER')}}</label>
                                                <div class="col-md-8">
                                                    <select class="form-control form-control-sm select2" name="driver_id" id="driver_id" disabled>
                                                        @foreach($employees as $employee)
                                                            <option value="{{$employee->id}}" @if (isset($item)) @if($item->driver_id == $employee->id) selected @endif @endif>{{$employee->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <label for="future_driver_id" class="col-md-4 col-form-label pb-2 pt-1">{{__('master.FUTURE-DRIVER')}}</label>
                                                <div class="col-md-8">
                                                    <select class="form-control form-control-sm select2" name="future_driver_id" id="future_driver_id" disabled>
                                                        @foreach($employees as $employee)
                                                            <option value="{{$employee->id}}" @if (isset($item)) @if($item->future_driver_id == $employee->id) selected @endif @endif>{{$employee->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <label for="assignment_date" class="col-md-4 col-form-label pb-2 pt-1">{{__('master.ASSIGNMENT-DATE')}}</label>
                                                <div class="col-md-8">
                                                    <input class="form-control form-control-sm" type="date" name="assignment_date" id="assignment_date" value="{{ isset($item) ? $item->assignment_date : old('assignment_date') }}" disabled>
                                                </div>
                                            </div>
                                            
                                        </div>

                                        <div class="col-md-6">

                                            <p class="card-title-desc horizontal_separator mt-4 text-sm">{{__('master.VEHICLE')}}</p>
                                            <div class="row">
                                                <label for="chassis_number" class="col-md-4 col-form-label pb-2 pt-1">{{__('master.CHASSIS-NUMBER')}}</label>
                                                <div class="col-md-8">
                                                    <input class="form-control form-control-sm" type="text" name="chassis_number" id="chassis_number" value="{{ isset($item) ? $item->chassis_number : old('chassis_number') }}" disabled>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <label for="fleet_manager_id" class="col-md-4 col-form-label pb-2 pt-1">{{__('master.FLEET-MANAGER')}}</label>
                                                <div class="col-md-8">
                                                    <select class="form-control form-control-sm select2" name="fleet_manager_id" id="fleet_manager_id" disabled>
                                                        @foreach($employees as $employee)
                                                            <option value="{{$employee->id}}" @if (isset($item)) @if($item->fleet_manager_id == $employee->id) selected @endif @endif>{{$employee->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <label for="location" class="col-md-4 col-form-label pb-2 pt-1">{{__('master.LOCATION')}}</label>
                                                <div class="col-md-8">
                                                    <input class="form-control form-control-sm" type="text" name="location" id="location" value="{{ isset($item) ? $item->location : old('location') }}" disabled>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
    
                                </div>
                            </div>
                            
                            <div class="card card-shadow">
                                <div class="card-body text-left">

                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="tax_information-tab" data-toggle="tab" href="#tax_information" role="tab" aria-controls="tax_information" aria-selected="false">{{__('master.TAX-INFORMATION')}}</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="model2-tab" data-toggle="tab" href="#model2" role="tab" aria-controls="model2" aria-selected="false">{{__('master.VEHICLE-MODEL')}}</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="note-tab" data-toggle="tab" href="#note" role="tab" aria-controls="note" aria-selected="true">{{__('master.NOTES')}}</a>
                                        </li>
                                    </ul>

                                    <div class="tab-content" id="myTabContent">

                                        <div class="tab-pane fade show active" id="tax_information" role="tabpanel" aria-labelledby="tax_information-tab">
                                            
                                            <div class="row">

                                                <div class="col-md-6 mt-4">

                                                    <p class="card-title-desc horizontal_separator mt-4 text-sm">{{__('master.FISCALITY')}}</p>
                                                    <div class="row">
                                                        <label for="horsepower_taxation" class="col-md-4 col-form-label pb-2 pt-1">{{__('master.HORSEPOWER-TAXATION')}}</label>
                                                        <div class="col-md-8">
                                                            <input class="form-control form-control-sm" type="number" step="0.01" placeholder="0.00" name="horsepower_taxation" id="horsepower_taxation" value="{{ isset($item) ? $item->horsepower_taxation : old('horsepower_taxation') }}" disabled>
                                                        </div>
                                                    </div>
                                                    
                                                </div>

                                                <div class="col-md-6 mt-4">

                                                    <p class="card-title-desc horizontal_separator mt-4 text-sm">{{__('master.CONTRACT')}}</p>
                                                    <div class="row">
                                                        <label for="first_contract_date" class="col-md-4 col-form-label pb-2 pt-1">{{__('master.FIRST-CONTRACT-DATE')}}</label>
                                                        <div class="col-md-8">
                                                            <input class="form-control form-control-sm" type="date" name="first_contract_date" id="first_contract_date" value="{{ isset($item) ? $item->first_contract_date : old('first_contract_date') }}" disabled>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <label for="catalog_value" class="col-md-4 col-form-label pb-2 pt-1">{{__('master.CATALOG-VALUE')}}</label>
                                                        <div class="col-md-8">
                                                            <input class="form-control form-control-sm" type="number" step="0.01" placeholder="0.00" name="catalog_value" id="catalog_value" value="{{ isset($item) ? $item->catalog_value : old('catalog_value') }}" disabled>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <label for="purchase_value" class="col-md-4 col-form-label pb-2 pt-1">{{__('master.PURCHASE-VALUE')}}</label>
                                                        <div class="col-md-8">
                                                            <input class="form-control form-control-sm" type="number" step="0.01" placeholder="0.00" name="purchase_value" id="purchase_value" value="{{ isset($item) ? $item->purchase_value : old('purchase_value') }}" disabled>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <label for="residual_value" class="col-md-4 col-form-label pb-2 pt-1">{{__('master.RESIDUAL-VALUE')}}</label>
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

                                                    <p class="card-title-desc horizontal_separator mt-4 text-sm">{{__('master.VEHICLE-MODEL')}}</p>
                                                    <div class="row">
                                                        <label for="model_year" class="col-md-4 col-form-label pb-2 pt-1">{{__('master.VEHICLE-MODEL-YEAR')}}</label>
                                                        <div class="col-md-8">
                                                            <input class="form-control form-control-sm" type="text" name="model_year" id="model_year" value="{{ isset($item) ? $item->model_year : old('model_year') }}" disabled>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <label for="color" class="col-md-4 col-form-label pb-2 pt-1">{{__('master.COLOR')}}</label>
                                                        <div class="col-md-8">
                                                            <input class="form-control form-control-sm" type="text" name="color" id="color" value="{{ isset($item) ? $item->color : old('color') }}" disabled>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <label for="transmission" class="col-md-4 col-form-label pb-2 pt-1">{{__('master.TRANSMISSION')}}</label>
                                                        <div class="col-md-8">
                                                            <select class="select2 form-control form-control-sm" name="transmission" disabled>
                                                                <option value="Automatic" @if (isset($item)) @if($item->employee_id == 'Automatic') selected @endif @endif>{{__('master.AUTOMATIC')}}</option>
                                                                <option value="Manual" @if (isset($item)) @if($item->employee_id == 'Manual') selected @endif @endif>{{__('master.MANUAL')}}</option>
                                                                <option value=""></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                </div>

                                                <div class="col-md-6 mt-4">

                                                    <p class="card-title-desc horizontal_separator mt-4 text-sm">{{__('master.ENGINE')}}</p>
                                                    <div class="row">
                                                        <label for="horsepower" class="col-md-4 col-form-label pb-2 pt-1">{{__('master.HORSEPOWER')}}</label>
                                                        <div class="col-md-8">
                                                            <input class="form-control form-control-sm" type="number" step="0.01" placeholder="0.00" name="horsepower" id="horsepower" value="{{ isset($item) ? $item->horsepower : old('horsepower') }}" disabled>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <label for="power" class="col-md-4 col-form-label pb-2 pt-1">{{__('master.POWER')}}</label>
                                                        <div class="col-md-8">
                                                            <input class="form-control form-control-sm" type="number" step="0.01" placeholder="0.00" name="power" id="power" value="{{ isset($item) ? $item->power : old('power') }}" disabled>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <label for="fuel_type" class="col-md-4 col-form-label pb-2 pt-1">{{__('master.FUEL-TYPE')}}</label>
                                                        <div class="col-md-8">
                                                            <input class="form-control form-control-sm" type="text" name="fuel_type" id="fuel_type" value="{{ isset($item) ? $item->fuel_type : old('fuel_type') }}" disabled>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <label for="co2_emissions" class="col-md-4 col-form-label pb-2 pt-1">{{__('master.CO2-EMISSIONS')}}</label>
                                                        <div class="col-md-8">
                                                            <input class="form-control form-control-sm" type="number" step="0.01" placeholder="0.00" name="co2_emissions" id="co2_emissions" value="{{ isset($item) ? $item->co2_emissions : old('co2_emissions') }}" disabled>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <label for="co2_standard" class="col-md-4 col-form-label pb-2 pt-1">{{__('master.CO2-STANDARD')}}</label>
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
</script>

@endsection
