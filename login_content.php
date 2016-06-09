

<?php
include 'db.php';

if(isset($_POST['login'])){
	$username = $_POST['username'];
	$password = $_POST['password'];

	$login_sql = "SELECT * FROM user_t
	              WHERE user_name = '$username'";

	if(mysqli_query($conn, $login_sql) && $username != "" && $password != ""){
	$_SESSION['user'] = $username;
	header('location: index.php');
	}
	else if(mysqli_query($conn, $login_sql) && $username == "" && $password != ""){
		echo '
		    <script type="text/javascript">
			document.write("Username is blank");
		</script>
		';
	}
	else if(mysqli_query($conn, $login_sql) && $username != "" && $password == "" ){
		echo '
		    <script type="text/javascript">
			document.write("Password is blank");
		</script>
		';
	}
	else{
		echo '
		    <script type="text/javascript">
			document.write("Username and Password are blank");
		</script>
		';
	}
}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		
	</head>
	<body>
		

		<form method="POST">
	<table>
		<tr>
			<td>Username:</td>
			<td><input type="text" id="username" name="username"></td>
			<td>
				<div id="user_tag"></div>
			</td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" id="password" name="password"></td>
			<td>
				<div id="password_tag"></div>
			</td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" id="refresh" name="refresh" value="Refresh">
			<input type="submit" id="register" name="login" value="login" onClick="blank_check();"></td>
		</tr>
	</table>
</form>	
	</body>
</html>