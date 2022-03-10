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
                                <h4 class="mb-sm-0 font-size-18">{{__('master.CREATE-WORKSPACE')}}</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">{{__('master.WORKSPACES')}}</a></li>
                                        <li class="breadcrumb-item active">{{__('master.CREATE-WORKSPACE')}}</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">

                            <form action="{{ isset($item) ? route('master.workspace.update', $item->id) : route('master.workspace.store')  }}" method="post" enctype="multipart/form-data">
                                @csrf
                                
                                @if (isset($item))
                                    @method('PUT')
                                @endif

                                <div class="card card-shadow mb-2">
                                    <div class="card-body">

                                        <div class="row mb-4">

                                            <div class="col-md-6">

                                                <div class="row">
                                                    <label for="name" class="col-md-3 col-form-label pb-2 pt-1">Name</label>
                                                    <div class="col-md-9">
                                                        <input id="name" name="name" type="text" placeholder="Workspace Name" class="form-control form-control-sm">
                                                    </div>
                                                </div>
                                                
                                            </div>

                                            <div class="col-md-6">
    
                                                <div class="row">
                                                    <label for="workspace_id" class="col-md-4 col-form-label pb-2 pt-1">Parent Workspace</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control form-control-sm select2" name="workspace_id" id="workspace_id">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                            </div>

                                        </div>
        
                                        <div class="row">
                                            <label for="description" class="col-md-4 col-form-label pb-2 pt-1">Description</label>
                                            <div class="col-md-12">
                                                <textarea class="form-control" id="description" name="description" rows="5"></textarea>
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
@endsection
