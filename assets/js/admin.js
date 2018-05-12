$(document).ready( function() {
	$('form').validate({ 
		//instruction here
		rules: {
			password_again: {
				equalTo: "#password"
			}
		}
	});	
});
