<?php
include "../config/db.php";
if(!isset($_SESSION['user'])){ header("Location: ../login.php"); exit; }

if($_POST){
mysqli_query($conn,"INSERT INTO projects (name,description,created_by)
VALUES ('$_POST[name]','$_POST[desc]',".$_SESSION['user']['id'].")");
header("Location: projects.php");
}
?>
<!DOCTYPE html>
<html>
<head><title>Create Project</title></head>
<body style="font-family:Arial; background:#0f172a; color:white; text-align:center; padding:50px;">
<h2>Create New Project</h2>
<form method="POST" style="display:inline-block; text-align:left;">
<input name="name" placeholder="Project Name" style="padding:10px; width:300px; margin:5px;" required><br>
<textarea name="desc" placeholder="Project Description" style="padding:10px; width:300px; height:100px; margin:5px;" required></textarea><br>
<button style="padding:12px 25px; margin:10px; background:#22c55e; color:white; border:none; border-radius:6px;">Create Project</button>
</form>
<a href="../dashboard.php" style="display:block; margin-top:20px; color:#22c55e;">Back to Dashboard</a>
</body>
</html>