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
                                <h4 class="mb-sm-0 font-size-18">{{__('master.CREATE-DOCUMENT')}}</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">{{__('master.DOCUMENTS')}}</a></li>
                                        <li class="breadcrumb-item active">{{__('master.CREATE-DOCUMENT')}}</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">

                            <form action="{{ isset($item) ? route('master.document.update', $item->id) : route('master.document.store')  }}" method="post" enctype="multipart/form-data">
                                @csrf
                                
                                @if (isset($item))
                                    @method('PUT')
                                @endif

                                <div class="card card-shadow mb-2">
                                    <div class="card-body">
                                            
                                        <div class="row">
                                            <div class="col-sm-8 col-10">
                                                <div class="mb-4">
                                                    <input id="name" name="name" type="text" placeholder="Name" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col-2">
                                                <div class="mb-4">
                                                    <input id="file" name="file" type="file" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">

                                            <div class="col-md-6">

                                                <div class="row">
                                                    <label for="owner_id" class="col-md-4 col-form-label pb-2 pt-1">Owner</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control form-control-sm select2" name="owner_id" id="owner_id">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                        </select>
                                                    </div>
                                                </div>
    
                                                <div class="row">
                                                    <label for="department_id" class="col-md-4 col-form-label pb-2 pt-1">Department</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control form-control-sm select2" name="department_id" id="department_id">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                            </div>

                                            <div class="col-md-6">

                                                <div class="row">
                                                    <label for="workspace_id" class="col-md-4 col-form-label pb-2 pt-1">Workspace</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control form-control-sm select2" name="workspace_id" id="workspace_id">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label for="expire_date" class="col-md-4 col-form-label pb-2 pt-1">Expire Date</label>
                                                    <div class="col-md-8">
                                                        <input class="form-control form-control-sm" type="date" name="expire_date" id="expire_date">
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
@endsection
