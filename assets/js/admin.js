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
});
