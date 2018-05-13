$(document).ready( function() {
	$('form').validate({ 
		//instruction here
		rules: {
			password_again: {
				equalTo: "#password"
			}
		}
	});
	
	$('.btn-delete').on('click', function(){
		var username=$(this).data('title');
		var link=$(this).data('link');
		$('#modal_delete').find('.modal_element_title').html(username);
		$('#modal_delete #valid_delete').attr("href", link);
	});
	
	
	$('.fileinput').fileinput()
	
	tinymce.init({
		selector: 'textarea.tinymce',  // change this value according to your HTML
		plugins: [
			"advlist autolink lists link image charmap print preview anchor",
			"searchreplace visualblocks code fullscreen",
			"insertdatetime media table contextmenu paste imagetools wordcount"
		],
		toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
		content_css: [
		    '//fonts.googleapis.com/css?family=Roboto:300,400,500,700',
			'//www.tinymce.com/css/codepen.min.css'
		]
  	});

});
