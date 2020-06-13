<?php
    include 'conecta.php';
    
    //header('Content-Type: text/html; charset=utf-8');
    //Meta Charset no Arquivo (UFT-8)
    $id_evento = $_POST['id_evento'];

    mysqli_select_db($conecta,"aps") or
    print(mysqli_error());
    
    
    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $categoria = $_POST["categoria"];
    $status = $_POST["status"];   
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

	if($arquivo == ''){
        $sql = "UPDATE `tb_evento`
        SET nome = '$nome',
            descricao = '$descricao',
            status = '$status',
            categoria = '$categoria',
            link_compra = '$link_compra',
            dt_evento = '$dt_evento',
            hr_evento = '$hr_evento',
            classificacao = '$classificacao',
            cep = '$cep',
            estado = '$estado',
            cidade = '$cidade',
            bairro = '$bairro',
            logradouro = '$logradouro',
            numero = '$numero',
            complemento = '$complemento'
     WHERE id_evento = '$id_evento'";  
	}else{

    if($arquivo != "none"){
    $fp = fopen($arquivo, "rb");
    $conteudo = fread($fp, $tamanho);
    $conteudo = addslashes($conteudo);
    fclose($fp);}

    $sql = "UPDATE `tb_evento`
    SET nome = '$nome',
        descricao = '$descricao',
        status = '$status',
        categoria = '$categoria',
        link_compra = '$link_compra',
        dt_evento = '$dt_evento',
        hr_evento = '$hr_evento',
        classificacao = '$classificacao',
        cep = '$cep',
        estado = '$estado',
        cidade = '$cidade',
        bairro = '$bairro',
        logradouro = '$logradouro',
        numero = '$numero',
        complemento = '$complemento',
        imagem = '$conteudo'
    WHERE id_evento = '$id_evento'";  
    }
    
  
   
    
    mysqli_query($conecta,$sql);
    header("location:tb_evento.php");   
    //encerra a conexão.
    mysqli_close($conecta);
?>