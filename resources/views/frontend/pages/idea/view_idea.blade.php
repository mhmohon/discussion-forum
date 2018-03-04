@extends ('frontend.layouts.master')

@section('page_title', 'View Idea')
@section('main_content')

    <div class="container">
        <div class="row">
            <div class="col-lg-8 breadcrumbf">
                <a href="{{ route('home') }}">UOG Forum</a> <span class="diviver">&gt;</span> <a href="{{ URL::previous() }}">Topic discussion</a> <span class="diviver">&gt;</span> <a>Idea Details</a>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">

                <!-- POST -->
                <div class="post beforepagination">
                    <div class="topwrap">
                        <div class="userinfo pull-left">
                            <div class="avatar">
                                <img src="{{ asset('photos/icon/idea.png') }}" alt="" />
                            </div>
   
                        </div>
                        <div class="posttext idea-text pull-left">
                            <h2>{{ $idea->title }}
                                @if(\Auth::user()->id == $idea->user_id)
                                    <span class="pull-right">
                                        <a href="{{ route('EditIdea', [$idea->topic_id, $idea->id]) }}" class="btn btn-danger">Edit</a>
                                    </span>
                                @endif
                            </h2>
                            <p>{!! $idea->description !!}</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>                              
                    <div class="postinfobot">

                        <div class="posted pull-left">
                            <i class="fa fa-user-o"></i> {{ $idea->name }} &nbsp <i class="fa fa-clock-o"></i>  Posted on : {{ \Carbon\Carbon::parse($idea->start_date)->format('d M Y') }}</div>
                        
                        
                        <div class="next pull-right">                                        
                            <a href="#"><i class="fa fa-share"></i></a>

                        </div>
                      

                        <div class="clearfix"></div>
                    </div>
                </div><!-- POST -->
                

                <div class="paginationf">
                    <div class="pull-left"><a href="#" class="prevnext"><i class="fa fa fa-comments"></i></a></div>
                    <div class="pull-left">
                       
                    </div>
                    
                    <div class="clearfix"></div>
                </div>
                
                @foreach($comments as $comment) 
                <!-- Idea -->
                <div class="post">
                    <div class="topwrap">
                        <div class="comment-logo userinfo pull-left">
                            <div class="avatar">
                                <img src="{{ asset('photos/icon/comment.png') }}" alt="" />
                            </div>
   
                        </div>
                        <div class="posttext idea-text pull-left">
                            <p>
                                {{ $comment->description }}
                                @if(\Auth::user()->id == $comment->user_id)
                                    <span class="pull-right">
                                        <a href=""><strong>Edit</strong></a>
                                    </span>
                                @endif
                            </h2>
                            <p>
                        </div>

                        <div class="clearfix"></div>
                   
                    </div>                              
                    <div class="postinfobot">
                        <!-- comment author -->
                       <div class="posted pull-left">
                           <i class="fa fa-user-o"></i> {{ ucfirst($comment->name) }} &nbsp <i class="fa fa-clock-o"></i> {{ $comment->created_at->diffForHumans() }}
                       </div>
                        <!-- comment author -->

                        <div class="clearfix"></div>
                    </div>

                    
                </div><!-- Idea -->

                @endforeach
                
                <!-- POST Idea -->
                <div class="post">
                    {!! Form::open(['route'=>['addComment',$idea->id],'class'=>'form-horizontal m-b-30','files' => true,'name'=>'storeCommentForm']) !!}
                        <div class="topwrap">
                            <div class="userinfo pull-left">
                                

                                <div class="icons-idea">
                                    <div class="postreply">Post a Comment</div>
                                </div>
                            </div>
                            <div class="posttext idea-text pull-left">
                                
                                <div class="form-group {{ $errors->has('comment_detail') ? ' has-error' : '' }}">
                                    <div class="form-line">
                                        <textarea id="editor" name="comment_detail" class="form-control" placeholder="Type Your comment" 
                                        value="{{ old('comment_detail') }}" data-validation="length" data-validation-length="3-255" 
                                        data-validation-error-msg="Comment has to be an alphanumeric value (3-255 chars)"></textarea>
                                        @if ($errors->has('comment_detail'))
                                            <span class="text-danger help-block">
                                                <block>{{ $errors->first('comment_detail') }}</block>
                                            </span>
                                        @endif  
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('comment_detail') ? ' has-error' : '' }}">
                                    <div class="form-line">
                                        <label for="postas" class="form-lbl">Post As: </label>
                                        <div class="radio-inline">
                                          <label><input type="radio" checked name="postas" value="realuser">Real user</label>
                                        </div>
                                        <div class="radio-inline">
                                          <label><input type="radio" name="postas" value="anynomous">Anynomous</label>
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
                                
                                <div class="pull-left"><a href="{{ URL::previous() }}" class="btn btn-info">Back</a> &nbsp <button type="submit" class="btn btn-primary">Add Comment</button></div>
                                
                                <div class="clearfix"></div>
                            </div>


                            <div class="clearfix"></div>
                        </div>
                    {{ Form::close() }}
                </div><!-- POST Idea-->
                
            </div>
           
            <!-- Left Sidebar -->
            @include ('frontend.layouts.right_sidebar')
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-xs-12">
                
                <div class="pull-left">
                    
                </div>
                
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
                "advlist autolink link image lists charmap preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "save table contextmenu directionality emoticons template paste textcolor"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image code | preview media fullpage | forecolor backcolor emoticons",
            content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tinymce.com/css/codepen.min.css'],

            setup: function (editor) {
            editor.addButton('mybutton', {
              text: 'My button',
              icon: false,
              onclick: function () {
                editor.insertContent('&nbsp;<b>It\'s my button!</b>&nbsp;');
              }
            });
        }
  

            // enable title field in the Image dialog
            image_title: true, 
            // enable automatic uploads of images represented by blob or data URIs
            automatic_uploads: false,
            // URL of our upload handler (for more details check: https://www.tinymce.com/docs/configure/file-image-upload/#images_upload_url)
            //images_upload_url: 'postAcceptor.php',
            // here we add custom filepicker only to Image dialog
            file_picker_types: 'image', 
            // and here's our custom image picker
            file_picker_callback: function(cb, value, meta) {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('name', 'image');
            input.setAttribute('accept', 'image/*');
            
            // Note: In modern browsers input[type="file"] is functional without 
            // even adding it to the DOM, but that might not be the case in some older
            // or quirky browsers like IE, so you might want to add it to the DOM
            // just in case, and visually hide it. And do not forget do remove it
            // once you do not need it anymore.

            input.onchange = function() {
              var file = this.files[0];
              
              var reader = new FileReader();
              reader.onload = function () {
                // Note: Now we need to register the blob in TinyMCEs image blob
                // registry. In the next release this part hopefully won't be
                // necessary, as we are looking to handle it internally.
                var id = 'blobid' + (new Date()).getTime();
                var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                var base64 = reader.result.split(',')[1];
                var blobInfo = blobCache.create(id, file, base64);
                blobCache.add(blobInfo);

                // call the callback and populate the Title field with the file name
                cb(blobInfo.blobUri(), { title: file.name });
              };
              reader.readAsDataURL(file);
            };
            
            input.click();
          }

          
        });

        
    </script>
@endsection