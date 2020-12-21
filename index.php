<!DOCTYPE html>
<html>

	<head>
		
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" href="css/design.css" />

	</head>

	<body>

		<?php

			include('connectFN.php');
			$con = dbconnect();
			
			session_start();
			if (isset($_POST['username'])) 
			{
				$username = stripslashes($_REQUEST['username']);
				$username = mysqli_real_escape_string($con, $username);
				$password = stripslashes($_REQUEST['password']);
				$password = mysqli_real_escape_string($con, $password);


				$query = "SELECT * FROM `users` WHERE username='$username' and password='" . md5($password) . "'";
				$result = mysqli_query($con, $query);
				$rows = mysqli_num_rows($result);

				if ($rows == 1) 
				{
					$_SESSION['username'] = $username;
					header("Location: main.php");
				} 
				else 
				{
					echo "<div class='con'>
									<h3>Username Orpassword is incorrect.</h3>
						   		<br/>
									Click here to <a href='index.php'>Login</a>
								</div>";
				}

			} 
			else 
			{
		?>


			<div class="con" style="padding-bottom: 320px">
				<div class="form">

					<form action="" method="post" name="login">
						<h1>Log In</h1>
						<input type="text"     name="username" placeholder="Username" required /><br>
						<input type="password" name="password" placeholder="Password" required /><br>
						<input name="submit"   type="submit"   value="Login"          class="btn" style="margin-left: 0px" />
						<p>Not registered yet? <a href='registration.php'>Register Here</a></p>
					</form>

				</div>
			</div>


		<?php 
			}	
		?>


	</body>

</html>