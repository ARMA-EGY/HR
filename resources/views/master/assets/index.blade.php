@extends('layouts.master')

@section('sidebar')
    @include('layouts.sidebar.master')
@endsection

@section('style')
<link href="{{asset('assets/css/dataTables.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
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
                                <h4 class="mb-sm-0 font-size-18">{{__('master.ALL-ASSETS')}}</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">{{__('master.ASSETS')}}</a></li>
                                        <li class="breadcrumb-item active">{{__('master.ALL-ASSETS')}}</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row mb-2">
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-end">
                                <a href="{{route('master.assets.create')}}" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i class="mdi mdi-plus me-1"></i> Create New Asset</a>
                            </div>
                        </div><!-- end col-->
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
            
                                    <div class="table-responsive">
                                        <table class="table align-middle table-nowrap table-check" id="example">
                                            <thead class="table-light">
                                                <tr>
                                                    <th class="align-middle">#</th>
                                                    <th class="align-middle">Serial No.</th>
                                                    <th class="align-middle">Asset Name</th>
                                                    <th class="align-middle">Category</th>
                                                    <th class="align-middle">Vendor</th>
                                                    <th class="align-middle">Used By</th>
                                                    <th class="align-middle">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($items as $item)
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$item->serial_number}}</td>
                                                        <td><a href="#" class="text-body fw-bold">{{$item->name}}</a> </td>
                                                        <td>{{ !empty($item->category) ? $item->category->name:'-' }}</td>
                                                        <td>{{ !empty($item->vendor) ? $item->vendor->name:'-' }}</td>
                                                        <td>{{ !empty($item->employee) ? $item->employee->name:'-' }}</td>
                                                        <td>
                                                            <div class="d-flex gap-3">
                                                                <a data-toggle="tooltip" data-placement="top" title="{{__('master.VIEW-DETAILS')}}" href="{{route('master.assets.show', $item->id)}}" class="btn-primary py-1 px-2 btn-rounded"><i class="mdi mdi-eye font-size-18"></i></a>
                                                                <a data-toggle="tooltip" data-placement="top" title="{{__('master.EDIT')}}" href="{{route('master.assets.edit', $item->id)}}" class="btn-success py-1 px-2 btn-rounded"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th class="align-middle p-2 search_number filter"></th>
                                                    <th class="align-middle filter">Serial No.</th>
                                                    <th class="align-middle filter">Asset Name</th>
                                                    <th class="align-middle filter">Category</th>
                                                    <th class="align-middle filter">Vendor</th>
                                                    <th class="align-middle filter">Used By</th>
                                                    <th class="align-middle filter-hidden"></th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>

                                </div>
                            </div>
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

   $(document).ready(function() 
   {
       // Setup - add a text input to each footer cell
       $('#example tfoot th').each( function () {
              var title = $(this).text();
              $(this).html( '<input type="text" placeholder=" '+title+'" />' );
          } );
      
          // DataTable
          var table = $('#example').DataTable({
              initComplete: function () {
                  // Apply the search
                  this.api().columns().every( function () {
                      var that = this;
      
                      $( 'input', this.footer() ).on( 'keyup change clear', function () {
                          if ( that.search() !== this.value ) {
                              that
                                  .search( this.value )
                                  .draw();
                          }
                      } );
                  } );
              },
              "pagingType": "numbers",
             dom: 'Blfrtip',
          });
    
    });
    
</script>
@endsection
