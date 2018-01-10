<?php
session_start();
if (isset($_POST['btnSubmit']))
{
	$email = trim($_POST['txtEmail']);
	$pwd = md5(trim($_POST['txtPassword']));
	
	@include("includes/dbc.php");
	$sql = "select * from sgillen7_registration.users where email = '$email' and password = '$pwd';";
	$result = mysql_query($sql, $con);
	if (mysql_num_rows($result) == 0)
		$msg = "<h2 style='color:red;'>Incorrect email address or password.</h2>";
	else
	{
		$_SESSION['user'] = $email;
		$msg = "<h2>Login successful! Please select <i>Manage Account.</i></h2>";
	}
}
?>

<!DOCTYPE html>
<!--
	mhensonf_wrt  password410
	mhensonf_rdo  password410
--> 
<html>
<head>
<title>Ladykickboxing</title>
<link href="style1.css" rel="stylesheet" type="text/css" />

<link href="icon.png" rel="shortcut icon" type="image.png">
</head>

<body>
<?php include('includes/header.inc'); ?>

<?php include('includes/nav.inc'); ?>

<div id="wrapper">


	<?php include('includes/aside.inc'); ?>

	<section>
		<h2>Login</h2>
		<?php
			if (isset($msg)) 
				echo $msg . "<br />";
		?>
		<form method="post" name="frmLogin"
		      action="<?php $_SERVER['PHP_SELF']; ?>">
		  <p>Email address: <br /> <input type="text" name="txtEmail"></p>
          <p>Password: <br /> <input type="password" name="txtPassword"></p>
		  <p><input type="submit" name="btnSubmit" value="Login"></p>
		</form>
	</section>

</div>

<?php include('includes/footer.inc'); ?>

</body>
</html>
