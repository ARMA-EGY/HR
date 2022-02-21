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
        
                                        <h4 class="card-title">Basic Information</h4>
                                        <p class="card-title-desc">Fill all information below</p>

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
</script>

@endsection
