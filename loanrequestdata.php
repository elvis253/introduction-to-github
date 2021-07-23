
<!DOCTYPE html>
<?php session_start();
?>
<html>
<head>
	<title>loanrequest</title>
	</head>
	<body>
		<?php
		$loan=$_POST['amount'];
		$idno=$_SESSION['kevalue'];



		$dateofloan=date('Y-m-d',time());
		$timeofloan=date('H:i:s',time());
		if(!preg_match("/^[0-9]*$/",$loan)){
			$_SESSION['amounterr']="only numeric values are allowed";
			header("location:loanrequest.php");
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
		
			$select="SELECT * FROM customerinfo WHERE idno=$idno";
		$result=$conn->query($select);
		if($result->num_rows>0){
			while($row=$result->fetch_assoc()){
				$dateofreg=$row['dateofregistration'];
				$loanbal=$row['loan'];
				$acou=$row['acount'];
				$period=date('Y',time())-date('Y',strtotime('$dateofreg'));
				if($period<2){
					$_SESSION['loanlimit']="your loan limt is zero continue saving to increase your loan limit";
					header("location:cushome.php");

					exit();
				}
				if($period>2 ){
					if($loanbal>0){
						$_SESSION['existloan']="You have an existing loan of ".$loanbal." please settle your loan balance before accessing next loan";
						header("location:cushome.php");

						exit();
					}
					if($loanbal==0){
						$newacount=$acou+$loan;
					$update= "UPDATE customerinfo SET acount=$newacount,loan=$loan WHERE idno=$idno";

                 if ($conn->query($update) === TRUE) {

                 	$sql="INSERT INTO deposite (idno,amountdeposited,dateofservice	,timeofservice,sentamount,widthrewamount,loan	,acountbal,receivedfrom,sentto,receivedamount,loanrepayment		) VALUES($idno,0,'$dateofloan','$timeofloan',0,0,$loan,$newacount,'0','0',0,0) ";

		if($conn->query($sql)===TRUE){
			
  
				
				$_SESSION['loanmessage']="you have succefully received a loan of KSH".$loan." your loan balance is KSH".$newacount;
			header("location:cushome.php");
		}

                 }

					}
						


					
					

				}
					

				

				
				
	}
				
	

			}
			
		
		?>
				
				
				
			
	</body>

</html>