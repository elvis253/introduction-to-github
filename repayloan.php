
<!DOCTYPE html>
<?php session_start();
?>
<html>
<head>
	<title>payloan</title>
	</head>
	<body>
		<form action="depositedata.php" method="post">
			<fieldset>
				<legend>REPAY LOAN</legend>
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
			</fieldset>
		</form>
	</body>
	</html>

						
				
				
					

				
				
				
				
			</table>
			<input type="submit" name=submit>
			</fieldset>
		</form>
	</body>

</html>