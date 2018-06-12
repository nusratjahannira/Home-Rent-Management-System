<?php
	include('conection.php');
	if($_GET['renter']){
	$id=$_GET['renter'];
	
	$d="DELETE FROM renterinfo where renterId=$id ";
	   $result= mysqli_query($conn, $d);
	   if($result){
		   echo "deleted successfully";
        }else{
			echo "Not deleted data";
		}
		  }
	
	



?>