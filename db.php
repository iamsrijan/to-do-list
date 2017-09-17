<?php
mysqli_connect("localhost","root","");
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"to_do_list");
if ($con)
{
	echo "success";
}




?>