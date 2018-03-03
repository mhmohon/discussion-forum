@extends ('frontend.layouts.master')

@section('page_title', 'Add Idea')

@section('extra_css')
	<link href="{{ asset('css/plugins/dropzone.css') }}" rel="stylesheet">
@endsection
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
	                {!! Form::open(['route'=>['storeIdea',$topic->id],'class'=>'form-horizontal dropzone','files' => true,'name'=>'storeIdeaForm']) !!}
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
						            
						                <div class="dz-message">
						                    <div class="col-xs-8">
						                        <div class="message">
						                            <p>Drop files here or Click to Upload</p>
						                        </div>
						                    </div>
						                </div>
						                <div class="fallback">
						                    <input type="file" name="file" multiple>
						                </div>
						            
						        </div>
						    </div>
						{{ Form::close() }}
						{{--Dropzone Preview Template--}}
					    <div id="preview" style="display: none;">

					        <div class="dz-preview dz-file-preview">
					            <div class="dz-image"><img data-dz-thumbnail /></div>

					            <div class="dz-details">
					                <div class="dz-size"><span data-dz-size></span></div>
					                <div class="dz-filename"><span data-dz-name></span></div>
					            </div>
					            <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
					            <div class="dz-error-message"><span data-dz-errormessage></span></div>



					            <div class="dz-success-mark">

					                <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
					                    <!-- Generator: Sketch 3.2.1 (9971) - http://www.bohemiancoding.com/sketch -->
					                    <title>Check</title>
					                    <desc>Created with Sketch.</desc>
					                    <defs></defs>
					                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
					                        <path d="M23.5,31.8431458 L17.5852419,25.9283877 C16.0248253,24.3679711 13.4910294,24.366835 11.9289322,25.9289322 C10.3700136,27.4878508 10.3665912,30.0234455 11.9283877,31.5852419 L20.4147581,40.0716123 C20.5133999,40.1702541 20.6159315,40.2626649 20.7218615,40.3488435 C22.2835669,41.8725651 24.794234,41.8626202 26.3461564,40.3106978 L43.3106978,23.3461564 C44.8771021,21.7797521 44.8758057,19.2483887 43.3137085,17.6862915 C41.7547899,16.1273729 39.2176035,16.1255422 37.6538436,17.6893022 L23.5,31.8431458 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" id="Oval-2" stroke-opacity="0.198794158" stroke="#747474" fill-opacity="0.816519475" fill="#FFFFFF" sketch:type="MSShapeGroup"></path>
					                    </g>
					                </svg>

					            </div>
					            <div class="dz-error-mark">

					                <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
					                    <!-- Generator: Sketch 3.2.1 (9971) - http://www.bohemiancoding.com/sketch -->
					                    <title>error</title>
					                    <desc>Created with Sketch.</desc>
					                    <defs></defs>
					                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
					                        <g id="Check-+-Oval-2" sketch:type="MSLayerGroup" stroke="#747474" stroke-opacity="0.198794158" fill="#FFFFFF" fill-opacity="0.816519475">
					                            <path d="M32.6568542,29 L38.3106978,23.3461564 C39.8771021,21.7797521 39.8758057,19.2483887 38.3137085,17.6862915 C36.7547899,16.1273729 34.2176035,16.1255422 32.6538436,17.6893022 L27,23.3431458 L21.3461564,17.6893022 C19.7823965,16.1255422 17.2452101,16.1273729 15.6862915,17.6862915 C14.1241943,19.2483887 14.1228979,21.7797521 15.6893022,23.3461564 L21.3431458,29 L15.6893022,34.6538436 C14.1228979,36.2202479 14.1241943,38.7516113 15.6862915,40.3137085 C17.2452101,41.8726271 19.7823965,41.8744578 21.3461564,40.3106978 L27,34.6568542 L32.6538436,40.3106978 C34.2176035,41.8744578 36.7547899,41.8726271 38.3137085,40.3137085 C39.8758057,38.7516113 39.8771021,36.2202479 38.3106978,34.6538436 L32.6568542,29 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" id="Oval-2" sketch:type="MSShapeGroup"></path>
					                        </g>
					                    </g>
					                </svg>
					            </div>
					        </div>
					    </div>
					    {{--End of Dropzone Preview Template--}}
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
	<script src="{{ asset('js/plugins/jquery.js') }}"></script>
    <script src="{{ asset('js/dropzone.js') }}"></script>
    <script src="{{ asset('js/dropzone-config.js') }}"></script>
@endsection