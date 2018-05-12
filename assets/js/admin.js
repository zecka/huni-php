$(document).ready( function() {
	$('form').validate({ 
		//instruction here
		rules: {
			password: "required",
			password_again: {
				equalTo: "#password"
			}
		}
	});	
});
