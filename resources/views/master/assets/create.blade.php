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
                                                    <input id="name" name="name" type="text" placeholder="Name" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">

                                            <div class="col-md-6">

                                                <div class="row">
                                                    <label for="category_id" class="col-md-4 col-form-label pb-2 pt-1">Category</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control form-control-sm select2" name="category_id" id="category_id">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label for="used_by" class="col-md-4 col-form-label pb-2 pt-1">Used By</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control form-control-sm select2" name="used_by" id="used_by">
                                                            <option value="department">Department</option>
                                                            <option value="employee">Employee</option>
                                                            <option value="other">Other</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row employee other">
                                                    <label for="employee_id" class="col-md-4 col-form-label pb-2 pt-1">Employee</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control form-control-sm select2" name="employee_id" id="employee_id">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                        </select>
                                                    </div>
                                                </div>
    
                                                <div class="row department other">
                                                    <label for="department_id" class="col-md-4 col-form-label pb-2 pt-1">Department</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control form-control-sm select2" name="department_id" id="department_id">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                            </div>

                                            <div class="col-md-6">
                                                <div class="row">
                                                    <label for="maintenance_team" class="col-md-4 col-form-label pb-2 pt-1">Maintenance Team</label>
                                                    <div class="col-md-8">
                                                        <input class="form-control form-control-sm" type="text" name="maintenance_team" id="maintenance_team">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label for="technician" class="col-md-4 col-form-label pb-2 pt-1">Technician</label>
                                                    <div class="col-md-8">
                                                        <input class="form-control form-control-sm" type="text" name="technician" id="technician">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label for="used_in_location" class="col-md-4 col-form-label pb-2 pt-1">Used in location</label>
                                                    <div class="col-md-8">
                                                        <input class="form-control form-control-sm" type="text" name="used_in_location" id="used_in_location">
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
                                                                <textarea class="form-control" name="description" rows="5"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="tab-pane fade" id="product_information" role="tabpanel" aria-labelledby="product_information-tab">
                                                <div class="row mt-4">
                                                    <label for="vendor" class="col-md-2 col-3 col-form-label pt-1">Vendor</label>
                                                    <div class="col-md-4 col-6">
                                                        <input class="form-control form-control-sm" type="text" name="vendor" id="vendor">
                                                    </div>

                                                    <label for="vendor_reference" class="col-md-2 col-3 col-form-label pt-1">Vendor Reference</label>
                                                    <div class="col-md-4 col-6">
                                                        <input class="form-control form-control-sm" type="text" name="vendor_reference" id="vendor_reference">
                                                    </div>

                                                    <label for="model" class="col-md-2 col-3 col-form-label pt-1">Model</label>
                                                    <div class="col-md-4 col-6">
                                                        <input class="form-control form-control-sm" type="text" name="model" id="model">
                                                    </div>

                                                    <label for="serial_number" class="col-md-2 col-3 col-form-label pt-1">Serial Number</label>
                                                    <div class="col-md-4 col-6">
                                                        <input class="form-control form-control-sm" type="text" name="serial_number" id="serial_number">
                                                    </div>

                                                    <label for="effective_date" class="col-md-2 col-3 col-form-label pt-1">Effective Date</label>
                                                    <div class="col-md-4 col-6">
                                                        <input class="form-control form-control-sm" type="date" name="effective_date" id="effective_date">
                                                    </div>

                                                    <label for="cost" class="col-md-2 col-3 col-form-label pt-1">Cost</label>
                                                    <div class="col-md-4 col-6">
                                                        <input class="form-control form-control-sm" type="number" step="0.01" placeholder="0.00" name="cost" id="cost">
                                                    </div>

                                                    <label for="warranty_expiration_date" class="col-md-2 col-3 col-form-label pt-1">Warranty Expiration Date</label>
                                                    <div class="col-md-4 col-6">
                                                        <input class="form-control form-control-sm" type="date" name="warranty_expiration_date" id="warranty_expiration_date">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="maintenance" role="tabpanel" aria-labelledby="maintenance-tab">
                                                <div class="row mt-4">
                                                    <label for="preventive_maintenance_frequency" class="col-md-3 col-3 col-form-label pt-1">Preventive Maintenance Frequency</label>
                                                    <div class="col-md-4 col-6">
                                                        <input class="form-control form-control-sm" type="number" placeholder="0" name="preventive_maintenance_frequency" id="preventive_maintenance_frequency">
                                                    </div>
                                                    <label for="preventive_maintenance_frequency" class="col-md-3 col-3 text-sm pt-1">/ days</label>
                                                </div>

                                                <div class="row">
                                                    <label for="maintenance_duration" class="col-md-3 col-3 col-form-label pt-1">Maintenance Duration</label>
                                                    <div class="col-md-4 col-6">
                                                        <input class="form-control form-control-sm" type="number" step="0.01" placeholder="0.00" name="maintenance_duration" id="maintenance_duration">
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
