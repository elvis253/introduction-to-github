
<!DOCTYPE html>
<?php
session_start();
?>
<html>
<head>
	<title>new employee registration form</title>
	</head>
	
	<body>
		
		<form action="new employee registration formdata.php" method="post">
		<fieldset>
			<legend>new employee registration form</legend>
			
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
					<?php if(isset($_SESSION['fnameerror'])){
						echo  $_SESSION['fnameerror'];
					}
					?>
					<br>
					</td>
					<td>
						<label for="phone">Phone number:</label>
					<br>
					<input type="tel" id="phone" name="phone" required>
					<?php
					if(isset($_SESSION['phoneerror'])){
						echo $_SESSION['phoneerror'];
					}
					if(isset($_SESSION['phonelengtherror'])){
						echo $_SESSION['phonelengtherror'];
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
					<?php if(isset($_SESSION['lnameerror'])){
						echo  $_SESSION['lnameerror'];
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
					if(isset($_SESSION['idnoerror'])){
						echo  $_SESSION['idnoerror'];
						if(isset($_SESSION['idlengtherror'])){
						echo  $_SESSION['idlengtherror'];
					}
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
				<tr>
					<td>
						<label for="acount">Acount number:</label>
					<br>
					<input type="text" id="acount" name="acount"  required>
					<?php
					if(isset($_SESSION['acountnoerror'])){
						echo $_SESSION['acountnoerror'];
					}
					if(isset($_SESSION['acountlengtherror'])){
						echo $_SESSION['acountlengtherror'];
					}
					?>
					<br>
					</td>
					<td>
						<label for="county">County:</label>
					<br>
					<input type="text" id="county" name="county"  required>
					<?php 
					if(isset($_SESSION['countyerror'])){
						echo $_SESSION['countyerror'];}
						?>
					<br>

					</td>
				</tr>
				<tr>
					<td>
						<label for="bankname">Bank name:</label>
					<br>
					<input type="text" id="bankname" name="bankname"  required>
					<?php if(isset($_SESSION['banknameerror'])){
						echo $_SESSION['banknameerror'];
					}
					?>
					<br>
					</td>
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
						<label for="posta">Postal adress:</label>
					<br>
					<input type="number" id="posta" name="posta"  required>
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
					if(isset($_SESSION['login'])){
						echo $_SESSION['login'];
						//echo  $SESSION['acountno'];
	
					}
					?>
					<?php 
					if(isset($_SESSION['exist'])){
						echo $_SESSION['exist'];
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