@extends('layouts.master')

@section('sidebar')
    @include('layouts.sidebar.master')
@endsection

@section('style')
    <link href="{{asset('assets/css/trix.min.css')}}" rel="stylesheet" type="text/css" />
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
                                <h4 class="mb-sm-0 font-size-18">{{__('master.CREATE-DEPARTMENT')}}</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">{{__('master.DEPARTMENTS')}}</a></li>
                                        <li class="breadcrumb-item active">{{__('master.CREATE-DEPARTMENT')}}</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">

                            <form action="#">

                                <div class="card card-shadow">
                                    <div class="card-body">

                                        <div class="row">
                                            <label for="department_name" class="col-md-2 col-form-label pb-2 pt-1">Department Name</label>
                                            <div class="col-md-4">
                                                <input class="form-control form-control-sm" type="text" name="department_name" id="department_name">
                                            </div>
                                            <label for="manager_id" class="col-md-2 col-form-label pb-2 pt-1">Manager</label>
                                            <div class="col-md-4">
                                                <select class="form-control form-control-sm select2" name="manager_id" id="manager_id">
                                                    <option>Select</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label for="parent_department_id" class="col-md-2 col-form-label pb-2 pt-1">Parent Department</label>
                                            <div class="col-md-4">
                                                <select class="form-control form-control-sm select2" name="parent_department_id" id="parent_department_id">
                                                    <option>Select</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                </select>
                                            </div>
                                            <label for="custom_appraisal" class="col-md-2 col-form-label pb-2 pt-1">Custom Appraisal</label>
                                            <div class="col-md-4">
                                                <select class="form-control form-control-sm custom_appraisal" name="custom_appraisal" id="custom_appraisal">
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                            </div>
                                        </div>
        
                                    </div>
                                </div>
                                
                                <div class="card card-shadow appraisal_box">
                                    <div class="card-body">
                                        <p class="card-title-desc horizontal_separator text-sm">Appraisal Templates</p>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h4 class="card-title">Employee</h4>
                                                        <input id="e" type="hidden" name="employee_appraisal_template" >
                                                        <trix-editor input="e"></trix-editor>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h4 class="card-title">Manager</h4>
                                                        <input id="m" type="hidden" name="manager_appraisal_template" >
                                                        <trix-editor input="m"></trix-editor>
                                                    </div>
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

<script src="{{asset('assets/js/trix.min.js')}}"></script>

<script>

    $(document).on("change",".custom_appraisal", function()
    {
        if ($(this).val() == 1)
        {
            $('.appraisal_box').slideDown()
        }
        else
        {
            $('.appraisal_box').slideUp()
        }
    });

    if ($('.custom_appraisal').val() == 1)
    {
        $('.appraisal_box').slideDown()
    }
    else
    {
        $('.appraisal_box').slideUp()
    }

</script>

@endsection
