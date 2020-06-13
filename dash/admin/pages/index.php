<!DOCTYPE html>
<html lang='pt-br'>
<?php
include 'conecta.php';
    
    //header('Content-Type: text/html; charset=utf-8');
    //Meta Charset no Arquivo (UFT-8)
    
    mysqli_select_db($conecta,'aps') or
    print(mysqli_error());
    
    $sql = 'SELECT  nome FROM `tb_funcionario`';    
    
    $result=mysqli_query($conecta,$sql);

session_start();
if (isset($_SESSION['nome']) )
        {
            include 'header.php';
        echo"

        <div id='page-wrapper'>
            <div class='row'>
                <div class='col-lg-12'>
                    <h1 class='page-header'>Mensagens dos clientes</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class='row'>
                ";


    
    include 'conecta.php';
    
    //header('Content-Type: text/html; charset=utf-8');
    //Meta Charset no Arquivo (UFT-8)
    
    mysqli_select_db($conecta,"aps") or
    print(mysqli_error());
    
    $sql = "SELECT * FROM `tb_contato`";    
    
    $result=mysqli_query($conecta,$sql);
    


    while($consulta=mysqli_fetch_array($result))
    {
        echo "  
                <div class='col-lg-4'>
                    <div class='panel panel-primary'>
                        <div class='panel-heading'>
                            $consulta[nome]
                        </div>
                        <div class='panel-body'>
                            <p>$consulta[mensagem]</p>
                            <p></p>
                            <p>$consulta[email]</p>
                            <p>$consulta[celular]</p>
                        </div>
                        <div class='panel-footer'>
                            <p>$consulta[dt_envio]</p>  
                        </div>
                    </div>
                </div>
                                    
                                                ";
      
    }

    mysqli_free_result($result);
    
    mysqli_query($conecta,$sql); 
    
    //encerra a conex‹o.
    mysqli_close($conecta); 
echo "


                        
                    </div>
                    <!-- /.panel -->
                </div>
                 </div>
    <!-- jQuery -->
    <script src='../vendor/jquery/jquery.min.js'></script>

    <!-- Bootstrap Core JavaScript -->
    <script src='../vendor/bootstrap/js/bootstrap.min.js'></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src='../vendor/metisMenu/metisMenu.min.js'></script>

    <!-- Morris Charts JavaScript -->
    <script src='../vendor/raphael/raphael.min.js'></script>
    <script src='../vendor/morrisjs/morris.min.js'></script>
    <script src='../data/morris-data.js'></script>

    <!-- Custom Theme JavaScript -->
    <script src='../dist/js/sb-admin-2.js'></script>
                </body>";}
else{
    header('location:../../../produtos.php');
}
?>
                </html>