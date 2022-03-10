


<div class="modal-content">
    <div class="modal-header bg-blue">
        <h4 class="modal-title text-left"> Work Address</h4>
        <button type="button" class="close btn btn-danger btn-sm" data-bs-dismiss="modal" aria-hidden="true">×</button>
    </div>
    <form id="create_work_address" class="create_work_address">
    <div class="modal-body">	
        

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
                    <input class="form-control form-control-sm" type="text" name="address_name" id="address_name">
                </div>
            </div>

            <div class="row individual">
                <label for="Address_id" class="col-md-3 col-form-label pb-2 pt-1">Address Type</label>
                <div class="col-md-6">
                <select class="form-control form-control-sm select2" name="Address_id" id="Address_id">                                                                    
                    @foreach($contractTypes as $contractType)
                        <option value="{{$contractType->id}}">{{$contractType->name}}</option>
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
                                    <input class="form-control form-control-sm" type="text" name="street" placeholder="street...">
                                </div>
                                <div class="col-md-12">
                                    <input class="form-control form-control-sm" type="text" name="street2" placeholder="street 2...">
                                </div>
                                <div class="col-md-4 pr-0">
                                    <input class="form-control form-control-sm" type="text" name="city" placeholder="city">
                                </div>
                                <div class="col-md-4 p-0">
                                    <input class="form-control form-control-sm" type="text" name="state" placeholder="state">
                                </div>
                                <div class="col-md-4 pl-0">
                                    <input class="form-control form-control-sm" type="text" name="zip" placeholder="zip">
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
                            <input class="form-control form-control-sm" type="text" name="tax_id" id="tax_id">
                        </div>
                    </div>
                    
                </div>

                <div class="col-md-6">

                    <div class="row individual">
                        <label for="job_position" class="col-md-4 col-form-label pb-2 pt-1">Job Position</label>
                        <div class="col-md-8">
                            <input class="form-control form-control-sm individual-input" type="text" name="job_position" id="job_position">
                        </div>
                    </div>

                    <div class="row">
                        <label for="phone" class="col-md-4 col-form-label pb-2 pt-1">Phone</label>
                        <div class="col-md-8">
                            <input class="form-control form-control-sm" type="text" name="phone" id="phone">
                        </div>
                    </div>

                    <div class="row">
                        <label for="mobile" class="col-md-4 col-form-label pb-2 pt-1">Mobile</label>
                        <div class="col-md-8">
                            <input class="form-control form-control-sm" type="text" name="mobile" id="mobile">
                        </div>
                    </div>

                    <div class="row">
                        <label for="address_email" class="col-md-4 col-form-label pb-2 pt-1">Email</label>
                        <div class="col-md-8">
                            <input class="form-control form-control-sm" type="email" name="email" id="email">
                        </div>
                    </div>

                    <div class="row">
                        <label for="website" class="col-md-4 col-form-label pb-2 pt-1">Website</label>
                        <div class="col-md-8">
                            <input class="form-control form-control-sm" type="text" name="website" id="website">
                        </div>
                    </div>

                    <div class="row individual">
                        <label for="title" class="col-md-4 col-form-label pb-2 pt-1">Title</label>
                        <div class="col-md-8">
                            <select class="form-control form-control-sm select2" name="title_id" id="title_id">                                                                    
                                @foreach($titles as $title)
                                    <option value="{{$title->id}}">{{$title->name}}</option>
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
                <button type="submit" class="btn btn-primary btn-sm">Save</button>
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