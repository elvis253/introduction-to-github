<!DOCTYPE html>
<?php session_start();
?>
<html>
<head>
	<title>login</title>
	</head>
	<body>
		<form action="withdrwacash.php" method="post">
			<fieldset>
				<legend>WITHDRAW CASH</legend>
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
				
				
				</table>
				<input type="submit">
			</fieldset>
		</form>
	</body>
	</html>
	
