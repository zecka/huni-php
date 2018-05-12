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
		var username=$(this).data('username');
		var link=$(this).data('link');
		$('#modal_delete').find('.modal_username').html(username);
		$('#modal_delete #valid_delete').attr("href", link);
	});
});
