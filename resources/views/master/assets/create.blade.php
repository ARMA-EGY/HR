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
                                <h4 class="mb-sm-0 font-size-18">{{__('master.CREATE-ASSETS')}}</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">{{__('master.ASSETS')}}</a></li>
                                        <li class="breadcrumb-item active">{{__('master.CREATE-ASSETS')}}</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">

                            <form action="{{ isset($item) ? route('master.assets.update', $item->id) : route('master.assets.store')  }}" method="post" enctype="multipart/form-data">
                                @csrf
                                
                                @if (isset($item))
                                    @method('PUT')
                                @endif

                                <div class="card card-shadow mb-2">
                                    <div class="card-body">
                                            
                                        <div class="row">
                                            <div class="col-sm-8 col-10">
                                                <div class="mb-4">
                                                    <input id="name" name="name" type="text" placeholder="Name" class="form-control" value="{{ isset($item) ? $item->name : old('name') }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">

                                            <div class="col-md-6">

                                                <div class="row">
                                                    <label for="category_id" class="col-md-4 col-form-label pb-2 pt-1">Category</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control form-control-sm select2" name="category_id" id="category_id">
                                                        @foreach($assetsCategories as $assetsCategory)
                                                            <option value="{{$assetsCategory->id}}" @if (isset($item)) @if($item->category_id == $assetsCategory->id) selected @endif @endif>{{$assetsCategory->name}}</option>
                                                        @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label for="used_by" class="col-md-4 col-form-label pb-2 pt-1">Used By</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control form-control-sm select2" name="used_by" id="used_by">
                                                            <option value="department" @if (isset($item)) @if($item->used_by == 'department') selected @endif @endif>Department</option>
                                                            <option value="employee" @if (isset($item)) @if($item->used_by == 'employee') selected @endif @endif>Employee</option>
                                                            <option value="other" @if (isset($item)) @if($item->category_id == 'other') selected @endif @endif>Other</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row employee other">
                                                    <label for="employee_id" class="col-md-4 col-form-label pb-2 pt-1">Employee</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control form-control-sm select2" name="employee_id" id="employee_id">
                                                        @foreach($employees as $employee)
                                                            <option value="{{$employee->id}}" @if (isset($item)) @if($item->employee_id == $employee->id) selected @endif @endif>{{$employee->name}}</option>
                                                        @endforeach
                                                        </select>
                                                    </div>
                                                </div>
    

                                                
                                            </div>

                                            <div class="col-md-6">
                                                <div class="row">
                                                    <label for="maintenance_team_id" class="col-md-4 col-form-label pb-2 pt-1">Maintenance Team</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control form-control-sm select2" name="maintenance_team_id" id="maintenance_team_id">
                                                        @foreach($maintenanceTeams as $maintenanceTeam)
                                                            <option value="{{$maintenanceTeam->id}}" @if (isset($item)) @if($item->maintenance_team_id == $maintenanceTeam->id) selected @endif @endif>{{$maintenanceTeam->name}}</option>
                                                        @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label for="technician_id" class="col-md-4 col-form-label pb-2 pt-1">Technician</label>
                                                    <div class="col-md-8">
                                                    <select class="form-control form-control-sm select2" name="technician_id" id="technician_id">
                                                        @foreach($employees as $employee)
                                                            <option value="{{$employee->id}}" @if (isset($item)) @if($item->technician_id == $employee->id) selected @endif @endif>{{$employee->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label for="used_in_location" class="col-md-4 col-form-label pb-2 pt-1">Used in location</label>
                                                    <div class="col-md-8">
                                                        <input class="form-control form-control-sm" type="text" name="used_in_location" id="used_in_location" value="{{ isset($item) ? $item->used_in_location : old('used_in_location') }}">
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
                                                <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" id="product_information-tab" data-toggle="tab" href="#product_information" role="tab" aria-controls="product_information" aria-selected="false">Product Information</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" id="maintenance-tab" data-toggle="tab" href="#maintenance" role="tab" aria-controls="maintenance" aria-selected="false">Maintenance</a>
                                            </li>
                                        </ul>

                                        <div class="tab-content" id="myTabContent">

                                            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">

                                                <div class="row mt-4">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <textarea class="form-control" name="description" rows="5">{{ isset($item) ? $item->description : old('description') }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="tab-pane fade" id="product_information" role="tabpanel" aria-labelledby="product_information-tab">
                                                <div class="row mt-4">
                                                    <label for="vendor_id" class="col-md-2 col-3 col-form-label pt-1">Vendor</label>
                                                    <div class="col-md-4 col-6">
                                                        <select class="form-control form-control-sm select2" name="vendor_id" id="vendor_id">
                                                        @foreach($employees as $employee)
                                                            <option value="{{$employee->id}}" @if (isset($item)) @if($item->vendor_id == $employee->id) selected @endif @endif>{{$employee->name}}</option>
                                                        @endforeach
                                                        </select>
                                                    </div>

                                                    <label for="vendor_reference" class="col-md-2 col-3 col-form-label pt-1">Vendor Reference</label>
                                                    <div class="col-md-4 col-6">
                                                        <input class="form-control form-control-sm" type="text" name="vendor_reference" id="vendor_reference" value="{{ isset($item) ? $item->vendor_reference : old('vendor_reference') }}">
                                                    </div>

                                                    <label for="model" class="col-md-2 col-3 col-form-label pt-1">Model</label>
                                                    <div class="col-md-4 col-6">
                                                        <input class="form-control form-control-sm" type="text" name="model" id="model" value="{{ isset($item) ? $item->model : old('model') }}">
                                                    </div>

                                                    <label for="serial_number" class="col-md-2 col-3 col-form-label pt-1">Serial Number</label>
                                                    <div class="col-md-4 col-6">
                                                        <input class="form-control form-control-sm" type="text" name="serial_number" id="serial_number" value="{{ isset($item) ? $item->serial_number : old('serial_number') }}">
                                                    </div>

                                                    <label for="effective_date" class="col-md-2 col-3 col-form-label pt-1">Effective Date</label>
                                                    <div class="col-md-4 col-6">
                                                        <input class="form-control form-control-sm" type="date" name="effective_date" id="effective_date" value="{{ isset($item) ? $item->effective_date : old('effective_date') }}">
                                                    </div>

                                                    <label for="cost" class="col-md-2 col-3 col-form-label pt-1">Cost</label>
                                                    <div class="col-md-4 col-6">
                                                        <input class="form-control form-control-sm" type="number" step="0.01" placeholder="0.00" name="cost" id="cost" value="{{ isset($item) ? $item->cost : old('cost') }}">
                                                    </div>

                                                    <label for="warranty_expiration_date" class="col-md-2 col-3 col-form-label pt-1">Warranty Expiration Date</label>
                                                    <div class="col-md-4 col-6">
                                                        <input class="form-control form-control-sm" type="date" name="warranty_expiration_date" id="warranty_expiration_date" value="{{ isset($item) ? $item->warranty_expiration_date : old('warranty_expiration_date') }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="maintenance" role="tabpanel" aria-labelledby="maintenance-tab">
                                                <div class="row mt-4">
                                                    <label for="preventive_maintenance_frequency" class="col-md-3 col-3 col-form-label pt-1">Preventive Maintenance Frequency</label>
                                                    <div class="col-md-4 col-6">
                                                        <input class="form-control form-control-sm" type="number" placeholder="0" name="preventive_maintenance_frequency" id="preventive_maintenance_frequency" value="{{ isset($item) ? $item->preventive_maintenance_frequency : old('preventive_maintenance_frequency') }}">
                                                    </div>
                                                    <label for="preventive_maintenance_frequency" class="col-md-3 col-3 text-sm pt-1">/ days</label>
                                                </div>

                                                <div class="row">
                                                    <label for="maintenance_duration" class="col-md-3 col-3 col-form-label pt-1">Maintenance Duration</label>
                                                    <div class="col-md-4 col-6">
                                                        <input class="form-control form-control-sm" type="number" step="0.01" placeholder="0.00" name="maintenance_duration" id="maintenance_duration" value="{{ isset($item) ? $item->maintenance_duration : old('maintenance_duration') }}">
                                                    </div>
                                                    <label for="maintenance_duration" class="col-md-3 col-3 text-sm pt-1">/ hours</label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
        
                                <div class="card">
                                    <div class="card-body">
        
                                        <div class="d-flex flex-wrap gap-2">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                                            <button type="submit" class="btn btn-secondary waves-effect waves-light">Cancel</button>
                                        </div>
        
                                    </div>
                                </div>
                                
                            </form>
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
