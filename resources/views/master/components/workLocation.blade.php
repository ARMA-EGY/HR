


<div class="modal-content">
    <div class="modal-header bg-blue">
        <h4 class="modal-title text-left"> Work Location</h4>
        <button type="button" class="close btn btn-danger btn-sm" data-bs-dismiss="modal" aria-hidden="true">×</button>
    </div>

    <div class="modal-body">	
        <form>

            <div class="row">
                <label for="work_location" class="col-md-3 col-form-label pb-2 pt-1">Work Location</label>
                <div class="col-md-6">
                    <input class="form-control form-control-sm" type="text" name="work_location" id="contract_start_date">
                </div>
            </div>

            <div class="row">
                <label for="work_address" class="col-md-3 col-form-label pb-2 pt-1">Work Address</label>
                <div class="col-md-6">
                    <select class="form-control form-control-sm select2" name="work_address" id="work_address">
                        <option>Select</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <label for="location_number" class="col-md-3 col-form-label pb-2 pt-1">Location Number</label>
                <div class="col-md-6">
                    <input class="form-control form-control-sm" type="text" name="location_number" id="location_number">
                </div>
            </div>

        </form>

    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-sm">Save</button>
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
    </div>
</div>
