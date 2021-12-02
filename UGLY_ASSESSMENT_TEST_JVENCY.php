<?php
	session_start();
	date_default_timezone_set('Asia/Kolkata');
	if(isset($_POST['submit']))
	{		
			$_SESSION[$_POST['submit']] = date("H:i:s", time());
			if($_POST['submit'] == "Login")
			{
				if(isset($_SESSION['login_attempt']))
					$_SESSION['login_attempt'] += 1;
				else
					$_SESSION['login_attempt'] = 1;
				$_SESSION['Logout'] = null;
			}	

	
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>UGLY</title>
	<style type="text/css">
		*{
			margin: 0;
			background-color: #333;
			font-family: monospace;
		}
		.container{
			width: 100%;
			display: grid;
			grid-template-columns: 1fr 1fr;

		}

		.btn{
			margin: 40% auto;
			width: 25vw;
			height: 10vh;
			line-height: 2rem;
			border: none;
			font-size: 2rem;
			border-radius: 20px;
			box-shadow: 2px 10px 5px #000;
		}

		.btn:hover{
			background: linear-gradient(90deg, rgba(0, 0, 0, 0.3), rgba(9, 9, 9, 0.3));
			color: #fff;
		}

		h1{
			color: #fff;
		}

		table{
			width: 100vw;
			color: #fff;
			text-align: center;
		}
		h3{
			text-align: center;
		}
	</style>
</head>
<body>
		<form action="" method="POST">
	<div class="container">
		<input type="submit" class="btn" name="submit" style="background-color: #5f9" value="Login">
		<input type="submit" class="btn" name="submit" style="background-color: #f55" value="Logout">
	</div>
		</form>

		<?php

			if(isset($_SESSION['Login']) && isset($_SESSION['Logout']))
			{
					echo "<table border=1;>";
					echo "<tr><th>Login Time</th><th>Logout Time</th><th>Difference</th></tr>";
						echo "<tr>";
						echo "<td>" . $_SESSION['Login'] . "</td>";
						
						echo "<td>" . $_SESSION['Logout'] . "</td>";
						$start = new DateTime($_SESSION['Login']);
						$end = new DateTime($_SESSION['Logout']);
						echo "<td>" . $start->diff($end)->format('%h:%i:%s') . "</td>";
						echo "</tr>";
				
					echo "</table>";

					echo "<h3 style='color:#fff;'>";
					echo "Total Login Attempts: " . $_SESSION['login_attempt'];
					echo "</h3>";

			}
		?>
</body>
</html>

