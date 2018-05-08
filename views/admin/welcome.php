<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome</title>
</head>
<body>
	<?php 
		echo print_r($_SESSION);
		if (isset($_SESSION['id']) AND isset($_SESSION['email']))
		{
		    echo 'Bonjour ' . $_SESSION['email'];
		}
	?>
</body>
</html>