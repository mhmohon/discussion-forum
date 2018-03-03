@extends ('frontend.layouts.master')

@section('page_title', 'View Topic')
@section('main_content')

    <div class="container">
        <div class="row">
            <div class="col-lg-8 breadcrumbf">
                <a href="#">UOG Forum</a> <span class="diviver">&gt;</span> <a href="{{ route('home') }}">General Discussion</a> <span class="diviver">&gt;</span> <a href="#">Topic Details</a>
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

                <!-- Idea -->
                <div class="post">
                    <div class="topwrap">
                        <div class="userinfo pull-left">
                            <div class="avatar">
                                <img src="{{ asset('photos/icon/idea.png') }}" alt="" />
                            </div>
   
                        </div>
                        <div class="posttext pull-left">
                            <h2>{{ $topic->title }}</h2>
                            <p>Typography helps you engage your audience and establish a distinct, unique personality on your website. Knowing how to use fonts to build character in your design is a powerful skill, and exploring the history and use of typefaces, as well as typogra...</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>                              
                    <div class="postinfobot">

                       <div class="posted pull-left">
                           <i class="fa fa-user-o"></i> name &nbsp <i class="fa fa-clock-o"></i> 20 Nov @ 9:45am
                       </div>

                         <div class="likeblock pull-right">
                            <a href="#" class="up"><i class="fa fa-thumbs-o-up"></i>10</a>
                            <a href="#" class="down"><i class="fa fa-thumbs-o-down"></i>1</a>
                        </div>


                        <div class="clearfix"></div>
                    </div>
                </div><!-- Idea -->

                <div class="post pull-left">
                    <div class="postreply">
                            
                        <div class="pull-left"><a href="{{ route('addIdea', $topic->id) }}" class="btn btn-primary">Post a Idea</a></div>
                        <div class="clearfix"></div>
                    </div>
                </div>
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