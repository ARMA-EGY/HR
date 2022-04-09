


<div class="modal-content">
    <div class="modal-header bg-blue">
        <h4 class="modal-title text-left"> Address</h4>
        <button type="button" class="close btn btn-danger btn-sm" data-bs-dismiss="modal" aria-hidden="true">×</button>
    </div>

    <form class="popup_form">
        <div class="modal-body">	
        @if (isset($item))
            <input type="hidden" name="url" id="url" value="{{route('master.address.update', $item->id)}}">
            @method('PUT')
        @else
                <input type="hidden" name="url" id="url" value="{{route('master.address.store')}}">
        @endif  
            <input type="hidden" name="data_link" value="{{route('master.getAddress')}}"> 
            <input type="hidden" name="input_name" value="address_id"> 
            <input type="hidden" id="id_response" value="#address_response"> 

                <div class="row">
                    <label for="address_name" class="col-md-2 col-form-label pb-2 pt-1">Name</label>
                    <div class="col-md-6">
                        <input class="form-control form-control-sm" type="text" name="address_name" id="address_name" value="{{ isset($item) ? $item->name : old('name') }}">
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
                                            <option value="{{$country->id}}" @if (isset($item)) @if($item->country_id == $country->id) selected @endif @endif>{{$country->country_Name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            </div>
                        </div>
                        
                    </div>

                    <div class="col-md-6">

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
                                <input class="form-control form-control-sm" type="email" name="email" id="address_email" value="{{ isset($item) ? $item->email : old('email') }}">
                            </div>
                        </div>

                        <div class="row">
                            <label for="language" class="col-md-4 col-form-label pb-2 pt-1">Language</label>
                            <div class="col-md-8">
                                <select class="form-control form-control-sm select2" name="language" id="language"> 
                                    <option value="english" @if (isset($item)) @if($item->language == "english") selected @endif @endif>english</option>
                                    <option value="arabic" @if (isset($item)) @if($item->language == "arabic") selected @endif @endif>arabic</option>
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
