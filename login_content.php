

<?php
include 'db.php';

if(isset($_POST['login'])){
	$username = $_POST['username'];
	$password = $_POST['password'];

	$login_sql = "SELECT * FROM user_t
	              WHERE user_id = '$username'";

	$db_first_name_sql = "SELECT first_name FROM user_t
						  WHERE user_id = '$username'";

	$db_first_name_query = mysqli_query($conn, $db_first_name_sql);
	$db_first_name_rows = mysqli_fetch_assoc($db_first_name_query);

	$db_last_name_sql = "SELECT last_name FROM user_t
						  WHERE user_id = '$username'";

	$db_last_name_query = mysqli_query($conn, $db_last_name_sql);
	$db_last_name_rows = mysqli_fetch_assoc($db_last_name_query);

	$last_name = $db_last_name_rows['last_name'];


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
	else if(mysqli_query($conn, $login_sql) && $username == "" && $password == ""){
		echo '
		    <script type="text/javascript">
			document.write("Username and Password are blank");
		</script>
		';
	}

	else{
		$user_db_pass_sql = "SELECT password FROM user_t
							   WHERE user_id = '$username'";

		$user_db_pass_query = mysqli_query($conn, $user_db_pass_sql);
		$user_db_pass_rows = mysqli_fetch_assoc($user_db_pass_query);

		$db_pass = $user_db_pass_rows['password']; 

		if($db_pass == $password){
			$_SESSION['user'] = $username;
		}
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