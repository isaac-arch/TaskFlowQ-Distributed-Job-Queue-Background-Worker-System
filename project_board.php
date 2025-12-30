<?php
include "../config/db.php";
if(!isset($_SESSION['user'])){ header("Location: ../login.php"); exit; }
$pid=$_GET['id'];
$q=mysqli_query($conn,"SELECT * FROM tasks WHERE project_id=$pid");
$todo=$inprogress=$done=[];
while($t=mysqli_fetch_assoc($q)){
if($t['status']=='To Do') $todo[]=$t;
elseif($t['status']=='In Progress') $inprogress[]=$t;
else $done[]=$t;
}
?>
<!DOCTYPE html>
<html>
<head><title>Project Board</title></head>
<body style="font-family:Arial; background:#0f172a; color:white; padding:20px;">
<h2>Project Board</h2>
<div style="display:flex; justify-content:space-around;">
<div style="width:30%; background:#1e293b; padding:10px;">
<h3>To Do</h3>
<?php foreach($todo as $t){ echo "<p>{$t['title']}</p>"; } ?>
</div>
<div style="width:30%; background:#0f766e; padding:10px;">
<h3>In Progress</h3>
<?php foreach($inprogress as $t){ echo "<p>{$t['title']}</p>"; } ?>
</div>
<div style="width:30%; background:#4ade80; padding:10px;">
<h3>Done</h3>
<?php foreach($done as $t){ echo "<p>{$t['title']}</p>"; } ?>
</div>
</div>
<a href="../dashboard.php" style="display:block; margin-top:20px; color:#22c55e;">Back to Dashboard</a>
</body>
</html>