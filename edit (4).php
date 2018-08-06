<?php
	session_start();
	$user = $_SESSION['user'];
	if (!isset($user))
		header("Location:admin_login.php");

?>
<!DOCTYPE html>
<!-- 

-->
<html>
<head>
<title>LadyKickboxing</title>
<link href="style1.css" rel="stylesheet" type="text/css" />
<link href="icon.png" rel="shortcut icon" type="image.png">

</head>

<body>
<?php include('includes/header.inc'); ?>

<?php include('includes/nav.inc'); ?>

<div id="wrapper">


	<?php include('includes/aside.inc'); ?>

	<section>
		<h2>Your Ladykickboxing Profile</h2>
		<?php
			if (isset($_POST['btnSubmit']))
			{
				include("includes/dbc_admin.php");
				
				$email = $_POST['email'];
				$username = $_POST['username'];
				$oldEmail = $_SESSION['user'];
				$message = $_POST['message'];
				
				$sql = "update sgillen7_registration.users set email='$email', username='$username', message='$message' where email='$oldEmail'";
					 
				$result = mysqli_query($con, $sql);
				
				if ($result != 0)
				    $msg = "<h2>Your content was successfully updated.</h2>";
				$_SESSION['user'] = $email;
			}
			


			if (isset($msg))
				echo $msg; 
		?>
		<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
			<?php
				$email = $_SESSION['user'];
				
				@include("includes/dbc_admin.php");
				$sql = "select * from sgillen7_registration.users where email='$email'";
				$result = mysqli_query($con,$sql);

				while ($row = mysqli_fetch_assoc($result))
				{
					echo 'Current Email:<input type="text" name="email" value="' . $row['email'] . '">';
					echo 'Username:<input type="text" name="username" value="' . $row['username'] . '">';
					echo '<br /><br />';
					echo 'Your Tracking Diary:<p><textarea name="message" rows="20" cols="75">' . $row['message']
					     . '</textarea></p>';
				}
			?>
			<p><input type="submit" name="btnSubmit" value="Update"></p>
		</form>
	</section>

</div>

<?php include('includes/footer.inc'); ?>

</body>
</html>
