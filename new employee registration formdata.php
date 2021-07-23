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
		$acountno=$_POST['acount'];
		$bankname=$_POST['bankname'];
		$nationality=$_POST['nationality'];
		$county=$_POST['county'];
		$city=$_POST['city'];
		$posta=$_POST['posta'];
		$maritalstatus=$_POST['maritalstatus'];
		
		$dateofregistration=date('Y-m-d',time());
		$timeofregistration=date('H:i:s',time());


		if(!preg_match("/^[0-9]*$/",$idno)){
			$_SESSION['idnoerror']="only numeric values are allowed";
			header("location:new employee registration form.php");
			exit();

		}
		
			$idlength=strlen((string)$idno);
			if($idlength!=8){
				$_SESSION['idlengtherror']="id must have 8 digits";
				header("location:new employee registration form.php");
				exit();
			}
			


		if(!preg_match("/^[a-zA-Z]*$/",$fname)){
			$_SESSION['fnameerror']="only alphates and whitespace are allowed";
			header("location:new employee registration form.php");
			exit();
		}
		
			if(!preg_match("/^[a-zA-Z]*$/",$lname)){
			$_SESSION['lnameerror']="only alphates and whitespace are allowed";
			header("location:new employee registration form.php");
			exit();
		}
		
			if(!preg_match("/^[0-9]*$/",$phone)){
			$_SESSION['phoneerror']="only numeric values are allowed";
			header("location:new employee registration form.php");
			exit();
		}
		
			$phonelength=strlen((string)$phone);
			if($phonelength!=10){
				$_SESSION['phonelengtherror']="id must have 10 digits";
				header("location:new employee registration form.php");
				exit();
			}
			
			if(!preg_match("/^[0-9]*$/",$acountno)){
			$_SESSION['acountnoerror']="only numeric values are allowed";
			header("location:new employee registration form.php");
			exit();
		}
		
			$acountlength=strlen((string)$acountno);
			if($acountlength<12 || $acountlength>13){
				$_SESSION['acountlengtherror']="acount must have 12 digits";
				header("location:new employee registration form.php");
				exit();
			}
			
			if(!preg_match("/^[a-zA-Z]*$/",$bankname)){
			$_SESSION['banknameerror']="only alphates and whitespace are allowed";
			header("location:new employee registration form.php");
			exit();
		}
		
			if(!preg_match("/^[a-zA-Z]*$/",$county)){
			$_SESSION['countyerror']="only alphates and whitespace are allowed";
			header("location:new employee registration form.php");
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
		$select="SELECT idno,email FROM employeeinfo WHERE idno=$idno OR email='$email'";
		$result=$conn->query($select);
		if($result->num_rows>0){
			while($row=$result->fetch_assoc()){
				$_SESSION['exist']=" email or ID number is in use ";
				header("location:new employee registration form.php");

			}
			exit();
		}
		
		$sql="INSERT INTO employeeinfo (idno,fname,lname,phone,email,dob,acountno,bankname,nationality,county,city,posta,maritalstatus,dateofregistration,timeofregistration) VALUES($idno,'$fname','$lname','$phone','$email','$dob',$acountno,'$bankname','$nationality','$county','$city',$posta,'$maritalstatus','$dateofregistration','$timeofregistration')";
		if($conn->query($sql)===TRUE){
			$_SESSION['login']="registration is succesful";
			header("location:new employee registration form.php");
		}
		else{
			echo "Error".$sql."<br>".$conn->error;
			$conn->close();
		}
	



		




		?>
	</body>
</html>
