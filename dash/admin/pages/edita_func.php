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
    
    echo "<form action='atualiza_func.php' method='get'>";
    
    while($consulta=mysqli_fetch_array($result))
    {
                                   

        echo "

                                        <div class='form-group'>
                                            <label>Status</label>
                                            <select name='status' id='status' maxlength='10' class='form-control'>
                                                <option>$consulta[status]</option>
                                                <option>Ativo</option>
                                                <option>Inativo</option>
                                            </select>
                                        </div>
                                        <div class='form-group'>
                                            <label>Nome</label>
                                            <input type='' class='form-control' name='nome' value='$consulta[nome]'>
                                        </div>

                                        <div class='form-group'>
                                            <label>Sobrenome</label>
                                            <input type='' class='form-control' name='sobrenome' value='$consulta[sobrenome]'>
                                        </div>

                                        
                                        <div class='form-group input-group'> 
                                            <label>Data de Nascimento</label>
                                            <input name='dt_nascimento' id='dt_nascimento' maxlength='10' required='' type='date' class='form-control' value='$consulta[dt_nasc]'>
                                        </div>

                                        <div class='form-group'>                                            
                                             <label>CPF</label> 
                                             <input class='form-control' name='cpf' value='$consulta[cpf]' id='cpf' maxlength='14' placeholder='Insira o número de seu CPF' type='text'  maxlength='11' onblur='return verificarCPF(this.value)'/>
                                        </div>
<script>
 function verificarCPF(c){
    var i;
    s = c;
    var c = s.substr(0,9);
    var dv = s.substr(9,2);
    var d1 = 0;
    var v = false;
 
    for (i = 0; i < 9; i++){
        d1 += c.charAt(i)*(10-i);
    }
    if (d1 == 0){
        alert('CPF Inv�lido')
        v = true;
        return false;
    }
    d1 = 11 - (d1 % 11);
    if (d1 > 9) d1 = 0;
    if (dv.charAt(0) != d1){
        alert('CPF Inv�lido')
        v = true;
        return false;
    }
 
    d1 *= 2;
    for (i = 0; i < 9; i++){
        d1 += c.charAt(i)*(11-i);
    }
    d1 = 11 - (d1 % 11);
    if (d1 > 9) d1 = 0;
    if (dv.charAt(1) != d1){
        alert('CPF Inv�lido')
        v = true;
        return false;
    }
}
</script>
                                            
                                        <div class='form-group'>
                                            <label>Cargo</label>
                                            <select name='cargo' id='cargo' maxlength='10' class='form-control'>
                                                <option>$consulta[cargo]</option>
                                                <option>Gerente</option>
                                                <option>Sub-gerente</option>
                                                <option>Funcionário</option>
                                                </select>
                                        </div>
                                            
                                    
                                        <div class='form-group'>
                                            <label>Estado Civil</label>
                                            <select name='estado_civil' id='estado_civil' maxlength='100' class='form-control'>
                                                <option>$consulta[estado_civil]</option>
                                                <option>Solteiro(a)</option>
                                                <option>Casado(a)</option>
                                                <option>Divorciado(a)</option>
                                                <option>Viúvo(a)</option>
                                                <option>Outro</option>
                                            </select>
                                        </div>

                                        <div class='form-group'>
                                            <label>Sexo</label>
                                            <select name='sexo' id='sexo' maxlength='10'  class='form-control'>
                                                <option>$consulta[sexo]</option>
                                                <option>Masculino</option>
                                                <option>Femininio</option>
                                                <option>Outro</option>
                                            </select>
                                        </div>
                                            
                                           <div class='form-group'>
              
<script type='text/javascript' >
    
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('logradouro').value=('');
            document.getElementById('bairro').value=('');
            document.getElementById('cidade').value=('');
            document.getElementById('estado').value=('');
           
    }

    function meu_callback(conteudo) {
        if (!('erro' in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('logradouro').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('estado').value=(conteudo.uf);
            
        } //end if.
        else {
            //CEP n�o Encontrado.
            limpa_formul�rio_cep();
            alert('CEP n�o encontrado.');
        }
    }
        
    function pesquisacep(valor) {

        //Nova vari�vel 'cep' somente com d�gitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != '') {

            //Express�o regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com '...' enquanto consulta webservice.
                document.getElementById('logradouro').value='...';
                document.getElementById('bairro').value='...';
                document.getElementById('cidade').value='...';
                document.getElementById('estado').value='...';
                

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = '//viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conte�do.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep � inv�lido.
                limpa_formul�rio_cep();
                alert('Formato de CEP inv�lido.');
            }
        } //end if.
        else {
            //cep sem valor, limpa formul�rio.
            limpa_formul�rio_cep();
        }
    };

    </script>
                                            <label>CEP</label>
                                            <input name='cep' id='cep' maxlength='10' class='form-control' placeholder='Insira o seu CEP' onblur='pesquisacep(this.value)' id='cep' name='cep' type='' value='$consulta[cep]'>
                                        </div>

                                        <div class='form-group'>
                                            <label>Estado</label>
                                            <input maxlength='100' class='form-control' id='estado' name='estado' placeholder='Digite seu estado' value='$consulta[estado]' >
                                        </div>

                                        <div class='form-group'>
                                            <label>Cidade</label>
                                            <input  maxlength='100' class='form-control' id='cidade' name='cidade' placeholder='Digite sua cidade' value='$consulta[cidade]' >
                                        </div>

                                        <div class='form-group'>
                                            <label>Bairro</label>
                                            <input  maxlength='100' class='form-control' id='bairro' name='bairro' placeholder='Digite seu bairro' value='$consulta[bairro]' >
                                        </div>

                                        <div class='form-group'>
                                            <label>Logradouro</label>
                                            <input name='logradouro' id='logradouro'  maxlength='100' class='form-control'  placeholder='Digite seu logradouro' value='$consulta[logradouro]' >
                                        </div>
                                        <div class='form-group'>
                                            <label>Número</label>
                                            <input  class='form-control' id='numero' name='numero' placeholder='Insira o número' value='$consulta[numero]'>
                                        </div>
                                        <div class='form-group'>
                                            <label>Complemento</label>
                                            <input class='form-control' id='complemento' name='complemento' placeholder='Insira o complemento'  value='$consulta[complemento]'>
                                        </div> 
                                            
                                        <div class='form-group'>
                                            <label>E-mail </label>
                                             <input class='form-control' type='text' name='email' value='$consulta[email]' onblur='validacaoEmail(f1.email)'  maxlength='60' size='65'   placeholder='Digite o e-mail' >
                                             <div id='msgemail'></div>
                                             
                                            </div>


<script language='Javascript'>
function validacaoEmail(field) {
usuario = field.value.substring(0, field.value.indexOf('@'));
dominio = field.value.substring(field.value.indexOf('@')+ 1, field.value.length);

if ((usuario.length >=1) &&
    (dominio.length >=3) && 
    (usuario.search('@')==-1) && 
    (dominio.search('@')==-1) &&
    (usuario.search(' ')==-1) && 
    (dominio.search(' ')==-1) &&
    (dominio.search('.')!=-1) &&      
    (dominio.indexOf('.') >=1)&& 
    (dominio.lastIndexOf('.') < dominio.length - 1)) {
document.getElementById('msgemail').innerHTML='E-mail v�lido';
alert('E-mail valido');
}
else{
document.getElementById('msgemail').innerHTML='<font color='red'>E-mail inv�lido </font>';
alert('E-mail invalido');
}
}
</script>
                                            
                                            <div class='form-group'>
                                            <label>Senha</label>
                                            <input type='password' class='form-control' name='senha' value='$consulta[senha]'>
                                            </div>
                                            
                                            <input type='submit' class='btn btn-success' value='Salvar'>";
      
      
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