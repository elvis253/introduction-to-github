
<!DOCTYPE html>
<?php session_start();
?>
<html>
<head>
	<title>repayloan</title>
	</head>
	<body>
		<?php
		$loanrepay=$_POST['amount'];
		$idno=$_SESSION['glob'];



		$dateofloanpayment=date('Y-m-d',time());
		$timeofloanpayment=date('H:i:s',time());
		if(!preg_match("/^[0-9]*$/",$loanrepay)){
			$_SESSION['amounterro']="only numeric values are allowed";
			header("location:repayloan.php");
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
		
			$select="SELECT * FROM customerinfo WHERE idno=$idno";
		$result=$conn->query($select);
		if($result->num_rows>0){
			while($row=$result->fetch_assoc()){

				$curentloan=$row['loan'];
				$curentacountbal=['acount'];
				if($loanrepay<=$curentacountbal){
					if($loanrepay>=$curentloan){
						$newacountbal=$curentacountbal-$loanrepay;
						$overflow=$loanrepay-$curentloan;
						$acountbalanceafterloanpay=$newacountbal+$overflow;
						$sql="INSERT INTO deposite (idno,amountdeposited,dateofservice	,timeofservice,sentamount,widthrewamount,loan	,acountbal,	receivedfrom,sentto,receivedamount,loanrepayment) VALUES($idno,0,'$dateofdeposite','$timeofdeposite',0,0,0,$acountbalanceafterloanpay,0,0,0,$loanrepay) ";
						if($conn->query($sql)===TRUE){
			$updates= "UPDATE customerinfo SET acount=$acountbalanceafterloanpay,loan=0 WHERE id=$idno";

                 if ($conn->query($updates) === TRUE) {
  
				
				$_SESSION['loanrepaymessage']=$loanrepay." have been deducted to repay your loan. An overpayment of".$overflow." has been added to your acount, loan balance is 0"." acount balance is ".$acountbalanceafterloanpay;
			header("location:customerhome.php");
		}
	}



					}
					if($loanrepay<$curentloan){

						$acountbalance=$curentacountbal-$loanrepay;
						$loanbalance=$curentloan-$loanrepay;

						$sql2="INSERT INTO deposite (idno,amountdeposited,dateofservice	,timeofservice,sentamount,widthrewamount,loan	,acountbal,	receivedfrom,sentto,receivedamount,loanrepayment) VALUES($idno,0,'$dateofdeposite','$timeofdeposite',0,0,$loanbalance,$acountbalance,0,0,0,$loanrepay) ";
						if($conn->query($sql2)===TRUE){
			$updates2= "UPDATE customerinfo SET acount=$acountbalance,loan=$loanbalance WHERE id=$idno";

                 if ($conn->query($updates) === TRUE) {
                 	$_SESSION['loanrepayme']=$loanrepay." have been deducted from your acount to repay your loan.loan balance is ".$loanbalance." acount balance is ".$acountbalance;
			header("location:customerhome.php");

					}
					
					



				}else{
					$_SESSION['unsuf']="cant process your request. your account is unsificient to repay".$loanrepay." your loan balance is ".$curentloan." acount balance is ".$curentacountbal;

				}
				

		
				
	

			
		?>
				
				
				
			
	</body>

</html>