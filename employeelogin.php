
<!DOCTYPE html>
<?php session_start();
?>
<html>
<head>
	<title>login</title>
	</head>
	<body>
		<form action="home.php" method="post">
			<fieldset>
				<legend>Sign in</legend>
				<table>
					<tr>
						<td>
							<label for="email">Email</label>

						</td>
						<td>
							<input type="email" id="email" name="email">
				<br>

						</td>
					</tr>
					<tr>
						<td>
							<label for="password">Password</label>

						</td>
						<td>
							<input type="password" id="password" name="password">
				<br>

						</td>
					</tr>
				
				<?php
					if(isset($_SESSION['loginfail'])){
						echo $_SESSION['loginfail'];
						//echo  $SESSION['acountno'];
	
					}
					?>
					<?php if(isset($_SESSION['emai'])){
						echo $_SESSION['emai'];
						//echo  $SESSION['acountno'];
	
					}
					?>
					<?php if(isset($_SESSION['pass'])){
						echo $_SESSION['pass'];
						//echo  $SESSION['acountno'];
	
					}
					?>
					

				<?php
				session_destroy();
				?>
				
				
				
			</table>
			<input type="submit" name=submit>
			</fieldset>
		</form>
	</body>

</html>