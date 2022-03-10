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
                                <h4 class="mb-sm-0 font-size-18">{{__('master.CREATE-WORK-SCHEDULE')}}</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">{{__('master.WORK-SCHEDULES')}}</a></li>
                                        <li class="breadcrumb-item active">{{__('master.CREATE-WORK-SCHEDULE')}}</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">

                            <form action="{{ isset($item) ? route('master.workingHours.update', $item->id) : route('master.workingHours.store')  }}" method="post" enctype="multipart/form-data">
                                @csrf
                                
                                @if (isset($item))
                                    @method('PUT')
                                @endif

                                <div class="card card-shadow mb-2">
                                    <div class="card-body">
                                            
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
    $('#myTabHours a').on('click', function (event) 
    {
        event.preventDefault()
        $(this).tab('show')
    })

    $('.add_line').click(function(){

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

@endsection
