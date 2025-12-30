<?php
include "../config/db.php";
if(!isset($_SESSION['user'])){ header("Location: ../login.php"); exit; }
$pid=$_GET['pid'];
if($_POST){
mysqli_query($conn,"INSERT INTO tasks (project_id,title,description,assigned_to)
VALUES ($pid,'$_POST[title]','$_POST[desc]',$_POST[assigned])");
}
$tasks=mysqli_query($conn,"SELECT t.*,u.fullname FROM tasks t LEFT JOIN users u ON u.id=t.assigned_to WHERE t.project_id=$pid");
?>
<!DOCTYPE html>
<html>
<head><title>Tasks</title></head>
<body style="font-family:Arial; background:#0f172a; color:white; padding:20px;">
<h2>Tasks</h2>
<form method="POST" style="margin-bottom:20px;">
<input name="title" placeholder="Task Title" required style="padding:10px; margin:5px;">
<input name="desc" placeholder="Description" required style="padding:10px; margin:5px;">
<input type="number" name="assigned" placeholder="Assign To (User ID)" required style="padding:10px; margin:5px;">
<button style="padding:10px 20px; background:#22c55e; color:white; border:none;">Add Task</button>
</form>
<?php while($t=mysqli_fetch_assoc($tasks)){
echo "<div style='border:1px solid #ccc; padding:10px; margin:5px; background:#1e293b;'>";
echo "<strong>{$t['title']}</strong> | Assigned: {$t['fullname']}<br>{$t['description']}</div>";
} ?>
<a href="project_board.php?id=<?php echo $pid;?>" style="color:#22c55e;">Back to Board</a>
</body>
</html>