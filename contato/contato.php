<?php

include 'conecta.php';

header('Content-Type: text/html; charset=utf-8');

    $nome = $_POST["nome"];
    $email = $_POST["email"];
	$celular = $_POST["celular"];
	$mensagem = $_POST["mensagem"];
	
	

	mysqli_select_db($conecta, "aps") or print(mysqli_error());

	$sql = "INSERT INTO `tb_contato` (`nome`,`email`, `celular`,`mensagem`, `dt_envio`) 
			VALUES ('$nome','$email', '$celular','$mensagem', CURRENT_TIMESTAMP )";



	header("location:../index.php#contact");
	
	
	mysqli_query($conecta, $sql);

	mysqli_close($conecta); 

?>