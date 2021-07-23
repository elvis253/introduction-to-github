
<!DOCTYPE html>
<?php session_start();
?>
<html>
<head>
	<title>login</title>
	</head>
	<body>
		<?php
		
		$receiver=$_POST['reciver'];
		$receiverid=$_POST['id'];
		$sent=$_POST['send'];


		$idno=$_SESSION['kevalue'];
		echo $idno;
		$transactioncost=0;



		$dateofsend=date('Y-m-d',time());
		$timeofsend=date('H:i:s',time());
		if(!preg_match("/^[0-9]*$/",$sent)){
			$_SESSION['senterr']="only numeric values are allowed";
			header("location:sendmoney.php");
			exit();

		}

		if(!preg_match("/^[0-9]*$/",$receiver)){
			$_SESSION['acountnoer']="only numeric values are allowed";
			header("location:sendmoney.php");
			exit();
		}
		
			$acountlength=strlen((string)$receiver);
			if($acountlength<12 || $acountlength>13){
				$_SESSION['acountlength']="acount must have 12 digits";
				header("location:sendmoney.php");
				exit();
			}
			if(!preg_match("/^[0-9]*$/",$receiverid)){
			$_SESSION['idnoerro']="only numeric values are allowed";
			header("location:sendmoney.php");
			exit();

		}
		
			$idlength=strlen((string)$receiverid);
			if($idlength!=8){
				$_SESSION['idlengtherro']="id must have 8 digits";
				header("location:sendmoney.php");
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
		if($idno==$receiverid ){
			$_SESSION['toself']="you cant send money to your own acount";
			header("location:cushome.php");
			exit();
		}


		$sending="SELECT fname,lname,acount FROM customerinfo WHERE acountno=$receiver AND idno=$receiverid";
		$result1=$conn->query($sending);
		if($result1->num_rows<0){
			$_SESSION['nonexistingacount']="the acount number ".$receiver." or ID number ".$receiverid." does not exist";
			header("location:cushome.php");
			exit();

		}
		if($result1->num_rows>0){
			while($row=$result1->fetch_assoc()){
				$receivername=$row['fname']." ".$row['lname'];
				//echo $receivername;
				$receivercurentacount=$row['acount'];
				//echo "<br>".$receivercurentacount;
				$newreceiveracount=$receivercurentacount+$sent;
			

				$receivedfrom="SELECT fname,lname,acount FROM customerinfo WHERE   idno=$idno";
		$receivedfrom1=$conn->query($receivedfrom);
		if($receivedfrom1->num_rows<0){
			$_SESSION['procesfai']="process failed please try again";
			header("location:cushome.php");
			exit();

		}

		if($receivedfrom1->num_rows>0){
			while($row=$receivedfrom1->fetch_assoc()){
				$sender=$row['fname']." ".$row['lname'];
				//echo "<br>".$sender;
				$senseracount=$row['acount'];
				//echo "<br>".$senseracount;
				//echo "<br>".$idno;
				if($senseracount<$sent){
					$_SESSION['insufsentamount']="you have insuficient amount to send KSH".$sent." please top up your acount ,your acount balance is KSH".$senseracount;
					header("location:cushome.php");
					exit();
				}
				$updates= "UPDATE customerinfo SET acount=$newreceiveracount WHERE idno=$receiverid AND acountno=$receiver";
				
				if ($conn->query($updates) === TRUE) {
					$sql1="INSERT INTO deposite (idno,amountdeposited,dateofservice	,timeofservice,sentamount,widthrewamount,loan	,acountbal,receivedfrom,sentto,receivedamount,loanrepayment	) VALUES($receiverid,0,'$dateofsend','$timeofsend','0',0,0,$newreceiveracount,'$sender','0',$sent,0) ";

					
					
						$select="SELECT acount FROM customerinfo WHERE idno=$idno";
                 	$result=$conn->query($select);
                 	if($result->num_rows>0){
                 		while($row=$result->fetch_assoc()){
                 			$curentamount=$row['acount'];
                 			$newamount=$curentamount-$sent;
                 			$sql="INSERT INTO deposite (idno,amountdeposited,dateofservice	,timeofservice,sentamount,widthrewamount,loan	,acountbal,receivedfrom,sentto,receivedamount,loanrepayment	) VALUES($idno,0,'$dateofsend','$timeofsend',$sent,0,0,$newamount,'0','$receivername',0,0) ";
                 			
                 			if($conn->query($sql)===TRUE){
                 				if($sent>=0 && $sent<=50000){
                		$transactioncost=$sent*0.1;
                		$prof="INSERT INTO transactionprofits(sendingprofit,withdrawprofit,loanprofit) VALUES($transactioncost,0,0)";
                		if($conn->query($prof)===TRUE){
                			$_SESSION['deduction']="<br>A transaction coast of KSH".$transactioncost." have been deducted";
                			header("location:cushome.php");
                			
                		}
                		$selepro1="SELECT sendpro FROM bankamounts";
                		$bankprofiting1=$conn->query($selepro1);
                			if($bankprofiting1->num_rows>0){
                				while($row=$bankprofiting1->fetch_assoc()){
                					$curentsendpro1=$row['sendpro'];
                					$newsendpro1=$curentsendpro1+$transactioncost;
                					$newsenderacount=$newamount-$transactioncost;

                					$updatepro1="UPDATE bankamounts SET sendpro=$newsendpro1";
                					if($conn->query($updatepro1)===TRUE){
                						$updates= "UPDATE customerinfo SET acount=$newsenderacount WHERE idno=$idno";
                						if ($conn->query($updates) === TRUE) {
                							$_SESSION['sent']="you have successfully sent KSH ".$sent." to ". $receivername." your acount balance is KSH".$newsenderacount;
			header("location:cushome.php");

                						}
                					}

                				}
                			}


                	}//
                 				

                
                	
                	if($sent>50000){
                		$transactioncosted=$sent*0.2;
                		$prof2="INSERT INTO transactionprofits(sendingprofit,withdrawprofit,loanprofit) VALUES($transactioncosted,0,0)";
                		if($conn->query($prof2)===TRUE){
                			$_SESSION['deduction2']="<br>A transaction coast of KSH".$transactioncosted." have been deducted";
                			header("location:cushome.php");
                		$selepro="SELECT sendpro FROM bankamounts";
                		$bankprofiting=$conn->query($selepro);
                			if($bankprofiting->num_rows>0){
                				while($row=$bankprofiting->fetch_assoc()){
                					$curentsendpro=$row['sendpro'];
                					$newsendpro=$curentsendpro+$transactioncost;
                					$newsenderacount1=$newamount-$transactioncosted;
                					$updatepro="UPDATE bankamounts SET sendpro=$newsendpro";
                					if($conn->query($updatepro1)===TRUE){
                						$updatesw= "UPDATE customerinfo SET acount=$newsenderacount1 WHERE idno=$idno";
                						if ($conn->query($updatesw) === TRUE) {
                							$_SESSION['sentv']="you have successfully sent KSH ".$sent." to ". $receivername." your acount balance is KSH".$newsenderacount1;
			header("location:cushome.php");
                					}

                				}
                			}
                		


                	}
  
				
				

                 			}

                 			
                 		}


                 	}
                 }

					}


					

				}


				}

				


				
                 


                 	
                 		

		
			
		//}
	//}
				
	
//
			//}
			
		}
	}
}






  
				
				
		//}

				//}

				
			//}
		//}
//

			//}
		

		
			
		?>
				
				
				
			
	</body>

</html>