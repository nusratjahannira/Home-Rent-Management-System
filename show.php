<?php
if(isset($_POST['show'])){
	include('conection.php');
	$sql="select * from renterinfo";
	if($result=mysqli_query($conn, $sql)){
	if(mysqli_num_rows($result)>0)
				{
				echo "<table>";
					echo "<tr>";
					    echo "<th>renterid</th>";
						echo "<th>rentername</th>";
						echo "<th>renteremail</th>";
						echo "<th>renterphoneno</th>";
						echo "<th>place</th>";
						echo "<th>advance</th>";
					echo "</tr>";
							
				while($row = mysqli_fetch_array($result))
					{
					echo "<tr>";
					    echo "<td>" . $row['renterId'] . "</td>";
						echo "<td>" . $row['rentername'] . "</td>";
						echo "<td>" . $row['renteremail'] . "</td>";
						echo "<td>" . $row['renterphoneno'] . "</td>";
						echo "<td>" . $row['place'] . "</td>";
						echo "<td>" . $row['advance'] . "</td>";
						echo "<td>"
						?>
						<button><a href="delete.php?renter=<?php echo $row['renterId']?>" >delete</a></button>
						<?php
						echo "<td>";
					echo "</tr>";
					}	
				echo "</table>";
				mysqli_free_result($result);
				}
}

}
?>






<!DOCTYPE HTML>  
<html>
<head>
<style>
body {
			background: url(images.jpg) no-repeat center center fixed; 
		    -webkit-background-size: cover;
		    -moz-background-size: cover;
		    -o-background-size: cover;
		    background-size: cover;
			}
			p{
			text-align:center;
			}
		.box{
			width:400px;
			height:400px;
			background: rgba(0,0,0,0,4);
			padding:40px;
			color: black;
			margin: 0 auto;
			marging-top:140px;
			text-align:center;
		}
</style>
</head>
<body>  
<div class="box">
<form method="post" action="">
<h2>show of renter information.</h2>
<input type="submit" name="show" value="show"> 
<a href="logout.php">logout</a>



</form>
</div>
</body>
</html>




