<?php
include "../config/db.php";
if(!isset($_SESSION['user'])){ header("Location: ../login.php"); exit; }
if($_POST){
mysqli_query($conn,"INSERT INTO bugs (task_id,reported_by,description)
VALUES ('$_POST[task]',".$_SESSION['user']['id'].",'$_POST[desc]')");
}
$q=mysqli_query($conn,"SELECT b.*,u.fullname as reporter FROM bugs b JOIN users u ON u.id=b.reported_by");
?>
<!DOCTYPE html>
<html>
<head><title>Bugs</title></head>
<body style="font-family:Arial; background:#0f172a; color:white; padding:20px;">
<h2>Bug Reports</h2>
<form method="POST" style="margin-bottom:20px;">
<input name="task" placeholder="Task ID" style="padding:10px; margin:5px;" required>
<textarea name="desc" placeholder="Bug Description" style="padding:10px; margin:5px;"></textarea>
<button style="padding:10px 20px; background:#22c55e; color:white; border:none;">Report Bug</button>
</form>
<?php while($b=mysqli_fetch_assoc($q)){
echo "<div style='border:1px solid #ccc; padding:10px; margin:5px; background:#1e293b;'>";
echo "Task {$b['task_id']} | Reported by: {$b['reporter']} | Status: {$b['status']}<br>Description: {$b['description']}</div>";
} ?>
<a href="../dashboard.php" style="color:#22c55e;">Back to Dashboard</a>
</body>
</html>