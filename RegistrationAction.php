<?php
session_start()
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
</head>
<body>

	<h1>Please Login</h1>
		
		<a href="Login.php"> login </a>

	<?php 
			
			$hostname = "localhost";
	$username = "user_3";
	$password = "423";
	$dbname = "registration";

	$conn1 = mysqli_connect($hostname, $username, $password, $dbname);

		if($_SERVER['REQUEST_METHOD'] == "POST") {
			
			if(empty($_POST['fname']) && empty($_POST['lname']) && empty($_POST['gender']) && empty($_POST['mail']) && empty($_POST['username']) && empty($_POST['password']) && empty($_POST['recemail'])) {
				echo "Please fill up the form";
			} 
			else {
				$fname = $_POST['fname'];
				$lname = $_POST['lname'];
				$gender = $_POST['gender'];
				$mail = $_POST['mail'];
				$username = $_POST['username'];
				$password = $_POST['password'];
				$Remail = $_POST['recemail'];
				$sql ="insert into userinfo('','{$fname}','{$lname}','{$gender}','{$mail}','{$username}','{$password}','{$Remail}')";
		    $result = mysqli_query($conn1,$sql);
		    if($result)
		    {
			   echo "inserted!";
		    }
		    else
		    {
			echo "not inserted";

            }
		}
	}
	mysqli_close($conn1);
			}
		}
	?>

</body>
</html>