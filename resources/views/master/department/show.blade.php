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
                                <h4 class="mb-sm-0 font-size-18">{{__('master.DEPARTMENT-DETAILS')}}</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">{{__('master.DEPARTMENTS')}}</a></li>
                                        <li class="breadcrumb-item active">{{__('master.DEPARTMENT-DETAILS')}}</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">

                            <div class="card card-shadow">
                                <div class="card-body">

                                    <div class="row">
                                        <label for="department_name" class="col-md-2 col-form-label pb-2 pt-1">Department Name</label>
                                        <div class="col-md-4">
                                            <input class="form-control form-control-sm" type="text" name="department_name" id="department_name" value="{{ isset($item) ? $item->name : old('name') }}" disabled>
                                        </div>
                                        <label for="manager_id" class="col-md-2 col-form-label pb-2 pt-1">Manager</label>
                                        <div class="col-md-4">
                                            <select class="form-control form-control-sm select2" name="manager_id" id="manager_id" disabled>
                                                <option value="">{{__('master.NOTHING')}}</option>
                                            @foreach($managers as $manager)
                                                <option value="{{$manager->id}}" @if (isset($item)) @if($item->manager_id == $manager->id) selected @endif @endif>{{$manager->name}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label for="parent_department_id" class="col-md-2 col-form-label pb-2 pt-1">Parent Department</label>
                                        <div class="col-md-4">
                                            <select class="form-control form-control-sm select2" name="parent_department_id" id="parent_department_id" disabled>
                                                <option value="">{{__('master.NOTHING')}}</option>
                                            @foreach($departments as $department)
                                                <option value="{{$department->id}}" @if (isset($item)) @if($item->parent_department_id == $department->id) selected @endif @endif>{{$department->name}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                        <label for="custom_appraisal" class="col-md-2 col-form-label pb-2 pt-1">Custom Appraisal</label>
                                        <div class="col-md-4">
                                            <select class="form-control form-control-sm custom_appraisal" name="custom_appraisal" id="custom_appraisal" disabled>
                                                <option value="0" @if (isset($item)) @if($item->custom_appraisal == 0) selected @endif @endif>No</option>
                                                <option value="1" @if (isset($item)) @if($item->custom_appraisal == 1) selected @endif @endif>Yes</option>
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
                                                    <textarea class="form-control" cols="30" rows="10" disabled>{{ isset($item) ? $item->employee_appraisal_template : old('employee_appraisal_template') }}</textarea>
                                                </div>
                                                <div class="col-md-6">
                                                    <h4 class="card-title">Manager</h4>
                                                    <textarea class="form-control" cols="30" rows="10" disabled>{{ isset($item) ? $item->manager_appraisal_template : old('manager_appraisal_template') }}</textarea>
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

<script src="{{asset('assets/js/trix.min.js')}}"></script>

<script>

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
