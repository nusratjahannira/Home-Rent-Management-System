<?php
$servername= "localhost";
	$username = "root";
	$password = "";
	$databasename="data";
	$conn = new mysqli($servername, $username, $password,$databasename);
	if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


	$d= "SELECT advance FROM renterinfo";
	   $c1=mysqli_query($conn,$d);
	$p="SELECT amount FROM payments where amount=0 ";
	   $c2=mysqli_query($conn,$p);
	$f="SELECT flatnumbers FROM payments where amount=0 ";
	   $c4=mysqli_query($conn,$f);
	$r="SELECT rentamount FROM ownerinfo";
	   $c3=mysqli_query($conn,$r);
	  
	   if($c1 && $c2 && $c3 && $c4){
	   $fassoc=mysqli_fetch_assoc($c1);
      $t=$fassoc['advance'];
	  $lassoc=mysqli_fetch_assoc($c4);
	  $m=$lassoc['flatnumbers'];
      $tassoc=mysqli_fetch_assoc($c2);
	  $h=$tassoc['amount'];
	  $cassoc=mysqli_fetch_assoc($c3);
	  $o=$cassoc['rentamount'];
	  if($h==0){
		  $g=$t-$o;	 
	  }
	  }
	   $sqla="Update renterinfo set advance='$g' where flatnumber='$m' ";
	         $resulta=mysqli_query($conn,$sqla);
	   //if($counts==1){
		 //  $utype = 0;
			//	} else {
			//		$utype = 1;
				

  // $insert="INSERT INTO dewcheck(dew_counts,advances)
           // VALUES ('$utype','$g')";
			// mysqli_query($conn,$insert);
    
	
	 

?>