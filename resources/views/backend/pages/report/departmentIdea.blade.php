@extends ('backend.layouts.master')

@section('page_title','Dashboard | Reports')

@section('extra_css')
    <!-- For Reports -->
    {!! Charts::styles() !!}
@endsection

@section('main_content')

    <!-- Reports -->
    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="header">
                    <div class="row clearfix">
                        <div class="col-xs-12 col-sm-6">
                            <h2>Total Idea Post</h2>
                        </div>
                        
                    </div>
                    
                </div>
                <div class="body">
                    
                        {!! $chart->html() !!}
                    
                </div>
            </div>
        </div>
    </div>
    <!-- #END# CPU Usage -->
   

@endsection

@section('extra_js')

    <!-- For Reports -->
    {!! Charts::scripts() !!}
    {!! $chart->script() !!}
    
@endsection