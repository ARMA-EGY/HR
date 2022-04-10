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
                                <h4 class="mb-sm-0 font-size-18">{{ isset($item) ? __('master.EDIT-EMPLOYEE') : __('master.ADD-NEW-EMPLOYEE') }}</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">{{__('master.EMPLOYEES')}}</a></li>
                                        <li class="breadcrumb-item active">{{ isset($item) ? __('master.EDIT-EMPLOYEE') : __('master.ADD-NEW-EMPLOYEE') }}</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">

                        <form action="{{ isset($item) ? route('master.employee.update', $item->id) : route('master.employee.store')  }}" method="post" enctype="multipart/form-data">
                        @csrf
                        
                        @if (isset($item))
                            @method('PUT')
                        @endif

                                <div class="card card-shadow mb-2">
                                    <div class="card-body text-left">
        
                                        <h4 class="card-title mb-3">{{__('master.BASIC-INFORMATION')}}</h4>
                                            
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <div class="mb-1">
                                                    <input id="name" name="name" type="text" placeholder="{{__('master.NAME')}}" class="form-control" value="{{ isset($item) ? $item->name : old('name') }}">
                                                </div>
                                                <div class="mb-1">
                                                    <input id="job_position" name="job_position" type="text" placeholder="{{__('master.JOB-POSITION')}}" class="form-control" value="{{ isset($item) ? $item->job_position : old('job_position') }}">
                                                </div>
                                                <div class="mb-3">
                                                    <div class="row">
                                                        <label for="tags" class="col-md-2 col-form-label pb-2 pt-1">{{__('master.TAGS')}}</label>
                                                        <div class="col-md-10">
                                                            <select class="select2 form-control select2-multiple" name="tags[]" multiple="multiple" data-placeholder="{{__('master.CHOOSE')}} ...">
                                                                @foreach($tags as $tag)
                                                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                                                                @endforeach
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label for="work_mobile" class="col-md-2 col-form-label pb-2 pt-1">{{__('master.WORK-MOBILE')}}</label>
                                            <div class="col-md-4">
                                                <input class="form-control form-control-sm" type="text" name="work_mobile" id="work_mobile" value="{{ isset($item) ? $item->work_mobile : old('work_mobile') }}">
                                            </div>
                                            <label for="department_id" class="col-md-2 col-form-label pb-2 pt-1">{{__('master.DEPARTMENT')}}</label>
                                            <div class="col-md-4">
                                                <select class="form-control form-control-sm select2" name="department_id" id="department_id">
                                                    @foreach($departments as $department)
                                                        <option value="{{$department->id}}" @if (isset($item)) @if($item->department_id == $department->id) selected @endif @endif>{{$department->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label for="work_phone" class="col-md-2 col-form-label pb-2 pt-1">{{__('master.WORK-PHONE')}}</label>
                                            <div class="col-md-4">
                                                <input class="form-control form-control-sm" type="text" name="work_phone" id="work_phone" value="{{ isset($item) ? $item->work_phone : old('work_phone') }}">
                                            </div>
                                            <label for="manager_id" class="col-md-2 col-form-label pb-2 pt-1">{{__('master.MANAGER')}}</label>
                                            <div class="col-md-4">
                                                <select class="form-control form-control-sm select2" name="manager_id" id="manager_id">
                                                    
                                                    @foreach($managers as $manager)
                                                        <option value="{{$manager->id}}" @if (isset($item)) @if($item->manager_id == $manager->id) selected @endif @endif>{{$manager->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label for="work_email" class="col-md-2 col-form-label pb-2 pt-1">{{__('master.WORK-EMAIL')}}</label>
                                            <div class="col-md-4">
                                                <input class="form-control form-control-sm" type="text" name="work_email" id="work_email" value="{{ isset($item) ? $item->work_email : old('work_email') }}">
                                            </div>
                                            <label for="coach_id" class="col-md-2 col-form-label pb-2 pt-1">{{__('master.COACH')}}</label>
                                            <div class="col-md-4">
                                                <select class="form-control form-control-sm select2" name="coach_id" id="coach_id">
                                                    
                                                    @foreach($managers as $manager)
                                                        <option value="{{$manager->id}}" @if (isset($item)) @if($item->coach_id == $manager->id) selected @endif @endif>{{$manager->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
        
                                    </div>
                                </div>
                                
                                <div class="card card-shadow">
                                    <div class="card-body text-left">

                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">{{__('master.WORK-INFORMATION')}}</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">{{__('master.PRIVATE-INFORMATION')}}</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">{{__('master.HR-SETTINGS')}}</a>
                                            </li>
                                        </ul>

                                        <div class="tab-content" id="myTabContent">

                                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                                                <p class="card-title-desc horizontal_separator mt-4 text-sm">{{__('master.LOCATION')}}</p>
                                                <div class="row">
                                                    <label for="work_address_id" class="col-md-2 col-form-label pb-2 pt-1">{{__('master.WORK-ADDRESS')}}</label>
                                                    <div class="col-md-4" id="work_address_response">
                                                        <i class="bx bx-link-external text-primary pointer external-link" data-link="{{route('master.getWorkAddress')}}" data-select="#work_address_id"></i>
                                                        <select class="form-control form-control-sm select2" name="work_address_id" id="work_address_id">
                                                            <option value="">{{__('master.SELECT')}}</option>
                                                            @foreach($workAddress as $address)
                                                                <option value="{{$address->id}}" @if (isset($item)) @if($item->work_address_id == $address->id) selected @endif @endif>{{$address->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <label for="work_location_id" class="col-md-2 col-form-label pb-2 pt-1">{{__('master.WORK-LOCATION')}}</label>
                                                    <div class="col-md-4" id="work_location_response">
                                                        <i class="bx bx-link-external text-primary pointer external-link" data-link="{{route('master.getWorkLocation')}}" data-select="#work_location_id"></i>
                                                        <select class="form-control form-control-sm select2" name="work_location_id" id="work_location_id">
                                                            <option value="">{{__('master.SELECT')}}</option>
                                                            @foreach($workLocations as $workLocation)
                                                                <option value="{{$workLocation->id}}" @if (isset($item)) @if($item->work_location_id == $workLocation->id) selected @endif @endif>{{$workLocation->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <p class="card-title-desc horizontal_separator mt-4 text-sm">{{__('master.APPROVERS')}}</p>
                                                <div class="row">
                                                    <label for="time_off" class="col-md-2 col-form-label pb-2 pt-1">{{__('master.TIME-OFF')}}</label>
                                                    <div class="col-md-4">
                                                        <input class="form-control form-control-sm" type="text" name="time_off" id="time_off" value="{{ isset($item) ? $item->time_off : old('time_off') }}">
                                                    </div>
                                                    <label for="expense" class="col-md-2 col-form-label pb-2 pt-1">{{__('master.EXPENSE')}}</label>
                                                    <div class="col-md-4">
                                                        <input class="form-control form-control-sm" type="text" name="expense" id="expense" value="{{ isset($item) ? $item->expense : old('expense') }}">
                                                    </div>
                                                </div>

                                                <p class="card-title-desc horizontal_separator mt-4 text-sm">{{__('master.SCHEDULE')}}</p>
                                                <div class="row">
                                                    <label for="working_hour_id" class="col-md-2 col-form-label pb-2 pt-1">{{__('master.WORKING-HOURS')}}</label>
                                                    <div class="col-md-4" id="working_hour_response">
                                                        <i class="bx bx-link-external text-primary pointer external-link" data-link="{{route('master.getWorkingHours')}}" data-select="#working_hour_id"></i>
                                                        <select class="form-control form-control-sm select2" name="working_hour_id" id="working_hour_id">
                                                            <option value="">{{__('master.SELECT')}}</option>
                                                            @foreach($workingHours as $workingHour)
                                                                <option value="{{$workingHour->id}}" @if (isset($item)) @if($item->working_hour_id == $workingHour->id) selected @endif @endif>{{$workingHour->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <p class="card-title-desc horizontal_separator mt-4 text-sm">{{__('master.PLANNING')}}</p>
                                                <div class="row">
                                                    <label for="default_planning_role" class="col-md-2 col-form-label pb-2 pt-1">{{__('master.DEFAULT-PLANNING-ROLE')}}</label>
                                                    <div class="col-md-4">
                                                        <input class="form-control form-control-sm" type="text" name="default_planning_role" id="default_planning_role" value="{{ isset($item) ? $item->default_planning_role : old('default_planning_role') }}">
                                                    </div>
                                                    <label for="planning_roles" class="col-md-2 col-form-label pb-2 pt-1">{{__('master.PLANNING-ROLES')}}</label>
                                                    <div class="col-md-4">
                                                        <input class="form-control form-control-sm" type="text" name="planning_roles" id="planning_roles" value="{{ isset($item) ? $item->planning_roles : old('planning_roles') }}">
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <p class="card-title-desc horizontal_separator mt-4 text-sm">{{__('master.PRIVATE-CONTACT')}}</p>
                                                        <div class="row">
                                                            <label for="address_id" class="col-md-4 col-form-label pb-2 pt-1">{{__('master.ADDRESS')}}</label>
                                                            <div class="col-md-8" id="address_response">
                                                                <i class="bx bx-link-external text-primary pointer external-link" data-link="{{route('master.getAddress')}}" data-select="#address_id"></i>
                                                                <select class="form-control form-control-sm select2" name="address_id" id="address_id">
                                                                    <option value="">{{__('master.SELECT')}}</option>
                                                                    @foreach($workAddress as $address)
                                                                    <option value="{{$address->id}}" @if (isset($item)) @if($item->address_id == $address->id) selected @endif @endif>{{$address->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label for="email" class="col-md-4 col-form-label pb-2 pt-1">{{__('master.EMAIL')}}</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control form-control-sm" type="email" name="email" id="email" value="{{ isset($item) ? $item->email : old('email') }}">
                                                            </div>                                  
                                                        </div>
                                                        <div class="row">
                                                            <label for="phone" class="col-md-4 col-form-label pb-2 pt-1">{{__('master.PHONE')}}</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control form-control-sm" type="number" name="phone" id="phone" value="{{ isset($item) ? $item->phone : old('phone') }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label for="language_id" class="col-md-4 col-form-label pb-2 pt-1">{{__('master.LANGUAGE')}}</label>
                                                            <div class="col-md-8">
                                                                <select class="form-control form-control-sm select2" name="language_id" id="language_id">                                                          
                                                                    @foreach($languages as $language)
                                                                        <option value="{{$language->id}}" @if (isset($item)) @if($item->language_id == $language->id) selected @endif @endif>{{$language->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label for="home_work_distance" class="col-md-4 col-form-label pb-2 pt-1">{{__('master.HOME-WORK-DISTANCE')}}</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control form-control-sm" type="number" name="home_work_distance" id="home_work_distance" value="{{ isset($item) ? $item->home_work_distance : old('home_work_distance') }}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <p class="card-title-desc horizontal_separator mt-4 text-sm">{{__('master.CITIZENSHIP')}}</p>
                                                        <div class="row">
                                                            <label for="nationality_id" class="col-md-4 col-form-label pb-2 pt-1">{{__('master.NATIONALITY')}}</label>
                                                            <div class="col-md-8">
                                                                <select class="form-control form-control-sm select2" name="nationality_id" id="nationality_id">
                                                                    
                                                                    @foreach($countries as $country)
                                                                        <option value="{{$country->id}}" @if (isset($item)) @if($item->nationality_id == $country->id) selected @endif @endif>{{$country->country_Nationality}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label for="identification_no" class="col-md-4 col-form-label pb-2 pt-1">{{__('master.IDENTIFICATION-NUMBER')}}</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control form-control-sm" type="text" name="identification_no" id="identification_no" value="{{ isset($item) ? $item->identification_no : old('identification_no') }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label for="passport" class="col-md-4 col-form-label pb-2 pt-1">{{__('master.PASSPORT-NUMBER')}}</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control form-control-sm" type="text" name="passport" id="passport" value="{{ isset($item) ? $item->passport : old('passport') }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label for="gender" class="col-md-4 col-form-label pb-2 pt-1">{{__('master.GENDER')}}</label>
                                                            <div class="col-md-8">
                                                                <select class="form-control form-control-sm select2" name="gender" id="gender">
                                                                    
                                                                    <option value="male" @if (isset($item)) @if($item->gender == 'male') selected @endif @endif>{{__('master.MALE')}}</option>
                                                                    <option value="female" @if (isset($item)) @if($item->gender == 'female') selected @endif @endif>{{__('master.FEMALE')}}</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label for="dateofbirth" class="col-md-4 col-form-label pb-2 pt-1">{{__('master.DATE-OF-BIRTH')}}</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control form-control-sm" type="date" name="dateofbirth" id="dateofbirth" value="{{ isset($item) ? $item->dateofbirth : old('dateofbirth') }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label for="placeofbirth" class="col-md-4 col-form-label pb-2 pt-1">{{__('master.PLACE-OF-BIRTH')}}</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control form-control-sm" type="text" name="placeofbirth" id="placeofbirth" value="{{ isset($item) ? $item->placeofbirth : old('placeofbirth') }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label for="countryofbirth_id" class="col-md-4 col-form-label pb-2 pt-1">{{__('master.COUNTRY-OF-BIRTH')}}</label>
                                                            <div class="col-md-8">
                                                            <select class="form-control form-control-sm select2" name="countryofbirth_id" id="countryofbirth_id">
                                                                
                                                                @foreach($countries as $country)
                                                                    <option value="{{$country->id}}" @if (isset($item)) @if($item->countryofbirth_id == $country->id) selected @endif @endif>{{$country->country_Name}}</option>
                                                                @endforeach
                                                            </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <p class="card-title-desc horizontal_separator mt-4 text-sm">{{__('master.MARITAL-STATUS')}}</p>
                                                        <div class="row">
                                                            <label for="maritalstatus_id" class="col-md-4 col-form-label pb-2 pt-1">{{__('master.MARITAL-STATUS')}}</label>
                                                            <div class="col-md-8">
                                                                <select class="form-control form-control-sm select2" name="maritalstatus_id" id="maritalstatus_id">
                                                                    
                                                                    @foreach($maritalStatuses as $maritalStatus)
                                                                        <option value="{{$maritalStatus->id}}" @if (isset($item)) @if($item->maritalstatus_id == $maritalStatus->id) selected @endif @endif>{{$maritalStatus->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <p class="card-title-desc horizontal_separator mt-4 text-sm">{{__('master.DEPENDANT')}}</p>
                                                        <div class="row">
                                                            <label for="no_ofchildren" class="col-md-4 col-form-label pb-2 pt-1">{{__('master.NUMBER-OF-CHILDREN')}}</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control form-control-sm" type="number" name="no_ofchildren" id="no_ofchildren" value="{{ isset($item) ? $item->no_ofchildren : old('no_ofchildren') }}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <p class="card-title-desc horizontal_separator mt-4 text-sm">{{__('master.EMERGENCY')}}</p>
                                                        <div class="row">
                                                            <label for="emergency_contact" class="col-md-4 col-form-label pb-2 pt-1">{{__('master.EMERGENCY-CONTACT')}}</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control form-control-sm" type="text" name="emergency_contact" id="emergency_contact" value="{{ isset($item) ? $item->emergency_contact : old('emergency_contact') }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label for="emergency_phone" class="col-md-4 col-form-label pb-2 pt-1">{{__('master.EMERGENCY-PHONE')}}</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control form-control-sm" type="number" name="emergency_phone" id="emergency_phone" value="{{ isset($item) ? $item->emergency_phone : old('emergency_phone') }}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <p class="card-title-desc horizontal_separator mt-4 text-sm">{{__('master.WORK-PERMIT')}}</p>
                                                        <div class="row">
                                                            <label for="visa_no" class="col-md-4 col-form-label pb-2 pt-1">{{__('master.VISA-NUMBER')}}</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control form-control-sm" type="number" name="visa_no" id="visa_no" value="{{ isset($item) ? $item->visa_no : old('visa_no') }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label for="work_permit_no" class="col-md-4 col-form-label pb-2 pt-1">{{__('master.WORK-PERMIT-NUMBER')}}</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control form-control-sm" type="number" name="work_permit_no" id="work_permit_no" value="{{ isset($item) ? $item->work_permit_no : old('work_permit_no') }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label for="visa_expire_date" class="col-md-4 col-form-label pb-2 pt-1">{{__('master.VISA-EXPIRE-DATE')}}</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control form-control-sm" type="date" name="visa_expire_date" id="visa_expire_date" value="{{ isset($item) ? $item->visa_expire_date : old('visa_expire_date') }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label for="work_permit_expire_date" class="col-md-4 col-form-label pb-2 pt-1">{{__('master.WORK-PERMIT-EXPIRATION-DATE')}}</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control form-control-sm" type="date" name="work_permit_expire_date" id="work_permit_expire_date" value="{{ isset($item) ? $item->work_permit_expire_date : old('work_permit_expire_date') }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label for="work_permit" class="col-md-4 col-form-label pb-2 pt-1">{{__('master.WORK-PERMIT')}}</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control form-control-sm" type="file" name="work_permit" id="work_permit" value="{{ isset($item) ? $item->work_permit : old('work_permit') }}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <p class="card-title-desc horizontal_separator mt-4 text-sm">{{__('master.EDUCATION')}}</p>
                                                        <div class="row">
                                                            <label for="certificate_level_id" class="col-md-4 col-form-label pb-2 pt-1">{{__('master.CERTIFICATE-LEVEL')}}</label>
                                                            <div class="col-md-8">
                                                            <select class="form-control form-control-sm select2" name="certificate_level_id" id="certificate_level_id">
                                                                @foreach($certificateLevels as $certificateLevel)
                                                                    <option value="{{$certificateLevel->id}}" @if (isset($item)) @if($item->certificate_level_id == $certificateLevel->id) selected @endif @endif>{{$certificateLevel->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label for="field_of_study" class="col-md-4 col-form-label pb-2 pt-1">{{__('master.FIELD-OF-STUDY')}}</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control form-control-sm" type="text" name="field_of_study" id="field_of_study" value="{{ isset($item) ? $item->field_of_study : old('field_of_study') }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label for="school" class="col-md-4 col-form-label pb-2 pt-1">{{__('master.SCHOOL')}}</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control form-control-sm" type="text" name="school" id="school" value="{{ isset($item) ? $item->school : old('school') }}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <p class="card-title-desc horizontal_separator mt-4 text-sm">{{__('master.STATUS')}}</p>
                                                        <div class="row">
                                                            <label for="type_id" class="col-md-4 col-form-label pb-2 pt-1">{{__('master.EMPLOYEE-TYPE')}}</label>
                                                            <div class="col-md-8">
                                                                <select class="form-control form-control-sm select2" name="type_id" id="type_id">
                                                                    @foreach($employeesTypes as $employeesType)
                                                                        <option value="{{$employeesType->id}}" @if (isset($item)) @if($item->type_id == $employeesType->id) selected @endif @endif>{{$employeesType->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label for="related_user" class="col-md-4 col-form-label pb-2 pt-1">{{__('master.RELATED-USER')}}</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control form-control-sm" type="text" name="related_user" id="related_user" value="{{ isset($item) ? $item->related_user : old('related_user') }}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <p class="card-title-desc horizontal_separator mt-4 text-sm">{{__('master.ATTENDANCE/POINT-OF-SALE')}}</p>
                                                        <div class="row">
                                                            <label for="pin_code" class="col-md-4 col-form-label pb-2 pt-1">{{__('master.PIN-CODE')}}</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control form-control-sm" type="text" name="pin_code" id="pin_code" value="{{ isset($item) ? $item->pin_code : old('pin_code') }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label for="badge_id" class="col-md-4 col-form-label pb-2 pt-1">{{__('master.BADGE-ID')}}</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control form-control-sm" type="text" name="badge_id" id="badge_id" value="{{ isset($item) ? $item->badge_id : old('badge_id') }}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <p class="card-title-desc horizontal_separator mt-4 text-sm">{{__('master.PAYROLL')}}</p>
                                                        <div class="row">
                                                            <label for="current_contract" class="col-md-4 col-form-label pb-2 pt-1">{{__('master.CURRENT-CONTRACT')}}</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control form-control-sm" type="text" name="current_contract" id="current_contract" value="{{ isset($item) ? $item->current_contract : old('current_contract') }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label for="job_position_id" class="col-md-4 col-form-label pb-2 pt-1">{{__('master.JOB-POSITION')}}</label>
                                                            <div class="col-md-8" id="job_position_response">
                                                                <i class="bx bx-link-external text-primary pointer external-link" data-link="{{route('master.getJobPosition')}}" data-select="#job_position_id"></i>
                                                                <select class="form-control form-control-sm select2" name="job_position_id" id="job_position_id">
                                                                    <option value="">{{__('master.SELECT')}}</option>
                                                                    @foreach($jobPositions as $jobPosition)
                                                                        <option value="{{$jobPosition->id}}" @if (isset($item)) @if($item->job_position_id == $jobPosition->id) selected @endif @endif>{{$jobPosition->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <p class="card-title-desc horizontal_separator mt-4 text-sm">{{__('master.APPLICATION-SETTINGS')}}</p>
                                                        <div class="row">
                                                            <label for="fleet_mobility_card" class="col-md-4 col-form-label pb-2 pt-1">{{__('master.FLEET-MOBILITY-CARD')}}</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control form-control-sm" type="text" name="fleet_mobility_card" id="fleet_mobility_card" value="{{ isset($item) ? $item->fleet_mobility_card : old('fleet_mobility_card') }}">
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

<script>
    $('#myTab a').on('click', function (event) 
    {
        event.preventDefault()
        $(this).tab('show')
    })

    // =============  Show External Links =============
    $(document).on('click', '.external-link', function()
    {
        var loader 	    = $('#loader2').attr('data-load');
        var link 	    = $(this).attr('data-link');
        var select 	    = $(this).attr('data-select');
        var value 	    = $(select).val();
        
        $('#modal_body').html(loader);
        $('#popup').modal('show');

        $.ajax({
            url: 		link,
            method: 	'POST',
            dataType: 	'text',
            data:       {id: value},
            success : function(response)
            {
                var obj = JSON.parse(response);
                if(obj.status == true)
                {
                    $('#modal_body').html(obj.data);
                }
                
            }
        });

    });  

    // =============  Popup Forms Actions =============
    $(document).on('submit', '.popup_form', function(e)
    {   
        e.preventDefault();
        let formData    = new FormData(this);
        var url         = $("#url").val();
        var id_response = $("#id_response").val();
        $('.submit2').prop('disabled', true);

        $.ajax({
            url: 		url,
            method: 	'POST',
            data: formData,
            dataType: 	'json',
            contentType: false,
            processData: false,
            success : function(data)
            {
                $(id_response).html(data['data']);
                $('.modal').modal('hide');
                $('.submit2').prop('disabled', false);
            },
            error : function(reject)
            {
                $('.submit2').prop('disabled', false);
            }
        });
    });

</script>

@endsection
