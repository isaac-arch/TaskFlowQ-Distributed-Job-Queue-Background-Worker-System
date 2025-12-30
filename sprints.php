<?php
include "../config/db.php";
if(!isset($_SESSION['user'])){ header("Location: ../login.php"); exit; }
if($_POST){
mysqli_query($conn,"INSERT INTO sprints (project_id,name,start_date,end_date)
VALUES ('$_POST[project]','$_POST[name]','$_POST[start]','$_POST[end]')");
}
$q=mysqli_query($conn,"SELECT * FROM sprints");
?>
<!DOCTYPE html>
<html>
<head><title>Sprints</title></head>
<body style="font-family:Arial; background:#0f172a; color:white; padding:20px;">
<h2>Sprints</h2>
<form method="POST" style="margin-bottom:20px;">
<input name="project" placeholder="Project ID" required style="padding:10px; margin:5px;">
<input name="name" placeholder="Sprint Name" required style="padding:10px; margin:5px;">
<input type="date" name="start" required style="padding:10px; margin:5px;">
<input type="date" name="end" required style="padding:10px; margin:5px;">
<button style="padding:10px 20px; background:#22c55e; color:white; border:none;">Create Sprint</button>
</form>
<?php while($s=mysqli_fetch_assoc($q)){
echo "<div style='border:1px solid #ccc; padding:10px; margin:5px; background:#1e293b;'>".$s['name']." | ".$s['start_date']." → ".$s['end_date']." | Project ID: ".$s['project_id']."</div>";
} ?>
<a href="../dashboard.php" style="color:#22c55e;">Back to Dashboard</a>
</body>
</html>