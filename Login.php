<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Log In Form</title>
</head>

<body>
   
  <?php
  $user=$password="";
  if ($_SERVER["REQUEST_METHOD"] == "POST") 
  {
         if(empty($_POST['username'])||empty($_POST['password'])){
          echo "<h2>Fill up the from</h2>";
         }
         else{
         
          $username=($_POST['username']);
          $password=($_POST['password']);
          
         
          $stmt = $conn1->prepare("select Id,Firstname,Lastname,Gender,Email,Username,Password,ReEmail from userinfo where Username= ? and Password= ?");
    $stmt->bind_param("ss", $p1,$p2);
    $p1 =$username;
    $p2=$password;
    $stmt->execute();
    $res2 = $stmt->get_result();
    $user = $res2->fetch_assoc();
          
            echo "<br>";
		echo "Id: " . $user['Id'];
        echo "<br>";
		
        echo "Firstname: " . $user['Firstname'];
        echo "<br>";
		
        echo "Lastname: " . $user['Lastname'];
        echo "<br>";
		
        echo "Gender: " . $user['Gender'];
        echo "<br>";
		
        echo "Email: " . $user['Email'];
        echo "<br>";
		
        echo "Username: " . $user['Username'];
        echo "<br>";
		
        echo "password: " . $user['Password'];
        echo "<br>";
		
        echo "Recovary Email: " . $user['ReEmail'];
        echo "<br>";
           
        
       
  }
  }
  
  $conn1->close();
  
  ?>
  
  
  


	<h2>Login Form</h2>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
	 <div>
    <label for="username"><b>Username</b></label><br>	
    <input type="text" placeholder="Enter Username" name="username" required>
    <br><br>

    <label for="password"><b>Password </b></label><br>	
    <input type="password" placeholder="Enter Password" name="password" required>
    <br><br>
        
    <button type="submit">Login</button>
    <br>
    
  </div>

  


	</form>

</body>
</html>