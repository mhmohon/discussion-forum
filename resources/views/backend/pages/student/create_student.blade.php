@extends ('backend.layouts.master')

@section('main_content')

<div class="block-header">
    <h2>FORM EXAMPLES</h2>
</div>


<!-- Horizontal Layout -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Add New Student
                </h2>
                
            </div>
            <div class="body">
            	{!! Form::open(['route'=>'studnetStore','class'=>'form-horizontal','files' => true]) !!}
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="name">First Name</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="name" class="form-control" placeholder="name">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="Last name">Last Name</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="name" class="form-control" placeholder="name">
                                </div>
                            </div>
                        </div>
                    </div>
					
					<div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="email">Email</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="email" id="email" class="form-control" placeholder="@gmail.com">
                                </div>
                            </div>
                        </div>
                    </div>
					
					
					<div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="Phone Number">Phone Number</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="Number" id="Phone Number" class="form-control" placeholder="Phone Number">
                                </div>
                            </div>
                        </div>
                    </div>
					
					<div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="Address">Address</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="address" class="form-control" placeholder="Address">
                                </div>
                            </div>
                        </div>
                    </div>
					
					<div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="Department Name">Department Name</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            
                            <select class="form-control show-tick" data-live-search="true">
                                    <option value="0">Hot Dog, Fries and a Soda</option>
                                    <option>Burger, Shake and a Smile</option>
                                    <option>Sugar, Spice and all things nice</option>
                                </select>
                            
                        </div>
                    </div>
					
				
					
                    
                    <div class="row clearfix">
                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                            <button type="button" class="btn btn-primary m-t-15 waves-effect">Submit</button>
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
<!-- #END# Horizontal Layout -->

@endsection

@section('extra_js')

	<script>
		
	</script>
	
@endsection