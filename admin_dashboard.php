<?php
include "config/db.php";
if(!isset($_SESSION['user']) || $_SESSION['user']['role_id'] != 1){
    header("Location: login.php"); exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Admin Dashboard</title></head>
<body style="font-family:Arial; background:#0f172a; color:white; padding:20px;">
<h2>Admin Dashboard</h2>
<div style="margin-bottom:20px;">
<a href="manage_users.php" style="padding:10px 20px; background:#22c55e; margin:5px; text-decoration:none; color:white;">Manage Users</a>
<a href="reports.php" style="padding:10px 20px; background:#22c55e; margin:5px; text-decoration:none; color:white;">Activity Reports</a>
<a href="dashboard.php" style="padding:10px 20px; background:#f43f5e; margin:5px; text-decoration:none; color:white;">Logout</a>
</div>
<p>Overview of all projects, tasks, and users.</p>
</body>
</html>