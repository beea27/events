
<?php

include 'conecta.php';

header('Content-Type: text/html; charset=utf-8');

	$nome = $_POST["nome"];
	$sobrenome = $_POST["sobrenome"];
	$status = 'Ativo';
	$dt_nasc = $_POST["dt_nascimento"];
	$cpf = $_POST["cpf"];
	$cargo = $_POST["cargo"];
	$estado_civil = $_POST["estado_civil"];
	$sexo = $_POST["sexo"];
	$cep = $_POST["cep"];
	$estado = $_POST["estado"];
	$cidade = $_POST["cidade"];
	$bairro = $_POST["bairro"];
	$logradouro = $_POST["logradouro"];
	$numero = $_POST["numero"];
	$complemento = $_POST["complemento"];
	$email = $_POST["email"];
	$senha = $_POST["senha"];
	

	mysqli_select_db($conecta, "aps") or print(mysqli_error());
	
	
	

	

	$sql = "INSERT INTO `tb_funcionario` (`nome`,`status`, `sobrenome`,`dt_nasc`, `cpf`,`cargo`,`estado_civil`,`sexo`,`cep`, `estado`,`cidade`,`bairro`,`logradouro`,`numero`,`complemento`,`email`,`senha`) 
			VALUES ('$nome','$status','$sobrenome','$dt_nasc', '$cpf','$cargo','$estado_civil','$sexo','$cep','$estado','$cidade','$bairro','$logradouro','$numero','$complemento','$email','$senha')";

	

	
	header("location:tb_funcionario.php");

	
	
	mysqli_query($conecta, $sql);

	mysqli_close($conecta); 

?>