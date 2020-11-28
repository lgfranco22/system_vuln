<?php
session_start();
if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
	header("Location:teste.php");
}
else{
require 'conexao.php';
?>
<!doctype html>
<html>
	<style>
		body{
		        background-color:black;
		        color:white;
		}
	</style>
	<center>
		<h1>Area Restrita</h1>
		<hr>
		<form method="post">
			usuario<br>
			<input type="text" name="user"><br>
			senha<br>
			<input type="password" name="pass"><br><br>
			<input type="submit" value="Entrar"><br>
		</form>
	</center>
<br>
<hr>
<?php
	if(isset($_POST['user'])){
		$user = $_POST['user'];
		$pass = md5($_POST['pass']);

		$query = "select * from usuarios where user = '$user' and password = '$pass'";

		$consulta = mysqli_query($conexao,$query);

		if(mysqli_num_rows($consulta) == 1){

	        session_start();
        	$_SESSION['login'] = true;
		$_SESSION['user'] = $user;

	        header('location:teste.php');
	}
	else{
        	header('location:index.php?erro');
	}
}
if(isset($_GET['erro'])){
	echo "<center style='color:red;'>erro no usuario ou senha</center>";
}
echo "</html>";
}
?>
