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
  Name: <input type="text" name="name" value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>" />
  
  <br><br>
  Password: <input type="password" name="password">
 
  <br><br>
  <input type="submit" name="submit" value="login"> 
</form>
</div>
</body>
</html>
<?php

if ($_POST){
	
	$servername= "localhost";
	$username = "root";
	$dbpassword = "";
	$databasename="data";
	
	$conn = new mysqli($servername, $username, $dbpassword,$databasename);
	
	if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
	}
	else{
		echo "Connection Suceesfull\n";
	}
	session_start();
	if(isset($_SESSION['name'])){
		header('Location: show.php');
	}
	
		$Name=$_POST['name'];
		$Password=$_POST['password'];
	
		$Query = "select * from renterinfo where name='$Name' and password='$Password'";
			

		mysqli_query($conn, $Query);
		if($Query)
		{
			echo("successfully login");
		}
			else
			{
				echo "* UserName or Password incorrect";
			}	
  $conn->close();
  header("Location: payment.php");
  exit();
  }
?>
