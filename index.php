<!DOCTYPE html>
<?php include 'db.php';
$page= (isset($_GET['page']) ? $_GET['page'] : 1);
$perPage= (isset($_GET['per-page']) && ($_GET['per-page']) <=50 ? $_GET['per-page'] : 5);
$start = ($page>1) ? ($page*$perPage) - $perPage : 0;


$sql= "select * from task limit ".$start.", ".$perPage." ";
$total = $con->query("select * from task")->num_rows;
$pages = ceil($total/$perPage);
$rows = $con->query($sql);
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
<center><h1>To Do List</h1></center>

<div class="row" style="margin-top: 10px;">
<div class="col-md-10 col-md-offset-1">

<button class="btn btn-success " data-target="#myModal" data-toggle="modal" type="button">Add Task</button>

<hr><br>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Task</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="add.php">
        	<div class="form-group">
        	<label>Task Name</label>
        	<input type="text" required name="task" class="form-control">
        	</div>
        	<input type="submit" value="send" name="send" class="btn btn-default">

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<table class="table">
    <thead>
    <tr>
      <th>ID</th>
      <th>Task</th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php while ($row = $rows->fetch_assoc()): ?>
    

      <th><?php echo $row['id']; ?></th>
      <td class="col col-md-10"><?php echo $row['name']; ?></td>
      <td ><a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Edit</a></td>
      <td ><a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
          </tr>
   <?php endwhile; ?>
    
  </tbody>
</table>
<center>
<ul class="pagination">
<?php for ($i=1; $i<=$pages; $i++): ?>
  <li><a href="?page=<?php echo $i;?>"><?php echo $i; ?></a></li>
<?php endfor; ?>
</ul>
</center>



</div></div></div>




</body>
</html>