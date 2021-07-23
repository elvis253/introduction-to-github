<!DOCTYPE html>
<?php
session_start();
?>
</html>
<head>
	<title>empyee reg validation</title>
	</head>
	<body>
		<?php
		$idno=$_POST['idno'];
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$phone=$_POST['phone'];
		$email=$_POST['email'];
		$dob=$_POST['dob'];
		//$acountno=$_POST['acount'];
		//$bankname=$_POST['bankname'];
		$nationality=$_POST['nationality'];
		$county=$_POST['county'];
		$city=$_POST['city'];
		//$posta=$_POST['posta'];
		$maritalstatus=$_POST['maritalstatus'];
		
		$dateofregistration=date('Y-m-d',time());
		$timeofregistration=date('H:i:s',time());


		if(!preg_match("/^[0-9]*$/",$idno)){
			$_SESSION['idnoerro']="only numeric values are allowed";
			header("location:bankingacountcreation.php");
			exit();

		}
		
			$idlength=strlen((string)$idno);
			if($idlength!=8){
				$_SESSION['idlengtherro']="id must have 8 digits";
				header("location:bankingacountcreation.php");
				exit();
			}
			


		if(!preg_match("/^[a-zA-Z]*$/",$fname)){
			$_SESSION['fnameerro']="only alphates and whitespace are allowed";
			header("location:bankingacountcreation.php");
			exit();
		}
		
			if(!preg_match("/^[a-zA-Z]*$/",$lname)){
			$_SESSION['lnameerro']="only alphates and whitespace are allowed";
			header("location:bankingacountcreation.php");
			exit();
		}
		
			if(!preg_match("/^[0-9]*$/",$phone)){
			$_SESSION['phoneerro']="only numeric values are allowed";
			header("location:bankingacountcreation.php");
			exit();
		}
		
			$phonelength=strlen((string)$phone);
			if($phonelength!=10){
				$_SESSION['phonelengtherro']="id must have 10 digits";
				header("location:bankingacountcreation.php");
				exit();
			}
			
			
			
			
		
			if(!preg_match("/^[a-zA-Z]*$/",$county)){
			$_SESSION['countyerro']="only alphates and whitespace are allowed";
			header("location:bankingacountcreation.php");
			exit();
		}
		
		$servername="localhost";
		$username="elvis";
		$password="E37081438a.";
		$dbname="kagledata";

		$conn=new mysqli($servername,$username,$password,$dbname);
		if($conn->connection_error){
			die("connection failed".$conn->connect_error);
		}
		$select="SELECT idno,email FROM customerinfo WHERE idno=$idno OR email='$email'";
		$result=$conn->query($select);
		if($result->num_rows>0){
			while($row=$result->fetch_assoc()){
				$_SESSION['exists']=" email or ID number is in use ";
				header("location:bankingacountcreation.php");

			}
			exit();
		}
		
		$sql="INSERT INTO customerinfo (idno,fname,lname,phone,email,dob,nationality,county,city,maritalstatus,dateofregistration,timeofregistration) VALUES($idno,'$fname','$lname','$phone','$email','$dob','$nationality','$county','$city','$maritalstatus','$dateofregistration','$timeofregistration')";
		if($conn->query($sql)===TRUE){
			
			$messaging="SELECT acountno FROM customerinfo WHERE idno=$idno AND email='$email' ";
			$result1=$conn->query($messaging);
		if($result1->num_rows>0){
			while($row=$result1->fetch_assoc()){
				$acount="dear".$fname." ".$lname." welcome to PESA online banking your account number is".$row['acountno'];
				$subject="PESA online banking acount";
				$retval=mail($email,$subject,$acount);
				if($retval==true){
					$_SESSION['mailing']="verify your acount number has been sent to your email ";
					header("location:bankingacountcreation.php");
					$_SESSION['login']="registration is succesful";
			header("location:bankingacountcreation.php");
				}else{
					$_SESSION['mailingerro']="your email does not exist";
					header("location:bankingacountcreation.php");
				}

				//$_SESSION['exists']=" email or ID number is in use ";
				

			}
			
		}

			
		}
		else{
			echo "Error".$sql."<br>".$conn->error;
			$conn->close();
		}
	



		




		?>
	</body>
</html>
