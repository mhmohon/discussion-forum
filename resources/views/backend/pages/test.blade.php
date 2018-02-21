@extends ('backend.layouts.master')

@section('main_content')


	<!-- TinyMCE -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                TINYMCE
                                <small>Taken from <a href="https://www.tinymce.com" target="_blank">www.tinymce.com</a></small>
                            </h2>
                            
                        </div>
                        <div class="body">
                            <textarea id="editor">
                                <h2>WYSIWYG Editor</h2>
                                
                            </textarea>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# TinyMCE -->
@endsection

@section('extra_js')

	<script src="{{ asset('js/plugins/tinymce/tinymce.min.js') }}"></script>
  	<script>
  		tinymce.init({
		  	selector: '#editor',
		  	width: "100%",
			height: 300,

			/* display statusbar */
			statubar: true,
		  	plugins: [
				"advlist autolink link image lists charmap print preview hr anchor pagebreak",
				"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
				"save table contextmenu directionality emoticons template paste textcolor"
			],
		  	toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image code | print preview media fullpage | forecolor backcolor emoticons",

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