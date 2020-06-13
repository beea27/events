<?php
    mysqli_select_db($conecta,'aps') or
    print(mysqli_error());
    
    $sql = 'SELECT  nome FROM `tb_funcionario`';    
    
    $result=mysqli_query($conecta,$sql);
?>