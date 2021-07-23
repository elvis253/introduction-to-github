
<!DOCTYPE html>
<?php session_start();
//$_SESSION['gob'];
?>
<html>
<head>
	<title>login</title>
	</head>
	<body>
		<form action="depositedata.php" method="post">
			<fieldset>
				<legend>DEPOSITE</legend>
				<table>
					<tr>
						<td>
							<label for="amount">ENTER AMOUNT</label>

						</td>
						<td>
							<input type="number" id="amount" name="amount">
						</td>
					</tr>
				<br>

				<?php
				if(isset($_SESSION['amounterro'])){
					echo $_SESSION['amounterro'];
				}

				 ?>

				</table>
				 <input type="submit">
			</fieldset>
		</form>
	</body>
	</html>

						
				
				
					

				
				
				
				
			