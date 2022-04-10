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
                                <h4 class="mb-sm-0 font-size-18">{{__('master.SHOW-CONTRACT')}}</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">{{__('master.CONTRACTS')}}</a></li>
                                        <li class="breadcrumb-item active">{{__('master.SHOW-CONTRACT')}}</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">



                                <ul class="nav nav-pills mb-3 mx-auto contract-status" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="pills-new-tab" data-bs-toggle="pill" data-bs-target="#pills-new" type="button" role="tab" aria-controls="pills-new" aria-selected="true">New</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-running-tab" data-bs-toggle="pill" data-bs-target="#pills-running" type="button" role="tab" aria-controls="pills-running" aria-selected="false">Running</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-expired-tab" data-bs-toggle="pill" data-bs-target="#pills-expired" type="button" role="tab" aria-controls="pills-expired" aria-selected="false">Expired</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-cancelled-tab" data-bs-toggle="pill" data-bs-target="#pills-cancelled" type="button" role="tab" aria-controls="pills-cancelled" aria-selected="false">Cancelled</button>
                                    </li>
                                </ul>

                                <div class="card card-shadow mb-2">
                                    <div class="card-body">
                                            
                                        <div class="row">
                                            <div class="col-sm-8 col-10">
                                                <div class="mb-4">
                                                    <input id="contract_reference" name="reference" type="text" placeholder="Contract Reference" class="form-control" value="{{ isset($item) ? $item->reference : old('reference') }}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col-2">
                                                <div class="dropdown d-inline-block">
                                                    <button type="button" class="btn header-item waves-effect h-30" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <div id="status-circle" class="align-middle status-circle bg-success"></div>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <!-- item-->
                                                        <div class="dropdown-item pointer select-status" data-status="bg-danger">
                                                            <div class="align-middle status-circle bg-danger"></div>
                                                            <span class="align-middle">Red</span>
                                                        </div>
                                                        <!-- item-->
                                                        <div class="dropdown-item pointer select-status" data-status="bg-success">
                                                            <div class="align-middle status-circle bg-success"></div>
                                                            <span class="align-middle">Green</span>
                                                        </div>
                                                        <!-- item-->
                                                        <div class="dropdown-item pointer select-status" data-status="bg-secondary">
                                                            <div class="align-middle status-circle bg-secondary"></div>
                                                            <span class="align-middle">Grey</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label for="employee_id" class="col-md-2 col-form-label pb-2 pt-1">Employee</label>
                                            <div class="col-md-4">
                                                <select class="form-control form-control-sm select2" name="employee_id" id="employee_id" disabled>
                                                @foreach($employees as $employee)
                                                    <option value="{{$employee->id}}" @if (isset($item)) @if($item->employee_id == $employee->id) selected @endif @endif>{{$employee->name}}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                            <label for="department_id" class="col-md-2 col-form-label pb-2 pt-1">Department</label>
                                            <div class="col-md-4">
                                                <select class="form-control form-control-sm select2" name="department_id" id="department_id" disabled>
                                                @foreach($departments as $department)
                                                    <option value="{{$department->id}}" @if (isset($item)) @if($item->department_id == $department->id) selected @endif @endif>{{$department->name}}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label for="contract_start_date" class="col-md-2 col-form-label pb-2 pt-1">Contract Start Date</label>
                                            <div class="col-md-4">
                                                <input class="form-control form-control-sm" type="date" name="contract_start_date" id="contract_start_date" value="{{ isset($item) ? $item->contract_start_date : old('contract_start_date') }}" disabled>
                                            </div>
                                            <label for="job_position_id" class="col-md-2 col-form-label pb-2 pt-1">Job Position</label>
                                            <div class="col-md-4">
                                                <select class="form-control form-control-sm select2" name="job_position_id" id="job_position_id" disabled>
                                                @foreach($jobPositions as $jobPosition)
                                                    <option value="{{$jobPosition->id}}" @if (isset($item)) @if($item->job_position_id == $jobPosition->id) selected @endif @endif>{{$jobPosition->name}}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label for="contract_end_date" class="col-md-2 col-form-label pb-2 pt-1">Contract End Date</label>
                                            <div class="col-md-4">
                                                <input class="form-control form-control-sm" type="date" name="contract_end_date" id="contract_end_date" value="{{ isset($item) ? $item->contract_end_date : old('contract_end_date') }}" disabled>
                                            </div>
                                            <label for="contract_type_id" class="col-md-2 col-form-label pb-2 pt-1">Contract Type</label>
                                            <div class="col-md-4">
                                                <select class="form-control form-control-sm select2" name="contract_type_id" id="contract_type_id" disabled>
                                                @foreach($contractTypes as $contractType)
                                                    <option value="{{$contractType->id}}" @if (isset($item)) @if($item->contract_type_id == $contractType->id) selected @endif @endif>{{$contractType->name}}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label for="salary_structure_type_id" class="col-md-2 col-form-label pb-2 pt-1">Salary Structure Type</label>
                                            <div class="col-md-4">
                                                <select class="form-control form-control-sm select2" name="salary_structure_type_id" id="salary_structure_type_id" disabled>
                                                @foreach($salaryStructureTypes as $salaryStructureType)
                                                    <option value="{{$salaryStructureType->id}}" @if (isset($item)) @if($item->salary_structure_type_id == $salaryStructureType->id) selected @endif @endif>{{$salaryStructureType->contract_type}}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                            <label for="hr_responsible_id" class="col-md-2 col-form-label pb-2 pt-1">HR Responsible</label>
                                            <div class="col-md-4">
                                                <select class="form-control form-control-sm select2" name="hr_responsible_id" id="hr_responsible_id" disabled>
                                                @foreach($employees as $employee)
                                                    <option value="{{$employee->id}}" @if (isset($item)) @if($item->hr_responsible_id == $employee->id) selected @endif @endif>{{$employee->name}}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label for="working_schedule_id" class="col-md-2 col-form-label pb-2 pt-1">Working Schedule</label>
                                            <div class="col-md-4">
                                                <select class="form-control form-control-sm select2" name="working_hour_id" id="working_schedule_id" disabled>
                                                @foreach($workingHours as $workingHour)
                                                    <option value="{{$workingHour->id}}" @if (isset($item)) @if($item->working_schedule_id == $workingHour->id) selected @endif @endif>{{$workingHour->name}}</option>
                                                @endforeach
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
                                                            <div class="col-md-12">
                                                                <textarea class="form-control" name="notes" rows="5" disabled>{{ isset($item) ? $item->notes : old('notes') }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                                <div class="row mt-4">
                                                    <label for="wage" class="col-md-2 col-3 col-form-label pt-1">Wage</label>
                                                    <div class="col-md-4 col-6">
                                                        <input class="form-control form-control-sm" type="number" step="0.01" placeholder="0.00" name="wage" id="wage" value="{{ isset($item) ? $item->wage : old('wage') }}" disabled>
                                                    </div>
                                                    <label for="wage" class="col-md-3 col-3 text-sm pt-1">/ Month</label>
                                                </div>
                                            </div>

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

    $('.select-status').on('click', function () 
    {
       var status = $(this).attr('data-status');
       $('#status-circle').removeClass('bg-success bg-danger bg-secondary').addClass(status);
    })
</script>

@endsection
