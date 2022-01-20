@extends('layouts.master')

@section('sidebar')
    @include('layouts.sidebar.profile')
@endsection


@section('content')

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid mt-5">
                <div class="row">
          
                  <div class="col-xl-4">
          
                      <div class="card card-defualt">
                        <div class="card-header card-header2"><i class="far fa-id-badge"></i> {{__('profile.PROFILE-PICTURE')}} </div>
                          <div class="card-body px-3">
                              <div class="avatar-preview" style="background-image: url({{ asset(Auth::user()->avatar)}})"></div>
          
                              <div class="my-2 text-left">
                                <small> {!! __('profile.IMAGE-INFO') !!} </small> 
                              </div>
          
                              <form class="profile_picture_form">
                                @csrf
                                <input class="d-none" type="file" accept="image/*" id="avatar" name="avatar" multiple="false" />
                                <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                                <label for="avatar" class="btn btn-info btn-block btn-sm"><i class="fa fa-image"></i> {{__('profile.CHANGE-PROFILE-PICTURE')}}</label>
                              </form>
                          </div>
                      </div>
          
                  </div>
          
                  <div class="col-xl-8">
          
                    <form class="user_info_form">
                      @csrf
                      <div class="card card-defualt">
                          <div class="card-header card-header2"><i class="fa fa-info-circle"></i> {{__('profile.PERSONAL-INFORMATION')}} </div>
                          <div class="card-body">
                                  
                                  <div class="row">
          
                                      <!--=================  Name  =================-->
                                      <div class="form-group col-md-6 mb-2 text-left">
                                          <label class="font-weight-bold text-uppercase">{{__('profile.NAME')}}</label>
                                          <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" required>
                                      </div>
                  
                                      <!--=================  Phone  =================-->
                                      <div class="form-group col-md-6 mb-2 text-left">
                                          <label class="font-weight-bold text-uppercase">{{__('profile.PHONE')}} </label>
                                          <input type="number" name="phone" class="form-control" value="{{ Auth::user()->phone }}" required>
                                      </div>
          
                                  </div>
                                  <hr class="my-2">
          
                                  <div class="row">
          
                                      <!--=================  E-mail  =================-->
                                      <div class="form-group col-md-6 mb-2 text-left">
                                          <label class="font-weight-bold text-uppercase">{{__('profile.EMAIL')}}</label>
                                          <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}" required>
                                      </div>
                  
                                      <!--=================  Gender  =================-->
                                      <div class="form-group col-md-6 mb-2 text-left">
                                          <label class="font-weight-bold text-uppercase">{{__('profile.GENDER')}}</label>
          
                                          <select class="form-control" name="gender" required>
                                              <option value="Male" @if (Auth::user()->gender == 'Male') selected @endif>{{__('profile.MALE')}}</option>
                                              <option value="Female" @if (Auth::user()->gender == 'Female') selected @endif>{{__('profile.FEMALE')}}</option>
                                          </select>
                                      </div>
          
                                  </div>
                                  <hr class="my-2">
          
                                  <div class="row">
          
                                      <!--=================   Birthdate  =================-->
                                      <div class="form-group col-md-6 mb-2 text-left">
                                          <label class="font-weight-bold text-uppercase">{{__('profile.BIRTHDATE')}}</label>
                                          <input type="date" name="birthdate" class="form-control" value="{{ Auth::user()->birthdate }}" required>
                                      </div>
          
                                      <!--=================  Nationality  =================-->
                                      <div class="form-group col-md-6 mb-2 text-left">
                                          <label class="font-weight-bold text-uppercase">{{__('profile.NATIONALITY')}}</label>
                                          <select class="form-control selectpicker" name="nationality" data-live-search="true" required>
                                            @foreach ($countries as $country)
                                                <option value="{{$country->country_Nationality}}"  @if (Auth::user()->nationality == $country->country_Nationality ) selected @endif >{{__('nationality.'.$country->country_Nationality)}}</option>
                                            @endforeach
                                        </select>
                                      </div>
          
                                  </div>
                          </div>
                          
                          <!-- Save -->
                          <div class="card-footer card-footer2">
                            <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                            <div class="col-12 text-right">
                              <button type="submit" class="btn btn-sm btn-success submit">{{__('profile.SAVE-CHANGES')}}</button>
                            </div>
                          </div>
                      </div>
                    </form>
          
          
                    <form class="change_password_form">
                      @csrf
                      <div class="card card-defualt">
                          <div class="card-header card-header2"><i class="fas fa-lock"></i> {{__('profile.PASSWORD')}} </div>
                          <div class="card-body">
                              <div class="row">
          
                                  <!--=================  Current Password  =================-->
                                  <div class="form-group col-md-6 mb-2 text-left">
                                      <label for="password" class="form-control-label" for="input-phone">{{__('profile.CURRENT-PASSWORD')}}</label>
                                      <input id="password" type="password" class="form-control" name="oldpassword" required autocomplete="new-password">
                                  </div>
          
                                  <!--================= New Password  =================-->
                                  <div class="form-group col-md-6 mb-2 text-left">
                                      <label for="password-new" class="form-control-label">{{__('profile.NEW-PASSWORD')}}</label>
                                      <input id="password-new" type="password" class="form-control" name="newpassword" required autocomplete="new-password">
                                  </div>
          
                              </div>
                              <div class="my-2 text-info text-left">
                                  <small> {!! __('profile.PASSWORD-INFO') !!} </small> 
                              </div>
                          </div>
                          
                          <!-- Save -->
                          <div class="card-footer card-footer2">
                            <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                            <div class="col-12 text-right">
                              <button type="submit" class="btn btn-sm btn-danger submit">{{__('profile.CHANGE-PASSWORD')}}</button>
                            </div>
                          </div>
                      </div>  
                    </form>
          
                  </div>
          
                </div>
                
              </div>
        </div>
    </div>

@endsection


@section('script')
<script>

  // ==========================  Edit User Info ==========================
  $(document).on('submit', '.user_info_form', function(e)
	{
        e.preventDefault();
        let formData = new FormData(this);
        $('.submit').prop('disabled', true);

        $.ajax({
            url: 		"{{route('profile.edit-info')}}",
            method: 	'POST',
            data: formData,
            contentType: false,
            processData: false,
            success : function(data)
                {
                    $('.submit').prop('disabled', false);
                    
                    if (data['status'] == 'true')
                    {
                        Swal.fire(
                                "{{__('profile.DONE')}}",
                                "{{__('profile.DATA-CHANGED-SUCCESSFULLY')}}",
                                'success'
                                )
                    }
                    else if (data['status'] == 'false')
                    {
                        Swal.fire(
                                "{{__('profile.OOPS')}}",
                                "{{__('profile.SOMETHING-WRONG')}}",
                                'error'
                                )
                    }
                },
                error : function(reject)
                {
                    $('.submit').prop('disabled', false);

                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function(key, val)
                    {
                        Swal.fire(
                                "{{__('profile.OOPS')}}",
                                val[0],
                                'error'
                                )
                    });
                }
            
            
        });

  });

  // ==========================  Change Passowrd ==========================
  $(document).on('submit', '.change_password_form', function(e)
	{
        e.preventDefault();
        let formData = new FormData(this);
        $('.submit').prop('disabled', true);

        $.ajax({
            url: 		"{{route('profile.change-password')}}",
            method: 	'POST',
            data: formData,
            contentType: false,
            processData: false,
            success : function(data)
                {
                    $('.submit').prop('disabled', false);
                    
                    if (data['status'] == 'true')
                    {
                        Swal.fire(
                                "{{__('profile.DONE')}}",
                                "{{__('profile.DATA-CHANGED-SUCCESSFULLY')}}",
                                'success'
                                )
                    }
                    else if (data['status'] == 'false')
                    {
                        Swal.fire(
                                "{{__('profile.OOPS')}}",
                                "{{__('profile.SOMETHING-WRONG')}}",
                                'error'
                                )
                    }
                    else if (data['status'] == 'error')
                    {
                        Swal.fire(
                                "{{__('profile.OOPS')}}",
                                data['msg'],
                                'error'
                                )
                    }
                },
                error : function(reject)
                {
                    $('.submit').prop('disabled', false);

                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function(key, val)
                    {
                        Swal.fire(
                                "{{__('profile.OOPS')}}",
                                val[0],
                                'error'
                                )
                    });
                }
            
            
        });

  });

  // ==========================  Change Avatar ==========================
  function readURL(input) 
  {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          
          reader.onload = function (e) 
          {
              $('.avatar-preview').css('background-image','url('+e.target.result+')');
          };
          
          reader.readAsDataURL(input.files[0]);
      }
  }
  
  $("#avatar").change(function()
  {
      readURL(this);
      $('.profile_picture_form').submit();

  });
  
  $(document).on('submit', '.profile_picture_form', function(e)
	{
        e.preventDefault();
        let formData = new FormData(this);

        $.ajax({
            url: 		"{{route('profile.change-picture')}}",
            method: 	'POST',
            data: formData,
            contentType: false,
            processData: false,
            success : function(data)
                {
                    if (data['status'] == 'true')
                    {
                        Swal.fire(
                                "{{__('profile.DONE')}}",
                                "{{__('profile.DATA-CHANGED-SUCCESSFULLY')}}",
                                'success'
                                )
                    }
                    else if (data['status'] == 'false')
                    {
                        Swal.fire(
                                "{{__('profile.OOPS')}}",
                                "{{__('profile.SOMETHING-WRONG')}}",
                                'error'
                                )
                    }
                },
                error : function(reject)
                {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function(key, val)
                    {
                        Swal.fire(
                                "{{__('profile.OOPS')}}",
                                val[0],
                                'error'
                                )
                    });
                }
            
        });
  });

</script>
@endsection