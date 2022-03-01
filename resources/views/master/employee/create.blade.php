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
                                <h4 class="mb-sm-0 font-size-18">{{__('master.CREATE-EMPLOYEE')}}</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">{{__('master.EMPLOYEES')}}</a></li>
                                        <li class="breadcrumb-item active">{{__('master.CREATE-EMPLOYEE')}}</li>
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
                                    <div class="card-body">
        
                                        <h4 class="card-title">Basic Information</h4>
                                        <p class="card-title-desc">Fill all information below</p>
                                            
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <div class="mb-1">
                                                    <input id="name" name="name" type="text" placeholder="Name" class="form-control">
                                                </div>
                                                <div class="mb-1">
                                                    <input id="job_position" name="job_position" type="text" placeholder="Job Position" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <div class="row">
                                                        <label for="tags" class="col-md-2 col-form-label pb-2 pt-1">Tags</label>
                                                        <div class="col-md-10">
                                                            <select class="select2 form-control select2-multiple" name="tags[]" multiple="multiple" data-placeholder="Choose ...">
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
                                            <label for="work_mobile" class="col-md-2 col-form-label pb-2 pt-1">Work Mobile</label>
                                            <div class="col-md-4">
                                                <input class="form-control form-control-sm" type="text" name="work_mobile" id="work_mobile">
                                            </div>
                                            <label for="department_id" class="col-md-2 col-form-label pb-2 pt-1">Department</label>
                                            <div class="col-md-4">
                                                <select class="form-control form-control-sm select2" name="department_id" id="department_id">
                                                
                                                @foreach($departments as $department)
                                                    <option value="{{$department->id}}">{{$department->name}}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label for="work_phone" class="col-md-2 col-form-label pb-2 pt-1">Work Phone</label>
                                            <div class="col-md-4">
                                                <input class="form-control form-control-sm" type="text" name="work_phone" id="work_phone">
                                            </div>
                                            <label for="manager_id" class="col-md-2 col-form-label pb-2 pt-1">Manager</label>
                                            <div class="col-md-4">
                                                <select class="form-control form-control-sm select2" name="manager_id" id="manager_id">
                                                    
                                                    @foreach($managers as $manager)
                                                        <option value="{{$manager->id}}">{{$manager->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label for="work_email" class="col-md-2 col-form-label pb-2 pt-1">Work Email</label>
                                            <div class="col-md-4">
                                                <input class="form-control form-control-sm" type="text" name="work_email" id="work_email">
                                            </div>
                                            <label for="coach_id" class="col-md-2 col-form-label pb-2 pt-1">Coach</label>
                                            <div class="col-md-4">
                                                <select class="form-control form-control-sm select2" name="coach_id" id="coach_id">
                                                    
                                                    @foreach($managers as $manager)
                                                        <option value="{{$manager->id}}">{{$manager->name}}</option>
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
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Work Information</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Private Information</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">HR Settings</a>
                                            </li>
                                        </ul>

                                        <div class="tab-content" id="myTabContent">

                                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                                                <p class="card-title-desc horizontal_separator mt-4 text-sm">Location</p>
                                                <div class="row">
                                                    <label for="work_address_id" class="col-md-2 col-form-label pb-2 pt-1">Work Address</label>
                                                    <div class="col-md-4">
                                                        <select class="form-control form-control-sm select2" name="work_address_id" id="work_address_id">
                                                            
                                                            @foreach($workAddress as $address)
                                                                <option value="{{$address->id}}">{{$address->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <label for="work_location_id" class="col-md-2 col-form-label pb-2 pt-1">Work Location</label>
                                                    <div class="col-md-4">
                                                        <select class="form-control form-control-sm select2" name="work_location_id" id="work_location_id">
                                                            
                                                            @foreach($workLocations as $workLocation)
                                                                <option value="{{$workLocation->id}}">{{$workLocation->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <p class="card-title-desc horizontal_separator mt-4 text-sm">Approvers</p>
                                                <div class="row">
                                                    <label for="time_off" class="col-md-2 col-form-label pb-2 pt-1">Time Off</label>
                                                    <div class="col-md-4">
                                                        <input class="form-control form-control-sm" type="text" name="time_off" id="time_off">
                                                    </div>
                                                    <label for="expense" class="col-md-2 col-form-label pb-2 pt-1">Expense</label>
                                                    <div class="col-md-4">
                                                        <input class="form-control form-control-sm" type="text" name="expense" id="expense">
                                                    </div>
                                                </div>

                                                <p class="card-title-desc horizontal_separator mt-4 text-sm">Schedule</p>
                                                <div class="row">
                                                    <label for="working_hour_id" class="col-md-2 col-form-label pb-2 pt-1">Working Hours</label>
                                                    <div class="col-md-4">
                                                        <select class="form-control form-control-sm select2" name="working_hour_id" id="working_hour_id">      
                                                            @foreach($workingHours as $workingHour)
                                                                <option value="{{$workingHour->id}}">{{$workingHour->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <label for="time_zone_id" class="col-md-2 col-form-label pb-2 pt-1">Timezone</label>
                                                    <div class="col-md-4">
                                                        <select class="form-control form-control-sm select2" name="time_zone_id" id="time_zone_id">
                                                            
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <p class="card-title-desc horizontal_separator mt-4 text-sm">Planning</p>
                                                <div class="row">
                                                    <label for="default_planning_role" class="col-md-2 col-form-label pb-2 pt-1">Default Planning Role</label>
                                                    <div class="col-md-4">
                                                        <input class="form-control form-control-sm" type="text" name="default_planning_role" id="default_planning_role">
                                                    </div>
                                                    <label for="planning_roles" class="col-md-2 col-form-label pb-2 pt-1">Planning Roles</label>
                                                    <div class="col-md-4">
                                                        <input class="form-control form-control-sm" type="text" name="planning_roles" id="planning_roles">
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <p class="card-title-desc horizontal_separator mt-4 text-sm">Private Contact</p>
                                                        <div class="row">
                                                            <label for="address_id" class="col-md-4 col-form-label pb-2 pt-1">Address</label>
                                                            <div class="col-md-8">
                                                                <select class="form-control form-control-sm select2" name="address_id" id="address_id">
                                                                    
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label for="email" class="col-md-4 col-form-label pb-2 pt-1">Email</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control form-control-sm" type="email" name="email" id="email">
                                                            </div>                                  
                                                        </div>
                                                        <div class="row">
                                                            <label for="phone" class="col-md-4 col-form-label pb-2 pt-1">Phone</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control form-control-sm" type="number" name="phone" id="phone">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label for="language_id" class="col-md-4 col-form-label pb-2 pt-1">Language</label>
                                                            <div class="col-md-8">
                                                                <select class="form-control form-control-sm select2" name="language_id" id="language_id">
                                                                                                                           
                                                                    @foreach($languages as $language)
                                                                        <option value="{{$language->id}}">{{$language->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label for="home_work_distance" class="col-md-4 col-form-label pb-2 pt-1">Home-Work Distance</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control form-control-sm" type="number" name="home_work_distance" id="home_work_distance">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <p class="card-title-desc horizontal_separator mt-4 text-sm">Citizenship</p>
                                                        <div class="row">
                                                            <label for="nationality_id" class="col-md-4 col-form-label pb-2 pt-1">Nationality</label>
                                                            <div class="col-md-8">
                                                                <select class="form-control form-control-sm select2" name="nationality_id" id="nationality_id">
                                                                    
                                                                    @foreach($countries as $country)
                                                                        <option value="{{$country->id}}">{{$country->country_Nationality}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label for="identification_no" class="col-md-4 col-form-label pb-2 pt-1">Identification No</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control form-control-sm" type="text" name="identification_no" id="identification_no">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label for="passport" class="col-md-4 col-form-label pb-2 pt-1">Passport No</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control form-control-sm" type="text" name="passport" id="passport">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label for="gender" class="col-md-4 col-form-label pb-2 pt-1">Gender</label>
                                                            <div class="col-md-8">
                                                                <select class="form-control form-control-sm select2" name="gender" id="gender">
                                                                    
                                                                    <option value="male">Male</option>
                                                                    <option value="female">Female</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label for="dateofbirth" class="col-md-4 col-form-label pb-2 pt-1">Date of Birth</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control form-control-sm" type="date" name="dateofbirth" id="dateofbirth">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label for="placeofbirth" class="col-md-4 col-form-label pb-2 pt-1">Place of Birth</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control form-control-sm" type="text" name="placeofbirth" id="placeofbirth">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label for="countryofbirth_id" class="col-md-4 col-form-label pb-2 pt-1">Country of Birth</label>
                                                            <div class="col-md-8">
                                                            <select class="form-control form-control-sm select2" name="countryofbirth_id" id="countryofbirth_id">
                                                                
                                                                @foreach($countries as $country)
                                                                    <option value="{{$country->id}}">{{$country->country_Name}}</option>
                                                                @endforeach
                                                            </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <p class="card-title-desc horizontal_separator mt-4 text-sm">Marital Status</p>
                                                        <div class="row">
                                                            <label for="maritalstatus_id" class="col-md-4 col-form-label pb-2 pt-1">Marital Status</label>
                                                            <div class="col-md-8">
                                                                <select class="form-control form-control-sm select2" name="maritalstatus_id" id="maritalstatus_id">
                                                                    
                                                                    @foreach($maritalStatuses as $maritalStatus)
                                                                        <option value="{{$maritalStatus->id}}">{{$maritalStatus->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <p class="card-title-desc horizontal_separator mt-4 text-sm">Dependant</p>
                                                        <div class="row">
                                                            <label for="no_ofchildren" class="col-md-4 col-form-label pb-2 pt-1">Number of Children</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control form-control-sm" type="number" name="no_ofchildren" id="no_ofchildren">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <p class="card-title-desc horizontal_separator mt-4 text-sm">Emergency</p>
                                                        <div class="row">
                                                            <label for="emergency_contact" class="col-md-4 col-form-label pb-2 pt-1">Emergency Contact</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control form-control-sm" type="text" name="emergency_contact" id="emergency_contact">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label for="emergency_phone" class="col-md-4 col-form-label pb-2 pt-1">Emergency Phone</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control form-control-sm" type="number" name="emergency_phone" id="emergency_phone">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <p class="card-title-desc horizontal_separator mt-4 text-sm">Work Permit</p>
                                                        <div class="row">
                                                            <label for="visa_no" class="col-md-4 col-form-label pb-2 pt-1">Visa No</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control form-control-sm" type="number" name="visa_no" id="visa_no">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label for="work_permit_no" class="col-md-4 col-form-label pb-2 pt-1">Work Permit No</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control form-control-sm" type="number" name="work_permit_no" id="work_permit_no">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label for="visa_expire_date" class="col-md-4 col-form-label pb-2 pt-1">Visa Expire Date</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control form-control-sm" type="date" name="visa_expire_date" id="visa_expire_date">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label for="work_permit_expire_date" class="col-md-4 col-form-label pb-2 pt-1">Work Permit Expiration Date</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control form-control-sm" type="date" name="work_permit_expire_date" id="work_permit_expire_date">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label for="work_permit_expire_date" class="col-md-4 col-form-label pb-2 pt-1">Work Permit Expiration Date</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control form-control-sm" type="date" name="work_permit_expire_date" id="work_permit_expire_date">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label for="work_permit" class="col-md-4 col-form-label pb-2 pt-1">Work Permit</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control form-control-sm" type="file" name="work_permit" id="work_permit">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <p class="card-title-desc horizontal_separator mt-4 text-sm">Education</p>
                                                        <div class="row">
                                                            <label for="certificate_level_id" class="col-md-4 col-form-label pb-2 pt-1">Certificate Level</label>
                                                            <div class="col-md-8">
                                                            <select class="form-control form-control-sm select2" name="certificate_level_id" id="certificate_level_id">
                                                                
                                                                @foreach($certificateLevels as $certificateLevel)
                                                                    <option value="{{$certificateLevel->id}}">{{$certificateLevel->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label for="field_of_study" class="col-md-4 col-form-label pb-2 pt-1">Field of Study</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control form-control-sm" type="text" name="field_of_study" id="field_of_study">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label for="school" class="col-md-4 col-form-label pb-2 pt-1">School</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control form-control-sm" type="text" name="school" id="school">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <p class="card-title-desc horizontal_separator mt-4 text-sm">Status</p>
                                                        <div class="row">
                                                            <label for="type_id" class="col-md-4 col-form-label pb-2 pt-1">Employee Type</label>
                                                            <div class="col-md-8">
                                                                <select class="form-control form-control-sm select2" name="type_id" id="type_id">
                                                                    
                                                                    @foreach($employeesTypes as $employeesType)
                                                                        <option value="{{$employeesType->id}}">{{$employeesType->name}}</option>
                                                                    @endforeach
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

                                                    <div class="col-md-6">
                                                        <p class="card-title-desc horizontal_separator mt-4 text-sm">Attendance/Point of Sale</p>
                                                        <div class="row">
                                                            <label for="pin_code" class="col-md-4 col-form-label pb-2 pt-1">PIN Code</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control form-control-sm" type="text" name="pin_code" id="pin_code">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label for="badge_id" class="col-md-4 col-form-label pb-2 pt-1">Badge ID</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control form-control-sm" type="text" name="badge_id" id="badge_id">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <p class="card-title-desc horizontal_separator mt-4 text-sm">Payroll</p>
                                                        <div class="row">
                                                            <label for="current_contract" class="col-md-4 col-form-label pb-2 pt-1">Current Contract</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control form-control-sm" type="text" name="current_contract" id="current_contract">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label for="payroll_job_position" class="col-md-4 col-form-label pb-2 pt-1">Job Position</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control form-control-sm" type="text" name="payroll_job_position" id="payroll_job_position">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <p class="card-title-desc horizontal_separator mt-4 text-sm">Application Settings</p>
                                                        <div class="row">
                                                            <label for="fleet_mobility_card" class="col-md-4 col-form-label pb-2 pt-1">Fleet Mobility Card</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control form-control-sm" type="text" name="fleet_mobility_card" id="fleet_mobility_card">
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
