
<!DOCTYPE html>
<?php session_start();
?>
<html>
<head>
	<title>home page</title>
</head>
<center><body>
	<?php
	$email=$_POST['email'];
	$pass=$_POST['password'];

	$servername="localhost";
		$username="elvis";
		$password="E37081438a.";
		$dbname="kagledata";

		$conn=new mysqli($servername,$username,$password,$dbname);
		if($conn->connection_error){
			die("connection failed".$conn->connect_error);
		}
		$select="SELECT idno,email FROM employeeinfo WHERE idno=$pass AND email='$email'";
		$result=$conn->query($select);
		if($result->num_rows>0){
			while($row=$result->fetch_assoc()){
				//echo "karbu";
				
				

			}
			
		}else{
			$_SESSION['loginfail']="incorrect email or password";
			//$_SESSION['emai']=$email;
			//$_SESSION['pass']=$pass;
			header("location:employeelogin.php");

		}






	?>

</body></center>
</html>