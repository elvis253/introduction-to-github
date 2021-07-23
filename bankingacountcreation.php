
<!DOCTYPE html>
<?php
session_start();
?>
<html>
<head>
	<title>CREATE PESA ONLINE BANKING ACOUNT</title>
	</head>
	
	<body>
		
		<form action="bankingacountcreationdata.php" method="post">
		<fieldset>
			<legend>PESA ONLINE BANK ACOUNT CREATION</legend>
			
			<table>
				<tr>
					<th>Personal information</th>
					<th>Your address</th>
				</tr>
				<tr>
					<td>
						<label for="fname">First name:</label>
			<br>
					<input type="text" id="fname" name="fname" value="Elvis" required>
					<?php if(isset($_SESSION['fnameerro'])){
						echo  $_SESSION['fnameerro'];
					}
					?>
					<br>
					</td>
					<td>
						<label for="phone">Phone number:</label>
					<br>
					<input type="tel" id="phone" name="phone" required>
					<?php
					if(isset($_SESSION['phoneerro'])){
						echo $_SESSION['phoneerro'];
					}
					if(isset($_SESSION['phonelengtherro'])){
						echo $_SESSION['phonelengtherro'];
					}
					?>
					<br>
					</td>
				</tr>
				<tr>

					<td>
						<label for="lname">Last name:</label>
					<br>
					<input type="text" id="lname" name="lname" value="Araka" required>
					<?php if(isset($_SESSION['lnameerro'])){
						echo  $_SESSION['lnameerro'];
					}
					?>
					<br>
					</td>
					<td>
						<label for="email">Email address:</label>
					<br>
					<input type="email" id="email" name="email"required>
					
					<br>
					</td>
				</tr>
				<tr>
					<td>
						<label for="idno">ID number:</label>
					<br>
					<input type="number" id="idno" name="idno" required>
					<br>
					<?php 
					if(isset($_SESSION['idnoerro'])){
						echo  $_SESSION['idnoerro'];
					}
					?>
					<?php
						if(isset($_SESSION['idlengtherro'])){
						echo  $_SESSION['idlengtherro'];
					}
					?>
					 
					
					</td>
					<td>
						<label for="nationalty">Nationality:</label>
					<select id="nationality" name="nationality"  required>
						<option value="Kenya">Kenya</option>
						<option value="Uganda">Uganda</option>
						<option value="Tanzania">Tanzania</option>
						<option value="Somalia">Somalia</option>
						<option value="Sudan">Sudan</option>
						<option value="Ethipia">Ethiopia</option>
					</select>
					<br>
					</td>

				</tr>
				<td></td>
					
				
					<td>
						<label for="city">City:</label>
					<br>
					<input type="text" id="city" name="city"  required>
					<br>
					</td>

				</tr>
				<tr>
					<td>
						<label for="dob">Date of birth:</label>
					<br>
					<input type="date" id="dob" name="dob"  required>
					<br>
					</td>
					<td>
						<label for="county">COUNTY:</label>
					<br>
					<input type="text" id="county" name="county"  required>
					<br>
					</td>
					
				</tr>
				<tr>
					<td>
						<label for="maritalstatus">Marital status:</label>
					<select id="maritalstatus" name="maritalstatus"  required>
						<option value="maried">Maried</option>
						<option value="single">single</option>
						<option value="divorced">Divorced</option>
					</select>
					<br>
					</td>
				</tr>
				<tr>
					<?php 
					if(isset($_SESSION['exists'])){
						echo $_SESSION['exists'];
					}
					?>
					<?php
					if(isset($_SESSION['loginn'])){
						echo $_SESSION['loginn'];
						//echo  $SESSION['acountno'];
	
					}
					?>
					<?php
					if(isset($_SESSION['mailing'])){
						echo $_SESSION['mailing'];
					}
					 ?>
					 <?php if(isset($_SESSION['mailingerro'])){
					 echo $_SESSION['mailingerro'];
					}
					?>
					
				</tr>

				<?php
				session_destroy();
				?>
			</table>
			<label for="submit">SUBMIT:</label>
			<input type="submit" >
		</fieldset>
	</form>
</body>
</html>