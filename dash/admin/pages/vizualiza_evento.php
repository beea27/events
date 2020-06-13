<!DOCTYPE html>
<html lang='pt-br'>
<?php
include 'conecta.php';
include 'verifica.php';

session_start();
if (isset($_SESSION['nome']) )
        {
            include 'header.php';
        echo"

        <div id='page-wrapper'>
            <div class='row'>
                <div class='col-lg-12'>
                    <h1 class='page-header'>Eventos</h1>
                </div>";
                
                $id_evento = $_GET['id_evento'];
    
                mysqli_select_db($conecta,"aps") or
                print(mysqli_error());
                
                
                $sql = "SELECT * FROM `tb_evento` WHERE id_evento = $id_evento";    
                
                $result=mysqli_query($conecta,$sql);
                
                echo "<form>";
                
                while($consulta=mysqli_fetch_array($result))
                {
                                               
            
                    echo "
                                    <form action='insere_evento.php' method='post' enctype='multipart/form-data'>
                                        
                                        <div class='col-lg-4'>
											<div class='panel panel-default'>
												<div class='panel-heading'>
												<h3 class='espaco'>$consulta[nome]</h3>
												</div>
													<div style='padding-left:0.05em; padding-top:0.9em; padding-bottom:0.9em '>
                                            		<img src='data:image/jpeg;base64, ".base64_encode($consulta['imagem'])."' style='max-width:308px;'>
                                            		</div>                                        		
                                        </div>                                    

                                        <div class='form-group'>
                                            <label>Status</label>
                                            <select name='status' id='status' maxlength='100' required='' class='form-control' disabled>
                                                <option>$consulta[status]</option>  
                                            </select>
                                        </div>

                                        <div class='form-group'>
                                            <label>Categoria do Evento</label>
                                            <select name='categoria' id='categoria' maxlength='100' required='' class='form-control' disabled>
                                                <option>$consulta[categoria]</option>
                                                <option>Festival</option>
                                                <option>Balada</option>
                                                <option>Pool Party</option>
                                                <option>Evento</option>
                                            </select>
                                        </div>

                                        <div class='form-group'>
                                            <label>Descrição</label>
                                            <input name='descricao'  id='descricao' type='text' maxlength='100' required=' ' value='$consulta[descricao]' class='form-control' placeholder='Digite uma descricao' disabled>
                                        </div>

                                        <div class='form-group'>
                                            <label>Link de Compra</label>
                                            <input name='link_compra'  id='link_compra' value='$consulta[link_compra]' type='text' maxlength='100' required=' ' class='form-control' placeholder='Digite o para compra dos ingressos' disabled>
                                        </div>

                                        <div class='form-group input-group'> 
                                            <label>Data do Evento</label>  
                                            <input name='dt_evento' id='dt_evento' value='$consulta[dt_evento]' maxlength='10' required='' type='date' class='form-control' disabled>
                                        </div>

                                       
                                       <div class='form-group'>
                                            
                                             <label>Hora do Evento</label> 
                                             <input name='hr_evento' id='hr_evento' maxlength='10' value='$consulta[hr_evento]' required='' type='time' class='form-control' disabled>
                                            
                                        </div>

                                        <div class='form-group'>
                                            <label>Classificação</label>
                                            <input name='classificacao'  id='classificacao' type='text' value='$consulta[classificacao]' maxlength='100' required=' ' class='form-control' placeholder='Digite a classificação do evento' disabled>
                                        </div>

                                        <div class='form-group'>
                                            <label>CEP</label>
                                            <input  required='' class='form-control' value='$consulta[cep]' placeholder='Insira o seu CEP ' onblur='pesquisacep(this.value)' id='cep' name='cep' type='text' disabled>
                                        </div>

                                        <div class='form-group'>
                                            <label>Estado</label>
                                            <input class='form-control' id='estado' name='estado' value='$consulta[estado]' required='' placeholder='Digite seu estado' disabled>
                                        </div>

                                        <div class='form-group'>
                                            <label>Cidade</label>
                                            <input class='form-control' id='cidade' value='$consulta[cidade]' name='cidade' required='' placeholder='Digite sua cidade ' disabled>
                                        </div>

                                        <div class='form-group'>
                                            <label>Bairro</label>
                                            <input class='form-control' required='' value='$consulta[bairro]' id='bairro' name='bairro' placeholder='Digite seu bairro ' disabled>
                                        </div>

                                        <div class='form-group'>
                                            <label>Logradouro</label>
                                            <input class='form-control' required='' value='$consulta[logradouro]' id='logradouro' name='logradouro' placeholder='Digite seu logradouro ' disabled>
                                        </div>
                                        <div class='form-group'>
                                            <label>Número</label>
                                            <input class='form-control' required='' value='$consulta[numero]' id='numero' name='numero' placeholder='Insira o número ' disabled>
                                        </div>
                                        <div class='form-group'>
                                            <label>Complemento</label>
                                            <input class='form-control' value='$consulta[complemento]' id='complemento' name='complemento' placeholder='Insira o complemento ' disabled>
                                        </div>";
                                        if(isset($_SESSION['cargo'])){
                                            echo " 
                                                <a class='btn btn-success' href='edita_evento.php?id_evento=$consulta[id_evento]'>Editar</a>
                                                ";
                                        }
                                        echo "
                                                <a class='btn btn-primary' href='tb_evento.php'>Voltar</a> ";
                    
                     }
   
    echo "</form>";
    
    mysqli_free_result($result);
    
    mysqli_query($conecta,$sql); 
    
    //encerra a conex�o.
    mysqli_close($conecta);
    echo "
                                         
                                        
                        


                <!-- /.col-lg-12 -->
            </div>
            
    <!-- /#wrapper -->

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

</body>
";}
else{
    header('location:../../../produtos.php');
}
?>
</html>
