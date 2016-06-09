<!DOCTYPE html>
<html>
	<head>
		<title>Register</title>
		
	</head>
<body id="body">
		<script type="text/javascript">
			function validate(){
				var a = username.value;
				var b = email_field.value;
				var c = confirm_email_field.value;
				var d = password.value;
				var e = confirm_password.value;
				var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				var blank = "";
				var message = "";
			if(a==blank||b==blank||c==blank||d==blank||e==blank||filter.test(b) != true||filter.test(c) != true){
				if(a == blank){
					message = message + "Username is blank \n";
				}
				if(b == blank){
					message = message + "E-mail is blank \n";
				}
				if(filter.test(b) != true){
					message = message + "E-mail is invalid \n";
				}
				if(c == blank){
					amessage = message + "Confirm E-mail is blank \n";
				}
				if(filter.test(c) != true){
					message = message + "Confirm E-mail is invalid \n";
				}
				if(d == blank){
					message = message + "Password is blank \n";
				}
				if(e == blank){
					message = message + "Confirm Password is blank \n";
				}
				alert(message);
			}else{

			}
		}	
		</script>

	<form method="POST">
	<table>
		<tr>
			<td>Username:</td>
			<td><input type="text" id="username" name="username"></td>
		</tr>
		<tr>
			<td>E-mail</td>
			<td><input type="text" id="email_field" name="email"></td>
		</tr>
		<tr>
			<td>Confirm E-mail</td>
			<td><input type="text" id="confirm_email_field" name="confirm_email"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" id="password" name="password"></td>
		</tr>
		<tr>
			<td>Confirm Password</td>
			<td><input type="password" id="confirm_password" name="confirm_password"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" id="refresh" name="refresh" value="Refresh">
			<input type="submit" id="register" name="register" value="Register" onClick="validate();"></td>
		</tr>
		<tr>
			<td>
			</td>
		</tr>
	</table>
</form>	
<span id="span">

</span>
	
</body>
</html>

<?php
	include 'db.php';

	if(isset($_POST["register"])){
		$user = $_POST['username'];
		$email = $_POST['email'];
		$confirm_mail = $_POST['confirm_email'];
		$pass = $_POST['password'];
		$confirm_pass = $_POST['confirm_password'];
		
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $emailErr = "Invalid email format"; 
}

		if($mail = $confirm_mail && $pass == $confirm_pass && $user != "" &&
		$email != "" && $confirm_mail != "" && $pass != "" && $confirm_pass != ""&&
		filter_var($email, FILTER_VALIDATE_EMAIL) && filter_var($confirm_mail, FILTER_VALIDATE_EMAIL)){
			$register_sql = "INSERT INTO user_t
		                     VALUES('','$user','$pass','$email',true)";

		    if(mysqli_query($conn, $register_sql)){
		    	echo 'success';
		    }else{
		    	echo 'failed';
		    }

		}
	}
?>