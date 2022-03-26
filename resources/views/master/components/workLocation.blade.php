<div class="modal-content">
    <div class="modal-header bg-blue">
        <h4 class="modal-title text-left"> Work Location</h4>
        <button type="button" class="close btn btn-danger btn-sm" data-bs-dismiss="modal" aria-hidden="true">×</button>
    </div>

    <form class="popup_form">
    @if (isset($item))
        <input type="hidden" name="url" id="url" value="{{route('master.workLocation.update', $item->id)}}">
        @method('PUT')
    @else
            <input type="hidden" name="url" id="url" value="{{route('master.workLocation.store')}}">
    @endif  
        <input type="hidden" name="data_link" value="{{route('master.getWorkLocation')}}"> 
        <input type="hidden" name="input_name" value="work_location_id"> 
        <input type="hidden" id="id_response" value="#work_location_response"> 

    <div class="modal-body">	
        
        <div class="row">
            <label for="work_location" class="col-md-3 col-form-label pb-2 pt-1">Work Location</label>
            <div class="col-md-6">
                <input class="form-control form-control-sm" type="text" name="work_location" id="work_location" value="{{ isset($item) ? $item->name : old('name') }}">
            </div>
        </div>

        <div class="row">
            <label for="work_address" class="col-md-3 col-form-label pb-2 pt-1">Work Address</label>
            <div class="col-md-6">
                <select class="form-control form-control-sm select2" name="work_address" id="work_address">
                    @foreach($workAddresses as $workAddress)
                        <option value="{{$workAddress->id}}" @if (isset($item)) @if($item->work_address == $workAddress->id) selected @endif @endif>{{$workAddress->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <label for="location_number" class="col-md-3 col-form-label pb-2 pt-1">Location Number</label>
            <div class="col-md-6">
                <input class="form-control form-control-sm" type="text" name="location_number" id="location_number" value="{{ isset($item) ? $item->location_number : old('location_number') }}">
            </div>
        </div>

    </div>

    <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn-sm submit2">Save</button>
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
    </div>
    </form>
</div>
