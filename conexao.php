<?php
$host='127.0.0.1:3306';
$user='root';
$pass='root';
$dataBase='db_vuln';

$conexao = new mysqli($host,$user,$pass,$dataBase);

$query = "SELECT * FROM mensagem";
$consulta_msg = mysqli_query($conexao,$query);


/* foreach($consulta_msg as $dado){
	echo $dado['mensagem'];
} */
?>
