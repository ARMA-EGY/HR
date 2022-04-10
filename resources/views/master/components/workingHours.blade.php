


<div class="modal-content">
    <div class="modal-header bg-blue">
        <h4 class="modal-title text-left"> Working Hours</h4>
        <button type="button" class="close btn btn-danger btn-sm" data-bs-dismiss="modal" aria-hidden="true">×</button>
    </div>

    <div class="modal-body">	

        <form class="popup_form">
        @if (isset($item))
            <input type="hidden" name="url" id="url" value="{{route('master.workingHours.update', $item->id)}}">
            @method('PUT')
        @else
                <input type="hidden" name="url" id="url" value="{{route('master.workingHours.store')}}">
        @endif  
            <input type="hidden" name="data_link" value="{{route('master.getWorkingHours')}}"> 
            <input type="hidden" name="input_name" value="working_hour_id"> 
            <input type="hidden" id="id_response" value="#working_hour_response"> 

            <div class="row">
                <label for="schedule_name" class="col-md-3 col-form-label pb-2 pt-1">Schedule Name</label>
                <div class="col-md-6">
                    <input class="form-control form-control-sm" type="text" name="schedule_name" id="schedule_name">
                </div>
            </div>
            <div class="row">
                <small for="average_hour_per_day" class="col-md-3 col-form-label pb-2 pt-1 text-sm">Average Hour per Day</small>
                <div class="col-md-6">
                    <input class="form-control form-control-sm" type="text" name="average_hour_per_day" id="average_hour_per_day">
                </div>
            </div>


            <ul class="nav nav-tabs mt-4" id="myTabHours" role="tablist">
                <li class="nav-item" role="presentation">
                <a class="nav-link active" id="description-tab" data-toggle="tab" href="#workingHours" role="tab" aria-controls="workingHours" aria-selected="true">Working Hours</a>
                </li>
            </ul>

            <div class="tab-content" id="myTabContentHours">

                <div class="tab-pane fade show active" id="workingHours" role="tabpanel" aria-labelledby="workingHours-tab">

                    <div class="row mt-4">
                        <div class="col-md-12">

                            <div class="text-right mb-3">
                                <a class="btn btn-sm btn-primary text-white add_line"><i class="fa fa-plus"></i></a>
                            </div>

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Day of Week</th>
                                        <th scope="col">Day Period</th>
                                        <th scope="col">Work from</th>
                                        <th scope="col">Work to</th>
                                        <th scope="col"></th>
                                      </tr>
                                    </thead>
                                    <tbody id="table_body">
                                    </tbody>
                                  </table>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </form>

    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-sm submit2">Save</button>
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
    </div>
</div>


<script>
    $('#myTabHours a').on('click', function (event) 
    {
        event.preventDefault()
        $(this).tab('show')
    })

    $('.add_line').click(function()
    {
        var item = $('.line').length
        var total = item + 1;

        $("#table_body").append('<tr class="line parent_'+total+'"><th class="p-1"><input type="text" name="name[]" class="form-control form-control-sm"></th><th class="p-1"><input type="text" name="day_of_week[]" class="form-control form-control-sm"></th><th class="p-1"><input type="text" name="day_period[]" class="form-control form-control-sm"></th><th class="p-1"><input type="text" name="work_from[]" class="form-control form-control-sm"></th><th class="p-1"><input type="text" name="work_to[]" class="form-control form-control-sm"></th><th class="p-1"><a class="btn btn-sm btn-danger remove-line text-white" data-class="parent_'+total+'"><i class="fa fa-times "></i></a></th></tr>');
    });

    $(document).on("click",".remove-line", function()
    {
        var item 	= '.' + $(this).attr('data-class');
        $(item).remove();
    });

</script>