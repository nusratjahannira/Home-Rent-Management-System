<?php

$nameErr = $passwordErr= $ConfirmPasswordErr=$emailErr=$phonenoErr=$areaErr=$advanceErr=$flatErr="";
$name = $password =$ConfirmPassword =$email=$phoneno=$area=$advance=$flat= "";

if ($_POST) {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
  }
  if (empty($_POST["flat"])) {
    $flatErr = "flat number is required";
  } else {
    $flat = test_input($_POST["flat"]);
  }
  
  if (empty($_POST["advance"])) {
    $advanceErr = "advance amount is required";
  } else {
    $advance = test_input($_POST["advance"]);
  }
  if (empty($_POST["phoneno"])) {
    $phonenoErr = "phoneno is required";
  } else {
    $phoneno = test_input($_POST["phoneno"]);
  }
  
  if (empty($_POST["password"])) {
    $passwordErr = "password is required";
  } else {
    $password = test_input($_POST["password"]);
  }
  if (empty($_POST["ConfirmPassword"])) {
    $ConfirmPasswordErr = "ConfirmPassword is required";
  } if (($_POST["password"])!=($_POST["ConfirmPassword"])) {
    $ConfirmPasswordErr = "password must be same";
  }else {
    $ConfirmPassword = test_input($_POST["ConfirmPassword"]);
  }
  
  if (!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
    $emailErr = " valid email is required";
  }
  else {
    $email=($_POST["email"]);
  }
  
   
  if(!empty($_POST["name"]) && !empty($_POST["password"])&& !empty($_POST["ConfirmPassword"])&& !empty($_POST["advance"])&& !empty($_POST["flat"])&& !empty($_POST["email"])&& (($_POST["password"])==($_POST["ConfirmPassword"])))
  {
	  
	$servername= "localhost";
	$username = "root";
	$password = "";
	$databasename="data";
	
	  $Name=($_POST["name"]);
	  $Email=($_POST["email"]);
	  $Phoneno=($_POST["phoneno"]);
	  $Password=($_POST["password"]);
	  $ConfirmPassword=($_POST["ConfirmPassword"]);
	  $area=($_POST["area"]);
	  $advance=($_POST["advance"]);
	
	$conn = new mysqli($servername, $username, $password,$databasename);
	if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


	$renterinfo = "INSERT INTO renterinfo(rentername, renteremail,renterphoneno,renterpassword,advance,flatnumber)
            VALUES ('$Name','$Email','$Phoneno','$Password','$advance','$flat')";
			$s=mysqli_query($conn,$renterinfo);
			if(!$s){
				echo "not successful";
				
			}else{
				echo " successful";
			}
	
  header("Location: renterlogin.php");
  exit();
  }
}

function test_input($info) {
  $info= trim($info);
  $info = stripslashes($info);
  $info= htmlspecialchars($info);
  return $info;
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
<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field.</span></p>

<form method="post" action="">
  Name: <input type="text" name="name" value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>" />
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  Email: <input type="email" name="email" required><?php if(isset($_POST['email'])) echo $_POST['email']; ?>
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  phone No:<input type="text" name="phoneno"><?php if(isset($_POST['phoneno'])) echo $_POST['phoneno']; ?>
  <span class="error">* <?php echo $phonenoErr;?></span>
  <br><br>
  Flat number:<input type="text" name="flat"><?php if(isset($_POST['advance'])) echo $_POST['advance']; ?>
  <span class="error">* <?php echo $flatErr;?></span>
  <br><br>
  Advance amount:<input type="text" name="advance"><?php if(isset($_POST['advance'])) echo $_POST['advance']; ?>
  <span class="error">* <?php echo $advanceErr;?></span>
  <br><br>
  Password: <input type="password" name="password"><?php if(isset($_POST['password'])) echo $_POST['password']; ?>
  <span class="error">* <?php echo $passwordErr;?></span>
  <br><br>
  ConfirmPassword: <input type="password" name="ConfirmPassword">
  <span class="error">* <?php echo $ConfirmPasswordErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit"> 
</form>
</div>
</body>
</html>


