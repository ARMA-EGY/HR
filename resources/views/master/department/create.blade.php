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
                                <h4 class="mb-sm-0 font-size-18">{{ isset($item) ? __('master.EDIT-DEPARTMENT') : __('master.ADD-NEW-DEPARTMENT') }}</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">{{__('master.DEPARTMENTS')}}</a></li>
                                        <li class="breadcrumb-item active">{{ isset($item) ? __('master.EDIT-DEPARTMENT') : __('master.ADD-NEW-DEPARTMENT') }}</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">

                        <form action="{{ isset($item) ? route('master.department.update', $item->id) : route('master.department.store')  }}" method="post" enctype="multipart/form-data">
                        @csrf
                        
                        @if (isset($item))
                            @method('PUT')
                        @endif


                                <div class="card card-shadow">
                                    <div class="card-body">

                                        <div class="row">
                                            <label for="department_name" class="col-md-2 col-form-label pb-2 pt-1">{{__('master.DEPARTMENT-NAME')}}</label>
                                            <div class="col-md-4 text-left">
                                                <input class="form-control form-control-sm" type="text" name="department_name" id="department_name" value="{{ isset($item) ? $item->name : old('name') }}">
                                            </div>
                                            <label for="manager_id" class="col-md-2 col-form-label pb-2 pt-1">{{__('master.DEPARTMENT-MANAGER')}}</label>
                                            <div class="col-md-4 text-left">
                                                <select class="form-control form-control-sm select2" name="manager_id" id="manager_id">
                                                @foreach($managers as $manager)
                                                    <option value="{{$manager->id}}" @if (isset($item)) @if($item->manager_id == $manager->id) selected @endif @endif>{{$manager->name}}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label for="parent_department_id" class="col-md-2 col-form-label pb-2 pt-1">{{__('master.PARENT-DEPARTMENT')}}</label>
                                            <div class="col-md-4 text-left">
                                                <select class="form-control form-control-sm select2" name="parent_department_id" id="parent_department_id">
                                                @foreach($departments as $department)
                                                    <option value="{{$department->id}}" @if (isset($item)) @if($item->parent_department_id == $department->id) selected @endif @endif>{{$department->name}}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                            <label for="custom_appraisal" class="col-md-2 col-form-label pb-2 pt-1">{{__('master.CUSTOM-APPRAISAL')}}</label>
                                            <div class="col-md-4 text-left">
                                                <select class="form-control form-control-sm custom_appraisal" name="custom_appraisal" id="custom_appraisal">
                                                    <option value="0" @if (isset($item)) @if($item->custom_appraisal == 0) selected @endif @endif>{{__('master.NO')}}</option>
                                                    <option value="1" @if (isset($item)) @if($item->custom_appraisal == 1) selected @endif @endif>{{__('master.YES')}}</option>
                                                </select>
                                            </div>
                                        </div>
        
                                    </div>
                                </div>
                                
                                <div class="card card-shadow appraisal_box">
                                    <div class="card-body">
                                        <p class="card-title-desc horizontal_separator text-sm">{{__('master.APPRAISAL-TEMPLATES')}}</p>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6 text-left">
                                                        <h4 class="card-title">{{__('master.EMPLOYEE')}}</h4>
                                                        <input id="e" type="hidden" name="employee_appraisal_template" value="{{ isset($item) ? $item->employee_appraisal_template : old('employee_appraisal_template') }}">
                                                        <trix-editor input="e"></trix-editor>
                                                    </div>
                                                    <div class="col-md-6 text-left">
                                                        <h4 class="card-title">{{__('master.MANAGER')}}</h4>
                                                        <input id="m" type="hidden" name="manager_appraisal_template" value="{{ isset($item) ? $item->manager_appraisal_template : old('manager_appraisal_template') }}">
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
                                            <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">{{ isset($item) ?  __('master.SAVE'):__('master.ADD') }}</button>
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
