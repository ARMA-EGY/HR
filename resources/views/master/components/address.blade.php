


<div class="modal-content">
    <div class="modal-header bg-blue">
        <h4 class="modal-title text-left"> Address</h4>
        <button type="button" class="close btn btn-danger btn-sm" data-bs-dismiss="modal" aria-hidden="true">×</button>
    </div>

    <div class="modal-body">	
        <form>

            <div class="row">
                <label for="address_name" class="col-md-2 col-form-label pb-2 pt-1">Name</label>
                <div class="col-md-6">
                    <input class="form-control form-control-sm" type="text" name="address_name" id="address_name">
                </div>
            </div>
            
            <div class="row mt-4">

                <div class="col-md-6">

                    <div class="row">
                        <label class="col-md-4 col-form-label pb-2 pt-1">Address</label>
                        <div class="col-md-8">

                        <div class="row">
                            <div class="col-md-12">
                                <input class="form-control form-control-sm" type="text" name="address" placeholder="street...">
                            </div>
                            <div class="col-md-12">
                                <input class="form-control form-control-sm" type="text" name="address2" placeholder="street 2...">
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
                                <input class="form-control form-control-sm" type="text" name="country" placeholder="country">
                            </div>
                        </div>

                        </div>
                    </div>
                    
                </div>

                <div class="col-md-6">

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
                            <input class="form-control form-control-sm" type="email" name="address_email" id="address_email">
                        </div>
                    </div>

                    <div class="row">
                        <label for="language" class="col-md-4 col-form-label pb-2 pt-1">Language</label>
                        <div class="col-md-8">
                            <select class="form-control form-control-sm select2" name="language" id="language"> 
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                        </div>
                    </div>

                </div>

            </div>

        </form>

    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-sm">Save</button>
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
    </div>
</div>
