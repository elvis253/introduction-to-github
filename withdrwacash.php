
<!DOCTYPE html>
<?php session_start();
?>
<html>
<head>
	<title>login</title>
	</head>
	<body>
		<?php
		$withamount=$_POST['amount'];
		$idno=$_SESSION['kevalue'];



		$dateofdeposite=date('Y-m-d',time());
		$timeofdeposite=date('H:i:s',time());
		if(!preg_match("/^[0-9]*$/",$withamount)){
			$_SESSION['amounterro']="only numeric values are allowed";
			header("location:widthraw.php");
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
		
			$select="SELECT acount FROM customerinfo WHERE idno=$idno";
		$result=$conn->query($select);
		if($result->num_rows>0){
			while($row=$result->fetch_assoc()){

				$curentamount=$row['acount'];
				if($curentamount<$withamount){
					$_SESSION['insuficient']="You have insuficient amount to withdraw".$withamount;
					header("location:cushome.php");
					exit();

				} 
				if($curentamount>$withamount){
					$newamount=$curentamount-$withamount;
					if($withamount>=0 && $withamount<=50000){
                		$transactioncost=$withamount*0.1;
                		$spotacount=$newamount-$transactioncost;
                		$prof="INSERT INTO transactionprofits(sendingprofit,withdrawprofit,loanprofit) VALUES(0,$transactioncost,0)";
                		if($conn->query($prof)===TRUE){
                			$_SESSION['deductionw']="<br>A transaction coast of KSH".$transactioncost." have been deducted";
                			header("location:cushome.php");
                			
                		}
                		$selepro1="SELECT sendpro FROM bankamounts";
                		$bankprofiting1=$conn->query($selepro1);
                			if($bankprofiting1->num_rows>0){
                				while($row=$bankprofiting1->fetch_assoc()){
                					$curentsendpro1=$row['widpro'];
                					$newsendpro1=$curentsendpro1+$transactioncost;
                					$updates= "UPDATE customerinfo SET acount=$spotacount WHERE idno=$idno";
                					if ($conn->query($updates) === TRUE) {


                					$updatepro1="UPDATE bankamounts SET widpro=$newsendpro1";
                					if($conn->query($updatepro1)===TRUE){
                						$_SESSION['withmessage']="you have successfully withdrawan KSH".$withamount." your acount balance is KSH".$spotacount;
			header("location:cushome.php");
                					}
                				}

                				}
                			}


                	}
                	if($withamount>50000){
                		$transactioncost2=$withamount*0.2;
                		$prof2="INSERT INTO transactionprofits(sendingprofit,withdrawprofit,loanprofit) VALUES(0,$transactioncost2,0)";
                		if($conn->query($prof2)===TRUE){
                			$_SESSION['deductionw2']="<br>A transaction coast of KSH".$transactioncost2." have been deducted";
                			header("location:cushome.php");
                		$selepro="SELECT sendpro FROM bankamounts";
                		$bankprofiting=$conn->query($selepro);
                			if($bankprofiting->num_rows>0){
                				while($row=$bankprofiting->fetch_assoc()){
                					$curentsendpro=$row['widpro'];
                					$newsendpro=$curentsendpro+$transactioncost;
                					$spotamount=$newamount-$transactioncost2;
                					$updates4= "UPDATE customerinfo SET acount=$spotamount WHERE idno=$idno";
                					if ($conn->query($updates4) === TRUE) {
                					$updatepro1="UPDATE bankamounts SET widpro=$newsendpro";
                					if($conn->query($updatepro1)===TRUE){
                						$_SESSION['withmessagek']="you have successfully withdrawan KSH".$withamount." your acount balance is KSH".$spotamount;
			header("location:cushome.php");

                				}
                			}
                	//
				
				$sql="INSERT INTO deposite (idno,amountdeposited,dateofservice	,timeofservice,sentamount,widthrewamount,loan	,acountbal,receivedfrom,sentto,receivedamount,loanrepayment	) VALUES($idno,0,'$dateofdeposite','$timeofdeposite',0,$withamount,0,$newamount,'0','0',0,0) ";

		if($conn->query($sql)===TRUE){
			

                 if ($conn->query($updates) === TRUE) {

                 	
                	
  
				
				
		}
	}
}
}
				}
			}
		}
				
				
	

			}
			
		}
		?>
				
				
				
			
	</body>

</html>