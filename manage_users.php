<?php
include "config/db.php";
if(!isset($_SESSION['user']) || $_SESSION['user']['role_id'] != 1){
    header("Location: login.php"); exit;
}

if($_POST && isset($_POST['delete'])){
    mysqli_query($conn,"DELETE FROM users WHERE id=".$_POST['delete']);
}

$users = mysqli_query($conn,"SELECT u.*, r.role_name FROM users u JOIN roles r ON u.role_id=r.id");
?>
<!DOCTYPE html>
<html>
<head><title>Manage Users</title></head>
<body style="font-family:Arial; background:#0f172a; color:white; padding:20px;">
<h2>Manage Users</h2>
<?php while($u = mysqli_fetch_assoc($users)){
    echo "<div style='border:1px solid #ccc; padding:10px; margin:5px; background:#1e293b;'>";
    echo "ID: ".$u['id']." | ".$u['fullname']." | ".$u['email']." | Role: ".$u['role_name'];
    echo "<form method='POST' style='display:inline;'><button name='delete' value='".$u['id']."' style='padding:5px 10px; margin-left:10px; background:#f43f5e; color:white; border:none;'>Delete</button></form>";
    echo "</div>";
} ?>
<a href="admin_dashboard.php" style="color:#22c55e; display:block; margin-top:20px;">Back to Admin Dashboard</a>
</body>
</html>