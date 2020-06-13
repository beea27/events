<?php
    include 'conecta.php';
    
    //header('Content-Type: text/html; charset=utf-8');
    //Meta Charset no Arquivo (UFT-8)
    $cpf = $_GET['cpf'];
    mysqli_select_db($conecta,"aps") or
    print(mysqli_error());
    
    $nome = $_GET["nome"];
    $status = $_GET["status"];
    $sobrenome = $_GET["sobrenome"];
    $dt_nasc = $_GET["dt_nascimento"];
    $cargo = $_GET["cargo"];
    $estado_civil = $_GET["estado_civil"];
    $sexo = $_GET["sexo"];
    $cep = $_GET["cep"];
    $estado = $_GET["estado"];
    $cidade = $_GET["cidade"];
    $bairro = $_GET["bairro"];
    $logradouro = $_GET["logradouro"];
    $numero = $_GET["numero"];
    $complemento = $_GET["complemento"];
    $email = $_GET["email"];
    $senha = $_GET["senha"];
    
    $sql = "UPDATE `tb_funcionario`
               SET nome = '$nome',
                   dt_nasc = '$dt_nasc',
                   status = '$status',
                   cargo = '$cargo',
                   estado_civil = '$estado_civil',
                   sexo = '$sexo',
                   cep = '$cep',
                   estado = '$estado',
                   cidade = '$cidade',
                   bairro = '$bairro',
                   logradouro = '$logradouro',
                   numero = '$numero',
                   complemento = '$complemento',
                   email = '$email',
                   senha = '$senha'
            WHERE cpf = '$cpf'";    
   
    //echo $sql;
    mysqli_query($conecta,$sql);
    header("location:tb_funcionario.php");   
    //encerra a conexão.
    mysqli_close($conecta);
?>