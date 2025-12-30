<?php
include "config/db.php";
if(!isset($_SESSION['user'])){ header("Location: login.php"); exit; }
?>
<!DOCTYPE html>
<html>
<head><title>Reports - TechFlow Pro</title></head>
<body style="font-family:Arial; background:#0f172a; color:white; padding:20px;">
<h2>Activity Reports</h2>

<?php
$q = mysqli_query($conn,"SELECT a.*, u.fullname FROM activity_logs a JOIN users u ON u.id=a.user_id ORDER BY a.created_at DESC");
while($r = mysqli_fetch_assoc($q)){
    echo "<div style='border:1px solid #ccc; padding:10px; margin:5px; background:#1e293b;'>";
    echo "User: ".$r['fullname']." | Action: ".$r['action']." | Time: ".$r['created_at'];
    echo "</div>";
}
?>

<a href="dashboard.php" style="color:#22c55e; display:block; margin-top:20px;">Back to Dashboard</a>

</body>
</html>