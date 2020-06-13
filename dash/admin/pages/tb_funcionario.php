<!DOCTYPE html>
<html lang='pt-br'>
<?php
include 'conecta.php';
include 'verifica.php';

session_start();
if (isset($_SESSION['nome']) && isset($_SESSION['cargo']))
        {

    include 'header.php';
    echo"
        <div id='page-wrapper'>
            <div class='row'>
                <div class='col-lg-12'>
                    <h1 class='page-header'>Registro dos funcionários</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class='row'>
                <div class='col-lg-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>
                            Funcionários
                        </div>
                        <!-- /.panel-heading -->
                        <div class='panel-body'>
                            <div class='table-responsive'>
                                <div style='padding-bottom: 5px;'><input type='text' id='content' style='border-radius: 8px; border-color: #ddd;' placeholder=' Procure...'>
                            </div>
                            <table width='100%' class='table table-striped table-bordered table-hover' id='table'>
                                    <thead>
                                        <tr>                                         
                                            <th>Status</th>
                                            <th>Nome</th>
                                            <th>Data de Nascimento</th>
                                            <th>CPF</th>
                                            <th>Cargo</th>
                                            <th>Sexo</th>
                                            <th>E-mail</th>
                                            <th></th>
                                            
                                        </tr>
                                    </thead>";


                    
                                include 'conecta.php';
                                
                                //header('Content-Type: text/html; charset=utf-8');
                                //Meta Charset no Arquivo (UFT-8)
                                
                                mysqli_select_db($conecta,'aps') or
                                print(mysqli_error());
                                
                                $sql1 = 'SELECT * FROM `tb_funcionario`';    
                                
                                $result=mysqli_query($conecta,$sql1);
                                
                                while($consulta=mysqli_fetch_array($result))
                                {
                                    echo "
                                        
                                    <tbody>
                                        <tr>
                                            <td>$consulta[status]</td>
                                            <td>$consulta[nome]</td>
                                            <td>$consulta[dt_nasc]</td>
                                            
                                            <td>$consulta[cpf]</td>
                                            <td>$consulta[cargo]</td>
                                           
                                            <td>$consulta[sexo]</td>
                                            
                                            <td>$consulta[email]</td>
                                           

                                            <td><a href='edita_func.php?cpf=$consulta[cpf]'><button type='button' class='btn btn-info btn-circle'><i class='fa fa-pencil' title='Editar registro $consulta[cpf]' ></i></button></a> 

                                            <a href='vizualiza_func.php?cpf=$consulta[cpf]'><button type='button' class='btn btn-warning btn-circle'><i class='fa  fa-eye' title='Vizualizar registro $consulta[cpf]' ></i></button></a></td>
                                        </tr>";
      
                                }
                                mysqli_free_result($result);
                                
                                mysqli_query($conecta,$sql); 
                                
                                //encerra a conex�o.
                                mysqli_close($conecta); 
                                echo"

                                </tbody>
                            </table>
                        </div>
                            
                        <div class='row'>
                            <div class='col-lg-2'>
                            </div>
                            <div class='col-lg-2'>
                            </div>
                            <div class='col-lg-2'>
                            </div>
                            <div class='col-lg-2'>
                            </div>
                            <div class='col-lg-2'>
                            </div>
                            
                        </div>
                    </div>
                 
                </div>
                 
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
    header('location:index.php');
}
?>
</html>