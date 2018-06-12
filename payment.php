
<?php

$areaErr= $flatErr=$amountErr=$dateErr= "";
$area =$flat =$amount =$date= "";

if ($_POST) {
	if (empty($_POST["flat"])) {
		$flatErr = "flat numbers is required";
	}
	else {
		$flat = test_input($_POST["flat"]);
	  
		$servername= "localhost";
		$username = "root";
		$password = "";
		$databasename="data";
		
		$amount=($_POST["amount"]);
		$conn = new mysqli($servername, $username, $password,$databasename);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		
		$data = "INSERT INTO payments(flatnumbers,amount) VALUES ('$flat','$amount')";
		$s=mysqli_query($conn,$data);
			if(!$s){
				echo "not successful";
				
			}else{
				echo " successful";
			}
			if($amount==0){
				
				$d= "SELECT advance FROM renterinfo where flatnumber= '$flat'";
				$c1=mysqli_query($conn,$d);
				$r="SELECT rentamount FROM ownerinfo  ";
				$c3=mysqli_query($conn,$r);
	  
				if($c1 && $c3){
				$fassoc=mysqli_fetch_assoc($c1);
				$t=$fassoc['advance'];

				$cassoc=mysqli_fetch_assoc($c3);
				$o=$cassoc['rentamount'];
				if($t>0){
					$g=$t-$o;
					$sqla="Update renterinfo set advance='$g' where flatnumber='$flat' ";
					$resulta=mysqli_query($conn,$sqla);
				}
			}
		}
	   
			$conn->close();
}
}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
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
<h2>Payment page </h2>
<p><span class="error">* required field.</span></p>

<form method="post" action="">

<label>Enter flat number: </label>
<input type="text" name="flat" value= "">
<span class="error">* <?php echo $flatErr;?></span>
<br><br>
<label>Enter amount: </label>
<input type="text" name="amount" value="">
<span class="error">* <?php echo $amountErr;?></span>
<br><br>
<input type="submit" name="submit" value="Submit"> 
<a href="logout.php">logout</a>
</form>
</div>
</body>
</html>


