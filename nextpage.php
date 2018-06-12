	<?php
	if(isset($_POST['Owner'])){
	header("Location: owner.php");
	  exit();
	}
	?>
	<?php
	if(isset($_POST['Renter'])){
	header("Location: renter.php");
	  exit();
	}
	?>

<!doctype html>

<html>
<head>
	<title></title>
	
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
<div class="container">
<div class="jumbotron">
<form method="post">
<div class="box">
<p>If  you are owner then click here:<input type="submit" name="Owner" value="Owner"> </p>
<p>If  you are renter then click here:<input type="submit" name="Renter" value="Renter">  </p>
</div>
</form>
</body>
</html>