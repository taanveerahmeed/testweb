<?php
	//session_start();
	if(!isset($_COOKIE["loggedusername"]))
	{
		header("Location:index.php");
	}
	
?>
<html>
	<body>
		<h1>Welcome <?php echo $_COOKIE["loggedusername"];?></h1>
		
	</body>
</html>