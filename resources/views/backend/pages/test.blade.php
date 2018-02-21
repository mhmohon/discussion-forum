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
                            <textarea class="tinymc">
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
  			selector:'textarea.tinymc',
	  		/* theme of the editor */
			theme: "modern",
			skin: "lightgray",

			/* width and height of the editor */
			width: "100%",
			height: 300,

			/* display statusbar */
			statubar: true,
			
			/* plugin */
			plugins: [
				"advlist autolink link image lists charmap print preview hr anchor pagebreak",
				"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
				"save table contextmenu directionality emoticons template paste textcolor"
			],

			/* toolbar */
			toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
			/* style */
			style_formats: [
				{title: "Headers", items: [
					{title: "Header 1", format: "h1"},
					{title: "Header 2", format: "h2"},
					{title: "Header 3", format: "h3"},
					{title: "Header 4", format: "h4"},
					{title: "Header 5", format: "h5"},
					{title: "Header 6", format: "h6"}
				]},
				{title: "Inline", items: [
					{title: "Bold", icon: "bold", format: "bold"},
					{title: "Italic", icon: "italic", format: "italic"},
					{title: "Underline", icon: "underline", format: "underline"},
					{title: "Strikethrough", icon: "strikethrough", format: "strikethrough"},
					{title: "Superscript", icon: "superscript", format: "superscript"},
					{title: "Subscript", icon: "subscript", format: "subscript"},
					{title: "Code", icon: "code", format: "code"}
				]},
				{title: "Blocks", items: [
					{title: "Paragraph", format: "p"},
					{title: "Blockquote", format: "blockquote"},
					{title: "Div", format: "div"},
					{title: "Pre", format: "pre"}
				]},
				{title: "Alignment", items: [
					{title: "Left", icon: "alignleft", format: "alignleft"},
					{title: "Center", icon: "aligncenter", format: "aligncenter"},
					{title: "Right", icon: "alignright", format: "alignright"},
					{title: "Justify", icon: "alignjustify", format: "alignjustify"}
				]}
			]


  		});

	  	
  	</script>
@endsection