
<!DOCTYPE html>
<?php session_start();
?>
<html>
<head>
	<title>sendmoney</title>
	</head>
	<body>
		<form action="sendmoneydata.php" method="post">
			<fieldset>
				<legend>sendmoney</legend>
				<table>
					<tr>
						<td>
							<label for="reciver">ENTER ACOUNT NUMBER OF THE RECCEIVER</label>

						</td>
						<td>
							<input type="number" id="reciver" name="reciver">
						</td>
					</tr>
					<tr>
						<td>
							<label for="id">ENTER  RECCEIVER ID</label>

						</td>
						<td>
							<input type="number" id="id" name="id">
						</td>
					</tr>
					<tr>
						<td>
							<label for="send">ENTER AMOUNT</label>

						</td>
						<td>
							<input type="number" id="send" name="send">
						</td>
					</tr>
				<br>


				<?php
				if(isset($_SESSION['senterr'])){
					echo $_SESSION['senterr'];
				}
				if(isset($_SESSION['acountnoer'])){
					echo $_SESSION['acountnoer'];
				}
				if(isset($_SESSION['acountlength'])){
					echo $_SESSION['acountlength'];
				}
				if(isset($_SESSION['nonexistingacount'])){
					echo $_SESSION['nonexistingacount'];
				}
				if(isset($_SESSION['idnoerro'])){
					echo $_SESSION['idnoerro'];
				}
				if(isset($_SESSION['idlengtherro'])){
					echo $_SESSION['idlengtherro'];
				}
				


				?>


						
				
				
					

				
				
				
				
			</table>
			<input type="submit" name=submit>
			</fieldset>
		</form>
	</body>

</html>