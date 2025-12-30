<?php
include "../config/db.php";
if(!isset($_SESSION['user'])){ header("Location: ../login.php"); exit; }

$task_id = $_GET['id'];
$q = mysqli_query($conn,"SELECT t.*, u.fullname as assigned_name, p.name as project_name 
FROM tasks t 
LEFT JOIN users u ON t.assigned_to = u.id
LEFT JOIN projects p ON t.project_id = p.id
WHERE t.id = $task_id");
$task = mysqli_fetch_assoc($q);

// Update status
if(isset($_POST['status'])){
    $new_status = $_POST['status'];
    mysqli_query($conn,"UPDATE tasks SET status='$new_status' WHERE id=$task_id");
    header("Location: task_details.php?id=$task_id");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Task Details - TechFlow Pro</title>
</head>
<body style="font-family:Arial; background:#0f172a; color:white; padding:30px;">
<h2>Task Details</h2>
<div style="border:1px solid #ccc; padding:20px; margin-bottom:20px; background:#1e293b;">
<strong>Title:</strong> <?php echo $task['title']; ?><br>
<strong>Description:</strong> <?php echo $task['description']; ?><br>
<strong>Assigned To:</strong> <?php echo $task['assigned_name']; ?><br>
<strong>Project:</strong> <?php echo $task['project_name']; ?><br>
<strong>Status:</strong> <?php echo $task['status']; ?><br>
<strong>Created At:</strong> <?php echo $task['created_at']; ?><br>
</div>

<form method="POST" style="margin-bottom:20px;">
<label style="margin-right:10px;">Change Status:</label>
<select name="status" style="padding:10px; border-radius:5px;">
<option value="To Do" <?php if($task['status']=='To Do') echo 'selected'; ?>>To Do</option>
<option value="In Progress" <?php if($task['status']=='In Progress') echo 'selected'; ?>>In Progress</option>
<option value="Done" <?php if($task['status']=='Done') echo 'selected'; ?>>Done</option>
</select>
<button style="padding:10px 20px; margin-left:10px; background:#22c55e; border:none; color:white; border-radius:5px;">Update</button>
</form>

<a href="tasks.php?pid=<?php echo $task['project_id'];?>" style="color:#22c55e;">Back to Tasks</a>

</body>
</html>