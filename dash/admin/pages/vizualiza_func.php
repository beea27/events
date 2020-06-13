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
                    <h1 class='page-header'>Registro de Funcionário</h1>
                </div>";
   
    
    $cpf = $_GET['cpf'];
    
    mysqli_select_db($conecta,"aps") or
    print(mysqli_error());
    
    //echo ;
    
    $sql = "SELECT * FROM `tb_funcionario` WHERE cpf = $cpf";    
    
    $result=mysqli_query($conecta,$sql);
    
    echo "<form>";
    
    while($consulta=mysqli_fetch_array($result))
    {
                                   

        echo "
                                        <div class='form-group'>
                                            <label>Status</label>
                                            <select name='status' id='status' maxlength='10' class='form-control' disabled>
                                                <option>$consulta[status]</option>
                                            </select>
                                        </div>

                                        <div class='form-group'>
                                            <label>Nome</label>
                                            <input type='' class='form-control' name='nome' value='$consulta[nome]' disabled>
                                        </div>

                                        <div class='form-group'>
                                            <label>Sobrenome</label>
                                            <input type='' class='form-control' name='sobrenome' value='$consulta[sobrenome]' disabled>
                                        </div>

                                        <div class='form-group input-group'>
                                            <label>Data de Nascimento</label><p>     
                                            <input name='dt_nascimento' id='dt_nascimento' maxlength='10' required='' type='date' class='form-control' value='$consulta[dt_nasc]' disabled>
                                        </div>

                                        <div class='form-group'>                                            
                                             <label>CPF</label> 
                                             <input class='form-control' name='cpf' value='$consulta[cpf]' id='cpf' maxlength='14' placeholder='Insira o número de seu CPF' type='text'  maxlength='11' onblur='return verificarCPF(this.value)'/ disabled>                                            
                                        </div>
                                            
                                        <div class='form-group'>
                                            <label>Cargo</label>
                                            <select name='cargo' id='cargo' maxlength='10' class='form-control' disabled>
                                                <option>$consulta[cargo]</option>
                                                <option>Sub-gerente</option>
                                                <option>Funcionário</option>
                                                </select>
                                        </div>
                                            
                                    
                                        <div class='form-group'>
                                            <label>Estado Civil</label>
                                            <select name='estado_civil' id='estado_civil' maxlength='100' class='form-control' disabled>
                                                <option>$consulta[estado_civil]</option>
                                                <option>Casado(a)</option>
                                                <option>Divorciado(a)</option>
                                                <option>Viúvo(a)</option>
                                                <option>Outro</option>
                                            </select>
                                        </div>

                                        <div class='form-group'>
                                            <label>Sexo</label>
                                            <select name='sexo' id='sexo' maxlength='10'  class='form-control' disabled>
                                                <option>$consulta[sexo]</option>
                                                <option>Femininio</option>
                                                <option>Outro</option>
                                            </select>
                                        </div>
                                            
                                        <div class='form-group'>
                                            <label>CEP</label>
                                            <input name='cep' id='cep' maxlength='10' class='form-control' placeholder='Insira o seu CEP' onblur='pesquisacep(this.value)' id='cep' name='cep' type='' value='$consulta[cep]' disabled>
                                        </div>

                                        <div class='form-group'>
                                            <label>Estado</label>
                                            <input maxlength='100' class='form-control' id='estado' name='estado' placeholder='Digite seu estado' value='$consulta[estado]' disabled>
                                        </div>

                                        <div class='form-group'>
                                            <label>Cidade</label>
                                            <input  maxlength='100' class='form-control' id='cidade' name='cidade' placeholder='Digite sua cidade' value='$consulta[cidade]' disabled>
                                        </div>

                                        <div class='form-group'>
                                            <label>Bairro</label>
                                            <input  maxlength='100' class='form-control' id='bairro' name='bairro' placeholder='Digite seu bairro' value='$consulta[bairro]' disabled>
                                        </div>

                                        <div class='form-group'>
                                            <label>Logradouro</label>
                                            <input name='logradouro' id='logradouro'  maxlength='100' class='form-control'  placeholder='Digite seu logradouro' value='$consulta[logradouro]' disabled>
                                        </div>
                                        <div class='form-group'>
                                            <label>Número</label>
                                            <input  class='form-control' id='numero' name='numero' placeholder='Insira o número' value='$consulta[numero]' disabled>
                                        </div>
                                        <div class='form-group'>
                                            <label>Complemento</label>
                                            <input class='form-control' id='complemento' name='complemento' placeholder='Insira o complemento'  value='$consulta[complemento]' disabled>
                                        </div> 
                                            
                                        <div class='form-group'>
                                            <label>E-mail </label>
                                             <input class='form-control' type='text' name='email' value='$consulta[email]' onblur='validacaoEmail(f1.email)'  maxlength='60' size='65'   placeholder='Digite o e-mail' disabled>
                                             <div id='msgemail'></div>     
                                        </div>
                                            
                                        <div class='form-group'>
                                            <label>Senha</label>
                                            <input type='password' class='form-control' name='senha' value='$consulta[senha]' disabled>
                                        </div>
                                        <a class='btn btn-success' href='edita_func.php?cpf=$consulta[cpf]'>Editar</a>
                                        <a class='btn btn-primary' href='tb_funcionario.php'>Voltar</a> ";
                                        
      
      
    }
   
    echo "</form>";
    
    mysqli_free_result($result);
    
    mysqli_query($conecta,$sql); 
    
    //encerra a conex�o.
    mysqli_close($conecta);
    echo "
                                
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                 </div>
    <!-- jQuery -->
    <script src='../../vendor/jquery/jquery.min.js'></script>

    <!-- Bootstrap Core JavaScript -->
    <script src='../../vendor/bootstrap/js/bootstrap.min.js'></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src='../../vendor/metisMenu/metisMenu.min.js'></script>

    <!-- Morris Charts JavaScript -->
    <script src='../../vendor/raphael/raphael.min.js'></script>
    <script src='../../vendor/morrisjs/morris.min.js'></script>
    <script src='../../data/morris-data.js'></script>

    <!-- Custom Theme JavaScript -->
    <script src='../../dist/js/sb-admin-2.js'></script>
                </body>";}
                else{
    header('location:../../../../produtos.php');
}
?>
                </html>