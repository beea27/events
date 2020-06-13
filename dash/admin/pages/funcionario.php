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
                    <h1 class='page-header'>Funcionários</h1>
                </div>
                <form action='insere_func.php' method='post'>
                                        <div class='form-group'>
                                            <label>Nome</label>
                                            <input name='nome'  id='nome' type='text' maxlength='100' required=' ' class='form-control' placeholder='Digite seu nome'>
                                        </div>

                                        <div class='form-group'>
                                            <label>Sobrenome</label>
                                            <input name='sobrenome'  id='sobrenome' type='text' maxlength='100' required=' ' class='form-control' placeholder='Digite seu sobrenome'>
                                        </div>
                    
                                        <label>Data de Nascimento</label><p>
                                        <div class='form-group input-group'> 
                                           
                                            <input name='dt_nascimento' id='dt_nascimento' maxlength='10' required='' type='date' class='form-control'>
                                            
                                        </div>

                                       
                                       <div class='form-group'>
                                            
                                             <label>CPF</label> 
                                             <input class='form-control' name='cpf' id='cpf' maxlength='14' required='' placeholder='Insira o número de seu CPF ' type='text' name='cpf' maxlength='11' onblur='return verificarCPF(this.value)'/>
                                            
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
        alert('CPF Inválido')
        v = true;
        return false;
    }
    d1 = 11 - (d1 % 11);
    if (d1 > 9) d1 = 0;
    if (dv.charAt(0) != d1){
        alert('CPF Inválido')
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
        alert('CPF Inválido')
        v = true;
        return false;
    }
    if (!v) {
        alert(' CPF Válido')
    }
}
</script>

                                        <div class='form-group'>
                                            <label>Cargo</label>
                                            <select name='cargo' id='cargo' maxlength='10' required=''   class='form-control'>
                                                <option>Gerente</option>
                                                <option>Sub-gerente</option>
                                                <option>Funcionário</option>
                                                </select>
                                        </div>

                                        

                                    
                                        <div class='form-group'>
                                            <label>Estado Civil</label>
                                            <select name='estado_civil' id='estado_civil' maxlength='100' required='' class='form-control'>
                                                <option>Solteiro(a)</option>
                                                <option>Casado(a)</option>
                                                <option>Divorciado(a)</option>
                                                <option>Viúvo(a)</option>
                                                <option>Outro</option>
                                            </select>
                                        </div>

                                        <div class='form-group'>
                                            <label>Sexo</label>
                                            <select name='sexo' id='sexo' maxlength='10' required='' class='form-control'>
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
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert('CEP não encontrado.');
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável 'cep' somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != '') {

            //Expressão regular para validar o CEP.
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

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert('Formato de CEP inválido.');
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };

    </script>
                                            <label>CEP</label>
                                            <input  required='' class='form-control' placeholder='Insira o seu CEP ' onblur='pesquisacep(this.value)' id='cep' name='cep' type='text'>
                                        </div>

                                        <div class='form-group'>
                                            <label>Estado</label>
                                            <input class='form-control' id='estado' name='estado' required='' placeholder='Digite seu estado' >
                                        </div>

                                        <div class='form-group'>
                                            <label>Cidade</label>
                                            <input class='form-control' id='cidade' name='cidade' required='' placeholder='Digite sua cidade '>
                                        </div>

                                        <div class='form-group'>
                                            <label>Bairro</label>
                                            <input class='form-control' required='' id='bairro' name='bairro' placeholder='Digite seu bairro '>
                                        </div>

                                        <div class='form-group'>
                                            <label>Logradouro</label>
                                            <input class='form-control' required='' id='logradouro' name='logradouro' placeholder='Digite seu logradouro '>
                                        </div>
                                        <div class='form-group'>
                                            <label>Número</label>
                                            <input class='form-control' required='' id='numero' name='numero' placeholder='Insira o número '>
                                        </div>
                                        <div class='form-group'>
                                            <label>Complemento</label>
                                            <input class='form-control'  id='complemento' name='complemento' placeholder='Insira o complemento '>
                                        </div>
                                        
                                         <div class='form-group'> 
                                          
                                             <label>E-mail </label>
                                             <input class='form-control' type='text' name='email' onblur='validacaoEmail(f1.email)'  maxlength='60' size='65' required=''  placeholder='Digite o e-mail ' >
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
document.getElementById('msgemail').innerHTML='E-mail válido';
alert('E-mail valido');
}
else{
document.getElementById('msgemail').innerHTML='<font color='red'>E-mail inválido </font>';
alert('E-mail invalido');
}
}
</script>


                                        <div class='form-group'>
                                            <label>Senha</label>
                                            <input class='form-control' name='senha' id='senha' maxlength='16' required='' placeholder='Insira sua senha ' type='password'>
                                        </div>
                                         <button type='submit' class='btn btn-outline btn-success'>Cadastrar</button>
                                         </form>


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
    header('location:index.php');
}
?>
</html>
