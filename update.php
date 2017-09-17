<!DOCTYPE html>
<?php include 'db.php';
$id= $_GET['id'];
$sql= "select * from task where id='$id'";
$rows = $con->query($sql);
$row= $rows->fetch_assoc();
var_dump($row);

if (isset($_POST['send']))
{
$task = $_POST['task'];
$sql2 = "update task set name='$task' where id='$id'";
$con->query($sql2);

header('location: index.php');
}
 ?>

<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


	<title></title>
</head>
<body>

<div class="container">
<center><h1>Update To Do List</h1></center>

<div class="row" style="margin-top: 10px;">
<div class="col-md-10 col-md-offset-1">



<hr><br>


        <form method="post">
        	<div class="form-group">
        	<label>Task Name</label>
        	<input type="text" value="<?php echo $row['name']; ?>" required name="task" class="form-control">
        	</div>
        	<input type="submit" value="Edit task" name="send" class="btn btn-success">
</form>
        

</div></div></div>




</body>
</html>