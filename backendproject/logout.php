<html>
	<head>
	</head>
	<body>
	<?php
		session_start();
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			session_destroy();
			header("Location: index.php");
		}
	?>
	
	</body>
</html>