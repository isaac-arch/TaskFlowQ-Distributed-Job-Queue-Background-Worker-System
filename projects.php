<?php
include "../config/db.php";
if(!isset($_SESSION['user'])){ header("Location: ../login.php"); exit; }

$q=mysqli_query($conn,"SELECT * FROM projects");
?>
<!DOCTYPE html>
<html>
<head><title>Projects</title></head>
<body style="font-family:Arial; background:#0f172a; color:white; padding:20px;">
<h2>Projects List</h2>
<?php
while($p=mysqli_fetch_assoc($q)){
echo "<div style='border:1px solid #ccc; padding:10px; margin:10px; background:#1e293b;'>";
echo "<h3>{$p['name']}</h3>";
echo "<p>{$p['description']}</p>";
echo "<a href='project_board.php?id={$p['id']}' style='color:#22c55e;'>View Board</a></div>";
}
?>
<a href="../dashboard.php" style="color:#22c55e;">Back to Dashboard</a>
</body>
</html>