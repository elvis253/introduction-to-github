
<!DOCTYPE html>
<?php session_start();
//$idno=$_SESSION['kevalue'];
?>
<html>
<head>
	<title>login</title>
	</head>
	<body>
		<?php
		$deposite=$_POST['amount'];


		//if(isset($_SESSION['kevalue'])){
		$idno=$_SESSION['kevalue'];
		//echo $idno;
		//echo "<br>";
		//echo $deposite;
		
		



		$dateofdeposite=date('Y-m-d',time());
		$timeofdeposite=date('H:i:s',time());
		if(!preg_match("/^[0-9]*$/",$deposite)){
			$_SESSION['amounterro']="only numeric values are allowed";
			header("location:deposite.php");
			exit();

		}

		$servername="localhost";
		$username="elvis";
		$password="E37081438a.";
		$dbname="kagledata";

		$conn=new mysqli($servername,$username,$password,$dbname);
		if($conn->connect_error){
			die("connection failed".$conn->connect_error);
		}
		
			$select1="SELECT acount FROM customerinfo WHERE idno=$idno";
		$result1=$conn->query($select1);
		if($result1->num_rows > 0){
			while($row=$result1->fetch_assoc()){

				$curentamount=$row["acount"];
				//echo "<br>";

				$newamount=$curentamount+$deposite;
				//echo $curentamount;
				//echo "<br>".$deposite;
				$sentamount=0;
				$widthrewamount=0;
				$loan=0;
				$from="0";
				$to="0";
				$reamo=0;
				$loanrep=0;
				$sql="INSERT INTO deposite (idno,amountdeposited,dateofservice	,timeofservice,sentamount,widthrewamount,loan	,acountbal,receivedfrom,sentto,receivedamount,loanrepayment		) VALUES($idno,$deposite,'$dateofdeposite','$timeofdeposite',$sentamount,$widthrewamount,$loan,$newamount,'$from','$to',$reamo,$loanrep) ";
				if($conn->query($sql)===TRUE){
					//echo "<br>insertion succesful<br>";
					//echo $newamount;

			$updates1= "UPDATE customerinfo SET acount=$newamount WHERE idno=$idno";
			if ($conn->query($updates1) === TRUE) {

				//echo "<br> updated";

				$_SESSION['depomessage']="you have successfully deposited KSH".$deposite." your acount balance is KSH".$newamount;
			header("location:cushome.php");
			}
			}
			}
		}
		
				
				

			
		
		?>
	
				
				
				
			
	</body>

</html>