<?php
	if(isset($_POST['signup'])){
	header("Location: renter_reg.php");
	  exit();
	}
	else if(isset($_POST['signin'])){
	header("Location: renterlogin.php");
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
<p>If new member then click here:<input type="submit" name="signup" value="Signup"> </p>
<p>If  existing member then click here:<input type="submit" name="signin" value="Signin">  </p>
</div>
</form>
</body>
</html>