<?php
include "../config/db.php";
if(!isset($_SESSION['user'])){ header("Location: ../login.php"); exit; }

$sprint_id = $_GET['id'];
$q = mysqli_query($conn,"SELECT s.*, p.name as project_name FROM sprints s 
LEFT JOIN projects p ON s.project_id=p.id
WHERE s.id=$sprint_id");
$sprint = mysqli_fetch_assoc($q);

// Update sprint dates
if(isset($_POST['start']) && isset($_POST['end'])){
    $start = $_POST['start'];
    $end = $_POST['end'];
    mysqli_query($conn,"UPDATE sprints SET start_date='$start', end_date='$end' WHERE id=$sprint_id");
    header("Location: sprint_details.php?id=$sprint_id");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Sprint Details - TechFlow Pro</title>
</head>
<body style="font-family:Arial; background:#0f172a; color:white; padding:30px;">
<h2>Sprint Details</h2>
<div style="border:1px solid #ccc; padding:20px; margin-bottom:20px; background:#1e293b;">
<strong>Sprint Name:</strong> <?php echo $sprint['name']; ?><br>
<strong>Project:</strong> <?php echo $sprint['project_name']; ?><br>
<strong>Start Date:</strong> <?php echo $sprint['start_date']; ?><br>
<strong>End Date:</strong> <?php echo $sprint['end_date']; ?><br>
</div>

<form method="POST" style="margin-bottom:20px;">
<label style="margin-right:10px;">Start Date:</label>
<input type="date" name="start" value="<?php echo $sprint['start_date']; ?>" style="padding:8px; border-radius:5px; margin-right:10px;">
<label style="margin-right:10px;">End Date:</label>
<input type="date" name="end" value="<?php echo $sprint['end_date']; ?>" style="padding:8px; border-radius:5px; margin-right:10px;">
<button style="padding:8px 15px; background:#22c55e; border:none; color:white; border-radius:5px;">Update</button>
</form>

<h3>Tasks in this Sprint:</h3>
<?php
$tasks = mysqli_query($conn,"SELECT t.*, u.fullname FROM tasks t LEFT JOIN users u ON t.assigned_to=u.id WHERE t.project_id=".$sprint['project_id']);
while($t=mysqli_fetch_assoc($tasks)){
    echo "<div style='border:1px solid #ccc; padding:10px; margin:5px; background:#0f172a;'>";
    echo "<strong>".$t['title']."</strong> | Assigned: ".$t['fullname']." | Status: ".$t['status'];
    echo "</div>";
}
?>

<a href="sprints.php" style="color:#22c55e; display:block; margin-top:20px;">Back to Sprints</a>
</body>
</html>