<?php
include "config/db.php";
if($_POST){
$p=password_hash($_POST['password'],PASSWORD_DEFAULT);
mysqli_query($conn,"INSERT INTO users (fullname,email,password,role_id)
VALUES ('$_POST[name]','$_POST[email]','$p','$_POST[role]')");
header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Register - TechFlow Pro</title>
</head>
<body style="text-align:center; font-family:Arial; padding:50px; background:#0f172a; color:white;">
<h2>Register</h2>
<form method="POST" style="display:inline-block; text-align:left;">
<input type="text" name="name" placeholder="Full Name" style="padding:10px; width:300px; margin:5px;" required><br>
<input type="email" name="email" placeholder="Email" style="padding:10px; width:300px; margin:5px;" required><br>
<input type="password" name="password" placeholder="Password" style="padding:10px; width:300px; margin:5px;" required><br>
<select name="role" style="padding:10px; width:320px; margin:5px;" required>
<option value="2">Project Manager</option>
<option value="3">Developer</option>
<option value="1">Admin</option>
</select><br>
<button style="padding:12px 25px; margin:10px; background:#22c55e; color:white; border:none; border-radius:6px;">Register</button>
</form>
<p><a href="login.php" style="color:#22c55e;">Already have an account? Login</a></p>
</body>
</html>