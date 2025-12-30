<?php
include "config/db.php";
if($_POST){
$q=mysqli_query($conn,"SELECT * FROM users WHERE email='$_POST[email]'");
$u=mysqli_fetch_assoc($q);
if($u && password_verify($_POST['password'],$u['password'])){
$_SESSION['user']=$u;
header("Location: dashboard.php");
exit;
}else{
$error="Invalid login";
}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login - TechFlow Pro</title>
</head>
<body style="text-align:center; font-family:Arial; padding:50px; background:#0f172a; color:white;">
<h2>Login</h2>
<?php if(isset($error)){ echo "<p style='color:red;'>$error</p>"; } ?>
<form method="POST" style="display:inline-block; text-align:left;">
<input type="email" name="email" placeholder="Email" style="padding:10px; width:300px; margin:5px;" required><br>
<input type="password" name="password" placeholder="Password" style="padding:10px; width:300px; margin:5px;" required><br>
<button style="padding:12px 25px; margin:10px; background:#22c55e; color:white; border:none; border-radius:6px;">Login</button>
</form>
<p><a href="register.php" style="color:#22c55e;">Don't have an account? Register</a></p>
</body>
</html>