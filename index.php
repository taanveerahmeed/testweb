<?php
	
	$uname="";
	$err_uname="";
	$pass="";
	$err_pass="";
	$has_error=false;
	if(isset($_POST['submit']))
	{	
		if(empty($_POST['uname']))
		{
			$err_uname="*Username Required";
			$has_error=true;
		}
		else
		{
			$uname=$_POST['uname'];
		}
		if(empty($_POST['pass']))
		{
			$err_pass="*Password Required";
			$has_error=true;
		}
		else
		{
			$pass=$_POST['pass'];
		}
		if(!$has_error)
		{
			$users=simplexml_load_file("Users.xml");
			foreach($users as $user)
			{
				if($user->uname == $uname && $user->password == $pass)
				{
					echo "Valid User";
					//session_start();
					
					$name=$user->name;
					//$_SESSION["loggedusername"]=$uname;
					setcookie("loggedusername",$uname,time()+120);
					
					header("Location:dashboard.php");
					
					
				}
			}
		}
	}
?>

<html>
	<head>Login</head>
	<body align="center">
		<form method="post" action="">
			<table align="center">
				<tr>
					<td>Username: </td>
					<td><input type="text" value="<?php echo $uname;?>" name="uname">
						<br><span><?php echo $err_uname;?></span></td>
				</tr>
				<tr>
					<td>Password: </td>
					<td><input type="password" value="<?php echo $pass;?>" name="pass">
					<br><span><?php echo $err_pass;?></span></td>
				</tr>
				<tr><td colspan="2" align="center"><input type="submit" value="Submit" name="submit"></td></tr>
			</table>
		</form>
	</body>
</html>