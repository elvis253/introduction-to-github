<!DOCTYPE html>
<?php session_start();
?>
<html>
<head>
	<title>login</title>
	</head>
	<body>
		<form action="loanrequestdata.php" method="post">
			<fieldset>
				<legend>REQUEST LOAN</legend>
				<table>
					<tr>
						<td>
							<label for="amount">ENTER REQUESTED AMOUNT</label>

						</td>
						<td>
							<input type="number" id="amount" name="amount">
						</td>
					</tr>
				<br>
				<?php 
				if(isset($_SESSION['amounterr'])){
					echo $_SESSION['amounterr'];
				}

				?>
				
				</table>
				<input type="submit">
			</fieldset>
		</form>
	</body>
	</html>
	
