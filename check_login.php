<?php
session_start();

$error=''; //Variable to Store error message;
if(isset($_POST['submit'])){
	if(empty($_POST['user']) || empty($_POST['pass'])){
		$error = "Username or Password is Invalid";
	}
	else
	{
		//Define $user and $pass
		$user=$_POST['user'];
		$pass=$_POST['pass'];
		//Establishing Connection with server by passing server_name, user_id and pass as a patameter
		$conn = mysqli_connect("localhost", "root", "97b8467b2b");
		//Selecting Database
		$db = mysqli_select_db($conn, "bd_correspondencia");
		//sql query to fetch information of registerd user and finds user match.
		$query = mysqli_query($conn, "SELECT idusuario FROM usuario WHERE passwordUsuario='$pass' AND correoUsuario='$user'");
		
		
		
		$rows = mysqli_num_rows($query);
		
		if($rows == 1){
			
			header('Location: home.php');
			$_SESSION['usuario'] = $user;

			} elseif (($user == null) or ($pass == null)) {

            echo "<script type=\"text/javascript\">alert(\"Usuario y/o password incorrectos\");</script>";
        }
		else
		{
			$error = "Username of Password is Invalid";

			echo "<script type=\"text/javascript\">alert(\"Usuario y/o password incorrectos\");</script>"; 
	
		}
		mysqli_close($conn); // Closing connection
	}
}


?>