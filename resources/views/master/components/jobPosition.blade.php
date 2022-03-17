


<div class="modal-content">
    <div class="modal-header bg-blue">
        <h4 class="modal-title text-left"> Job Position</h4>
        <button type="button" class="close btn btn-danger btn-sm" data-bs-dismiss="modal" aria-hidden="true">×</button>
    </div>

    <form @if (isset($item)) id="update_job_position" class="update_job_position" @else id="create_job_position" class="create_job_position" @endif>
        <div class="modal-body">	
        @if (isset($item))
        <input type="hidden" name="url" id="url" value="{{route('master.jobPosition.update', $item->id)}}">
        @method('PUT')
    @endif   

                <div class="row">
                    <label for="job_position" class="col-md-3 col-form-label pb-2 pt-1">Job Position</label>
                    <div class="col-md-6">
                        <input class="form-control form-control-sm" type="text" name="job_position" id="job_position">
                    </div>
                </div>


                <ul class="nav nav-tabs mt-4" id="myTabJob" role="tablist">
                    <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Job Description</a>
                    </li>
                    <li class="nav-item" role="presentation">
                    <a class="nav-link" id="recruitment-tab" data-toggle="tab" href="#recruitment" role="tab" aria-controls="recruitment" aria-selected="false">Recruitment</a>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContentJob">

                    <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <textarea class="form-control" name="job_description" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane fade" id="recruitment" role="tabpanel" aria-labelledby="recruitment-tab">

                        <div class="row mt-4">

                            <div class="col-md-6">

                                <div class="row">
                                    <label for="department_id" class="col-md-4 col-form-label pb-2 pt-1">Department</label>
                                    <div class="col-md-8">
                                        <select class="form-control form-control-sm select2" name="department_id" id="department_id">                                                                    
                                            @foreach($departments as $department)
                                                <option value="{{$department->id}}">{{$department->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <label for="work_address_id" class="col-md-4 col-form-label pb-2 pt-1">Job Location</label>
                                    <div class="col-md-8">
                                    <select class="form-control form-control-sm select2" name="work_address_id" id="work_address_id">
                                        @foreach($workAddresses as $workAddress)
                                            <option value="{{$workAddress->id}}">{{$workAddress->name}}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="email_alias" class="col-md-4 col-form-label pb-2 pt-1">Email Alias</label>
                                    <div class="col-md-8">
                                        <input class="form-control form-control-sm" type="email" name="email_alias" id="email_alias">
                                    </div>                                  
                                </div>
                                
                            </div>

                            <div class="col-md-6">

                                <div class="row">
                                    <label for="expected_new_employees" class="col-md-4 col-form-label pb-2 pt-1">Expected New Employees</label>
                                    <div class="col-md-8">
                                        <input class="form-control form-control-sm" type="text" name="expected_new_employees" id="expected_new_employees">
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="recruiter_id" class="col-md-4 col-form-label pb-2 pt-1">Recruiter</label>
                                    <div class="col-md-8">
                                        <select class="form-control form-control-sm select2" name="recruiter_id" id="recruiter_id">
                                            @foreach($recruiters as $recruiter)
                                                <option value="{{$recruiter->id}}">{{$recruiter->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="is_published" class="col-md-4 col-form-label pb-2 pt-1">Is Published</label>
                                    <div class="col-md-8">
                                        <select class="form-control form-control-sm select2" name="is_published" id="is_published"> 
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>

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
    $('#myTabJob a').on('click', function (event) 
    {
        event.preventDefault()
        $(this).tab('show')
    })
</script>