<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
if(isset($_SESSION['login']) && !empty($_SESSION['login'])){
	require 'conexao.php';
echo "<br>";
echo "Seja bem vindo: " . $_SESSION['user'];
?>


<form method="post">
mensagem<br>
<input type="text" name="msg"><br>
<input type="submit" value="cadastrar">
</form>
<br>
<br>
<a href="?delete">Limpar</a>
<a href="?logout">Sair</a>
<br>
<br>
<br>

<?php

function update(){
	header("Location:teste.php");
}

if(isset($_GET['logout'])){
	unset($_SESSION['login']);
	unset($_SESSION['user']);
	header("Location:index.php");
	exit();
}

if(isset($_GET['delete'])){
	$query = "DELETE FROM mensagem";
        mysqli_query($conexao, $query);
	update();
}

if(isset($_POST['msg'])){
        $msg = $_POST['msg'];
	$query = "INSERT INTO mensagem (mensagem) values('$msg')";
        mysqli_query($conexao, $query);
        update();
}
	foreach($consulta_msg as $dado){
        	echo $dado['mensagem']."<br><hr><br>";
	}

}
else{
header("Location:index.php");
exit();
}
?>

