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
                                <h4 class="mb-sm-0 font-size-18">{{__('master.CREATE-CONTRACT')}}</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">{{__('master.CONTRACTS')}}</a></li>
                                        <li class="breadcrumb-item active">{{__('master.CREATE-CONTRACT')}}</li>
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
                                            <div class="col-sm-8">
                                                <div class="mb-1">
                                                    <input id="contract_reference" name="contract_reference" type="text" placeholder="Contract Reference" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label for="employee_id" class="col-md-2 col-form-label pb-2 pt-1">Employee</label>
                                            <div class="col-md-4">
                                                <select class="form-control form-control-sm select2" name="employee_id" id="employee_id">
                                                    <option>Select</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                </select>
                                            </div>
                                            <label for="department_id" class="col-md-2 col-form-label pb-2 pt-1">Department</label>
                                            <div class="col-md-4">
                                                <select class="form-control form-control-sm select2" name="department_id" id="department_id">
                                                    <option>Select</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label for="contract_start_date" class="col-md-2 col-form-label pb-2 pt-1">Contract Start Date</label>
                                            <div class="col-md-4">
                                                <input class="form-control form-control-sm" type="date" name="contract_start_date" id="contract_start_date">
                                            </div>
                                            <label for="job_position_id" class="col-md-2 col-form-label pb-2 pt-1">Job Position</label>
                                            <div class="col-md-4">
                                                <select class="form-control form-control-sm select2" name="job_position_id" id="job_position_id">
                                                    <option>Select</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label for="contract_end_date" class="col-md-2 col-form-label pb-2 pt-1">Contract End Date</label>
                                            <div class="col-md-4">
                                                <input class="form-control form-control-sm" type="date" name="contract_end_date" id="contract_end_date">
                                            </div>
                                            <label for="contract_type_id" class="col-md-2 col-form-label pb-2 pt-1">Contract Type</label>
                                            <div class="col-md-4">
                                                <select class="form-control form-control-sm select2" name="contract_type_id" id="contract_type_id">
                                                    <option>Select</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label for="salary_structure_type_id" class="col-md-2 col-form-label pb-2 pt-1">Salary Structure Type</label>
                                            <div class="col-md-4">
                                                <select class="form-control form-control-sm select2" name="salary_structure_type_id" id="salary_structure_type_id">
                                                    <option>Select</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                </select>
                                            </div>
                                            <label for="hr_responsible_id" class="col-md-2 col-form-label pb-2 pt-1">HR Responsible</label>
                                            <div class="col-md-4">
                                                <select class="form-control form-control-sm select2" name="hr_responsible_id" id="hr_responsible_id">
                                                    <option>Select</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label for="working_schedule_id" class="col-md-2 col-form-label pb-2 pt-1">Working Schedule</label>
                                            <div class="col-md-4">
                                                <select class="form-control form-control-sm select2" name="working_schedule_id" id="working_schedule_id">
                                                    <option>Select</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                </select>
                                            </div>
                                        </div>
        
                                    </div>
                                </div>
                                
                                <div class="card card-shadow">
                                    <div class="card-body">

                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Contract Details</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Salary Information</a>
                                            </li>
                                        </ul>

                                        <div class="tab-content" id="myTabContent">

                                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                                                <p class="card-title-desc horizontal_separator mt-4 text-sm">Notes</p>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-8">
                                                                <textarea class="form-control" name="notes" id="" cols="30" rows="10"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

                                                <p class="card-title-desc horizontal_separator mt-4 text-sm">Planning</p>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p class="card-title-desc horizontal_separator mt-4 text-sm">Status</p>
                                                        <div class="row">
                                                            <label for="type_id" class="col-md-4 col-form-label pb-2 pt-1">Employee Type</label>
                                                            <div class="col-md-8">
                                                                <select class="form-control form-control-sm select2" name="type_id" id="type_id">
                                                                    <option>Select</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label for="related_user" class="col-md-4 col-form-label pb-2 pt-1">Related User</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control form-control-sm" type="text" name="related_user" id="related_user">
                                                            </div>
                                                        </div>
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

<script>
    $('#myTab a').on('click', function (event) 
    {
        event.preventDefault()
        $(this).tab('show')
    })
</script>

@endsection
