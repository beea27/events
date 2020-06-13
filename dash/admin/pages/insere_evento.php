
<?php

include 'conecta.php';

//header('Content-Type: text/html; charset=utf-8');

	$nome = $_POST["nome"];
	$descricao = $_POST["descricao"];
	$status = 'Ativo';
	$categoria = $_POST["categoria"];
	$link_compra = $_POST["link_compra"];
	$dt_evento = $_POST["dt_evento"];
	$hr_evento = $_POST["hr_evento"];
	$classificacao = $_POST["classificacao"];
	$cep = $_POST["cep"];
	$estado = $_POST["estado"];
	$cidade = $_POST["cidade"];
	$bairro = $_POST["bairro"];
	$logradouro = $_POST["logradouro"];
	$numero = $_POST["numero"];
	$complemento = $_POST["complemento"];

	$arquivo = $_FILES["imagem"]["tmp_name"];
	$tamanho = $_FILES["imagem"]["size"];

	if($arquivo != "none"){
  	$fp = fopen($arquivo, "rb");
  	$conteudo = fread($fp, $tamanho);
  	$conteudo = addslashes($conteudo);
	  fclose($fp);
	}
	

	mysqli_select_db($conecta, "aps") or print(mysqli_error());
	
	
	

	

	$sql = "INSERT INTO `tb_evento` (`nome`,`status`, `descricao`,`categoria`,`link_compra`,`dt_evento`, `hr_evento`,`classificacao`,`cep`, `estado`,`cidade`,`bairro`,`logradouro`,`numero`,`complemento`,`imagem`) 
			VALUES ('$nome','$status','$descricao','$categoria','$link_compra','$dt_evento', '$hr_evento','$classificacao','$cep','$estado','$cidade','$bairro','$logradouro','$numero','$complemento', '$conteudo')";

	
	header("location:tb_evento.php");

	
	
	mysqli_query($conecta, $sql);

	mysqli_close($conecta); 

?>