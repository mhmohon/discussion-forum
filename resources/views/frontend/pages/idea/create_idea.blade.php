@extends ('frontend.layouts.master')

@section('page_title', 'Add Idea')
@section('main_content')

	<div class="container">
        <div class="row">
            <div class="col-lg-8 breadcrumbf">
                <a href="{{ route('home') }}">UOG Forum</a> <span class="diviver">&gt;</span> <a href="{{ route('home') }}">Topic Details</a> <span class="diviver">&gt;</span> <a href="#">Add Idea</a>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">

                <!-- POST -->
                <div class="post beforepagination beforidea">
                    <div class="topwrap">
                        <div class="userinfo pull-left">
                            <div class="avatar">
                                <img src="{{ asset('photos/icon/topic.png') }}" alt="" />
                            </div>
   
                        </div>
                        <div class="posttext pull-left">
                            <h2>{{ $topic->title }}</h2>
                            <p>{{ $topic->description }}</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>                              
                    <div class="postinfobot">

                        <div class="posted pull-left"><i class="fa fa-clock-o"></i>  Posted {{ \Carbon\Carbon::parse($topic->start_date)->diffForHumans() }}</div>


                        <div class="clearfix"></div>
                    </div>
                </div><!-- POST -->
				
				 <!-- POST Idea -->
	            <div class="post">
	                {!! Form::open(['route'=>['storeIdea',$topic->id],'class'=>'form-horizontal m-b-30','files' => true,'name'=>'storeIdeaForm']) !!}
	                    <div class="topwrap">
	                        <div class="userinfo pull-left">
	                            

	                            <div class="icons-idea">
	                                <div class="postreply">Post a Idea</div>
	                            </div>
	                        </div>
	                        <div class="posttext pull-left">
	                            
	                            <div class="form-group {{ $errors->has('idea_title') ? ' has-error' : '' }}">
	                                <div class="form-line">
	                                    <input type="text" id="idea_title" name="idea_title" class="form-control" placeholder="Type Idea title" 
	                                    value="{{ old('idea_title') }}" data-validation="length" data-validation-length="3-255" 
	                                    data-validation-error-msg="Topic name has to be an alphanumeric value (3-255 chars)">
	                                    @if ($errors->has('idea_title'))
	                                        <span class="text-danger help-block">
	                                            <block>{{ $errors->first('idea_title') }}</block>
	                                        </span>
	                                    @endif  
	                                </div>
	                            </div>
	                            <div class="form-group {{ $errors->has('idea_detail') ? ' has-error' : '' }}">
	                                <div class="form-line">
	                                    <textarea id="editor" name="idea_detail" class="form-control" placeholder="Type Idea Details" 
	                                    value="{{ old('idea_detail') }}" data-validation="length" data-validation-length="3-255" 
	                                    data-validation-error-msg="Topic name has to be an alphanumeric value (3-255 chars)"></textarea>
	                                    @if ($errors->has('idea_detail'))
	                                        <span class="text-danger help-block">
	                                            <block>{{ $errors->first('idea_detail') }}</block>
	                                        </span>
	                                    @endif  
	                                </div>
	                            </div>
	                            <!-- upload image -->
	                            <div class="row">
						        <div class="col-sm-10 offset-sm-1">
						            <h2 class="page-heading">Upload your Images <span id="counter"></span></h2>
						            <form method="post" action="{{ url('/images-save') }}"
						                  enctype="multipart/form-data" class="dropzone" id="my-dropzone">
						                {{ csrf_field() }}
						                <div class="dz-message">
						                    <div class="col-xs-8">
						                        <div class="message">
						                            <p>Drop files here or Click to Upload</p>
						                        </div>
						                    </div>
						                </div>
						                <div class="fallback">
						                    <input type="file" name="file" value="" multiple>
						                </div>
						            </form>
						        </div>
						    </div>
     <!-- end upload image -->
	                       <div class="form-group {{ $errors->has('idea_detail') ? ' has-error' : '' }}">
	                                <div class="form-line">
	                                    <label for="postas" class="form-lbl">Post As: </label>
	                                    <div class="radio-inline">
	                                      <label><input type="radio" value="realuser" checked name="postas">Real user</label>
	                                    </div>
	                                    <div class="radio-inline">
	                                      <label><input type="radio" value="anynomous" name="postas">Anynomous</label>
	                                    </div>  
	                                </div>
	                            </div>
	                            
	                        </div>

	                        <div class="clearfix"></div>
	                    </div>                              
	                    <div class="postinfobot">

	                        <div class="pull-left">
	                            <input type="checkbox" name="agree" data-validation="required" data-validation-error-msg="You have to agree to our terms" id="note" >
	                            <label for="note" class="form-lbl"> I agree to the <a href="">Terms and Conditions</a></label>
	                        </div>

	                        <div class="pull-right postreply">
	                            
	                            <div class="pull-left"><button type="submit" class="btn btn-primary">Post Idea</button></div>
	                            <div class="clearfix"></div>
	                        </div>


	                        <div class="clearfix"></div>
	                    </div>
	                {{ Form::close() }}
	            </div><!-- POST Idea-->
         
            </div>
           
            
        </div>
    </div>
           
@endsection

@section('extra_js')

    <script src="{{ asset('js/plugins/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector: '#editor',
            width: "100%",
            height: 200,

            /* display statusbar */
            menubar:false,
            statusbar: false,
            plugins: [
                "advlist autolink link lists charmap preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "save table contextmenu directionality emoticons template paste textcolor"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link code | preview media fullpage | forecolor backcolor emoticons",
            
        });

        
    </script>
@endsection