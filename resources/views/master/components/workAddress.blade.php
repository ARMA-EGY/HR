


<div class="modal-content">
    <div class="modal-header bg-blue">
        <h4 class="modal-title text-left"> Work Address</h4>
        <button type="button" class="close btn btn-danger btn-sm" data-bs-dismiss="modal" aria-hidden="true">×</button>
    </div>

    <form class="popup_form">
    <div class="modal-body">	
    @if (isset($item))
        <input type="hidden" name="url" id="url" value="{{route('master.workAddresses.update', $item->id)}}">
        @method('PUT')
    @else
            <input type="hidden" name="url" id="url" value="{{route('master.workAddresses.store')}}">
    @endif  
        <input type="hidden" name="data_link" value="{{route('master.getWorkAddress')}}"> 
        <input type="hidden" name="input_name" value="work_address_id"> 
        <input type="hidden" id="id_response" value="#work_address_response"> 

            <div class="row mx-2">
                  <div class="form-check col-md-3">
                    <input class="form-check-input radioButtons" type="radio" name="type" id="gridRadios1" value="individual" checked>
                    <label class="form-check-label" for="gridRadios1">
                        Individual
                    </label>
                  </div>
                  <div class="form-check col-md-3">
                    <input class="form-check-input radioButtons" type="radio" name="type" id="gridRadios2" value="company">
                    <label class="form-check-label" for="gridRadios2">
                        Company
                    </label>
                  </div>
            </div>

            <div class="row mt-4">
                <label for="address_name" class="col-md-3 col-form-label pb-2 pt-1">Address Name</label>
                <div class="col-md-6">
                    <input class="form-control form-control-sm" type="text" name="address_name" id="address_name" value="{{ isset($item) ? $item->name : old('name') }}">
                </div>
            </div>

            <div class="row individual">
                <label for="Address_id" class="col-md-3 col-form-label pb-2 pt-1">Address Type</label>
                <div class="col-md-6">
                <select class="form-control form-control-sm select2" name="Address_id" id="Address_id">                                                                    
                    @foreach($contractTypes as $contractType)
                        <option value="{{$contractType->id}}" @if (isset($item)) @if($item->Address_id == $contractType->id) selected @endif @endif>{{$contractType->name}}</option>
                    @endforeach
                </select>
                </div>
            </div>

            
            <div class="row mt-4">

                <div class="col-md-6">

                    <div class="row">
                        <label class="col-md-4 col-form-label pb-2 pt-1">Address</label>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-12">
                                    <input class="form-control form-control-sm" type="text" name="street" placeholder="street..." value="{{ isset($item) ? $item->street : old('street') }}">
                                </div>
                                <div class="col-md-12">
                                    <input class="form-control form-control-sm" type="text" name="street2" placeholder="street 2..." value="{{ isset($item) ? $item->street2 : old('street2') }}">
                                </div>
                                <div class="col-md-4 pr-0">
                                    <input class="form-control form-control-sm" type="text" name="city" placeholder="city" value="{{ isset($item) ? $item->city : old('city') }}">
                                </div>
                                <div class="col-md-4 p-0">
                                    <input class="form-control form-control-sm" type="text" name="state" placeholder="state" value="{{ isset($item) ? $item->state : old('state') }}">
                                </div>
                                <div class="col-md-4 pl-0">
                                    <input class="form-control form-control-sm" type="text" name="zip" placeholder="zip" value="{{ isset($item) ? $item->zip : old('zip') }}">
                                </div>
                                <div class="col-md-12">   
                                <select class="form-control form-control-sm select2" name="country_id" id="country_id">                                                                    
                                    @foreach($countries as $country)
                                        <option value="{{$country->id}}">{{$country->country_Name}}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <label for="tax_id" class="col-md-4 col-form-label pb-2 pt-1">Tax ID</label>
                        <div class="col-md-8">
                            <input class="form-control form-control-sm" type="text" name="tax_id" id="tax_id" value="{{ isset($item) ? $item->tax_id : old('tax_id') }}">
                        </div>
                    </div>
                    
                </div>

                <div class="col-md-6">

                    <div class="row individual">
                        <label for="job_position" class="col-md-4 col-form-label pb-2 pt-1">Job Position</label>
                        <div class="col-md-8">
                            <input class="form-control form-control-sm individual-input" type="text" name="job_position" id="job_position" value="{{ isset($item) ? $item->job_position : old('job_position') }}">
                        </div>
                    </div>

                    <div class="row">
                        <label for="phone" class="col-md-4 col-form-label pb-2 pt-1">Phone</label>
                        <div class="col-md-8">
                            <input class="form-control form-control-sm" type="text" name="phone" id="phone" value="{{ isset($item) ? $item->phone : old('phone') }}">
                        </div>
                    </div>

                    <div class="row">
                        <label for="mobile" class="col-md-4 col-form-label pb-2 pt-1">Mobile</label>
                        <div class="col-md-8">
                            <input class="form-control form-control-sm" type="text" name="mobile" id="mobile" value="{{ isset($item) ? $item->mobile : old('mobile') }}">
                        </div>
                    </div>

                    <div class="row">
                        <label for="address_email" class="col-md-4 col-form-label pb-2 pt-1">Email</label>
                        <div class="col-md-8">
                            <input class="form-control form-control-sm" type="email" name="email" id="email" value="{{ isset($item) ? $item->email : old('email') }}">
                        </div>
                    </div>

                    <div class="row">
                        <label for="website" class="col-md-4 col-form-label pb-2 pt-1">Website</label>
                        <div class="col-md-8">
                            <input class="form-control form-control-sm" type="text" name="website" id="website" value="{{ isset($item) ? $item->website : old('website') }}">
                        </div>
                    </div>

                    <div class="row individual">
                        <label for="title" class="col-md-4 col-form-label pb-2 pt-1">Title</label>
                        <div class="col-md-8">
                            <select class="form-control form-control-sm select2" name="title_id" id="title_id">                                                                    
                                @foreach($titles as $title)
                                    <option value="{{$title->id}}" @if (isset($item)) @if($item->title_id == $title->id) selected @endif @endif>{{$title->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row individual">
                        <label for="tag" class="col-md-4 col-form-label pb-2 pt-1">Tag</label>
                        <div class="col-md-8">
                            <select class="form-control form-control-sm select2" name="tag_id" id="tag_id">                                                                    
                                @foreach($tags as $tag)
                                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>                    

                </div>

            </div>

        

    </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm submit2">Save</button>
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
            </div>
        </form>
</div>


<script>
    if ($("input[name='type']:checked").val() == 'company')
    {
        $('.individual').slideUp();
    }

    $('.radioButtons').click(function()
    {
        if ($("input[name='type']:checked").val() == 'company')
        {
            $('.individual').slideUp();
        }
        else
        {
            $('.individual').slideDown();
        }
    });
</script>