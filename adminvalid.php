<?php
	
	
	$con = mysqli_connect("localhost","root","");
	
		if(!$con)
		{
			echo "not connected";
		}
	
		if(!mysqli_select_db($con,'project'))
		{
			echo "data base not connected";
		}
		$myusername=$_POST['username'];
		$mypassword=$_POST['pass'];


		$query="SELECT * FROM register WHERE username='$myusername' and pass='$mypassword'";

		
		$result = mysqli_query($con,$query);
		$count = mysqli_num_rows($result);
		if($count==1)
		{
			$row=mysqli_fetch_row($result);
			$sname=$row[0];
			session_start();
			$_SESSION['username']=$myusername;
			$_SESSION['Status']="Session Status: Login Success!!!";
			header("location:admin1.php");
		}
		else 
		{	
			session_start();
			if (isset($_SESSION['SName'])){
			unset($_SESSION['SName']);
		    }
		$_SESSION['Status']="Session Expired!!!";
		echo "<h2>Login Failed!!!</h2>";
	}
?>