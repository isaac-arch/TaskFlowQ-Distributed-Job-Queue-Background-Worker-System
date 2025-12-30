<?php
include "config/db.php";
if(!isset($_SESSION['user'])){ header("Location: login.php"); exit; }
$user=$_SESSION['user'];
?>
<!DOCTYPE html>
<html>
<head>
<title>Dashboard - TechFlow Pro</title>
</head>
<body style="font-family:Arial; margin:0; padding:20px; background:#0f172a; color:white;">
<h2 style="text-align:center;">Welcome, <?php echo $user['fullname']; ?></h2>
<div style="text-align:center; margin:20px;">
<a href="projects/projects.php" style="padding:12px 20px; background:#22c55e; margin:5px; color:white; text-decoration:none; border-radius:6px;">Projects</a>
<a href="projects/create_project.php" style="padding:12px 20px; background:#22c55e; margin:5px; color:white; text-decoration:none; border-radius:6px;">Create Project</a>
<a href="bugs/bugs.php" style="padding:12px 20px; background:#22c55e; margin:5px; color:white; text-decoration:none; border-radius:6px;">Bugs</a>
<a href="sprints/sprints.php" style="padding:12px 20px; background:#22c55e; margin:5px; color:white; text-decoration:none; border-radius:6px;">Sprints</a>
<a href="reports.php" style="padding:12px 20px; background:#22c55e; margin:5px; color:white; text-decoration:none; border-radius:6px;">Reports</a>
<a href="logout.php" style="padding:12px 20px; background:#f43f5e; margin:5px; color:white; text-decoration:none; border-radius:6px;">Logout</a>
</div>
<p style="text-align:center;">Track your projects, tasks, and team activities here.</p>
<script>
console.log("Dashboard loaded for user: <?php echo $user['fullname']; ?>");
</script>
</body>
</html>