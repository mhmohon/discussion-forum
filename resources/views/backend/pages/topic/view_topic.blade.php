@extends ('backend.layouts.master')

@section('page_title',$title)

@section('extra_css')
    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="{{ asset('css/backend/plugins/bootstrap-datatable/dataTables.bootstrap.css') }}" rel="stylesheet" />
@endsection
@section('main_content')

<div class="block-header">
    <h2>{{ $title }}</h2>
</div>


<!-- Basic Examples -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Topic List
                    </h2>
                    
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Title</th>
                                    <th>Start Date</th>
                                    <th>Closure Date</th>
                                    <th>Final date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                @foreach ($topics as $key => $topic)
                                <tr>
                                    <td>{{ ($key+1) }}</td>
                                    <td>{{ $topic->title }}</td>
                                    <td>{{ \Carbon\Carbon::parse($topic->start_date)->format('d M Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($topic->closure_date)->format('d M Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($topic->final_date)->format('d M Y') }}</td>
                                    @if( $topic->status == 0)
                                        <td class="text-center">
                                            <span class="label label-warning"> Unpublished</span>
                                        </td>
                                    @elseif($topic->status == 1)
                                        <td class="text-center">
                                            <span class="label label-success"> Published</span>
                                        </td>
                                    
                                    @else
                                        <td class="text-center">
                                            <span class="label label-danger"> Closed</span>
                                        </td>
                                    @endif
                                    <td>
                                            
                                        <a href="" class="btn btn-sm btn-warning"><i class="material-icons">mode_edit</i></a>
                                        <a href="" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this?')"><i class="material-icons">delete_forever</i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Basic Examples -->

@endsection

@section('extra_js')

    <!-- Bootstrap Core Js -->
    <script src="{{ asset('js/backend/plugins/bootstrap-datatable/jquery.dataTables.js') }} "></script>
    <script src="{{ asset('js/backend/plugins/bootstrap-datatable/dataTables.bootstrap.js') }} "></script>
    <script src="{{ asset('js/backend/plugins/bootstrap-datatable/jquery-datatable.js') }} "></script>
	
@endsection