
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
	//header("location:depositedata.php");


	$_SESSION['kevalue']=$pass;
	$idno=$_SESSION['kevalue'];

	echo $_SESSION['kevalue'];
	//header("location:depositedata.php");


    echo '<a href="deposite.php">deposite  </a>';
	echo '<a href="sendmoney.php">    sendmoney</a>';
	echo '<a href="widthraw.php">      withdraw cash</a>';
	echo '<a href="loanrequest.php">    request loan</a>';
	echo '<a href="repayloan.php">    repay loan</a>';

	$servername="localhost";
		$username="elvis";
		$password="E37081438a.";
		$dbname="kagledata";
		



		$conn=new mysqli($servername,$username,$password,$dbname);
		if($conn->connect_error){
			die("connection failed".$conn->connect_error);
		}
		$select="SELECT * FROM customerinfo WHERE idno=$idno AND email='$email'";
		$result=$conn->query($select);
		if($result->num_rows>0){
			while($row=$result->fetch_assoc()){

				
				echo "<p>personal information</p>";
				echo "<table>";
				echo "<tr>";
				echo "<td>ID number:</td>";
				echo "<td>".$row['idno']."</td>";
				echo "</tr>
				<tr>
				<td>acount number:</td>
				<td>".$row['acountno']."</td>
				</tr>
				<tr>
				<td>NAME:</td>
				<td>".$row['fname']." ".$row['lname']."</td>
				</tr>
				<tr>
				<td>Email adress:</td>
				<td>".$row['email']."</td>
				</tr>
				<tr>
				<td>phone number:</td>
				<td>".$row['phone']."</td>
				</tr>
				
				<tr>
				<td>date of birth:</td>
				<td>".$row['dob']."</td>
				</tr>
				<tr>
				<td>Nationality:</td>
				<td>".$row['nationality']."</td>
				</tr>
				<tr>
				<td>County:</td>
				<td>".$row['county']."</td>
				</tr>
				<tr>
				<td>City:</td>
				<td>".$row['city']."</td>
				</tr>
				<tr>
				<td>Marital status:</td>
				<td>".$row['maritalstatus']."</td>
				</tr>
				</table>";
				
	

			}
			//deposite successful message
			if(isset($_SESSION['depomessage'])){
				echo $_SESSION['depomessage'];
			}

			//amount sent succesfull massage
			if(isset($_SESSION['sent'])){
				echo $_SESSION['sent'];
			}

				if(isset($_SESSION['insuficient'])){
					echo $_SESSION['insuficient'];
				}
				if(isset($_SESSION['insufsentamount'])){
					echo $_SESSION['insufsentamount'];
				}

				 
			if(isset($_SESSION['withmessage'])){
				echo $_SESSION['withmessage'];
			}
			if(isset($_SESSION['loanlimit'])){
				echo $_SESSION['loanlimit'];
			}
			if(isset($_SESSION['loanmessage'])){
				echo $_SESSION['loanmessage'];
			}
			if(isset($_SESSION['loanrepaymessage'])){
				echo $_SESSION['loanrepaymessage'];
			}
			if(isset($_SESSION['loanrepayme'])){
				echo $_SESSION['loanrepayme'];
			}
			
		}else{
			$_SESSION['loginfai']="incorrect email or password";
			//$_SESSION['emai']=$email;
			//$_SESSION['pass']=$pass;
			header("location:customerlogin.php");

		}







	?>

</body></center>
</html>