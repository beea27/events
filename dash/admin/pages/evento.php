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
                    <h1 class='page-header'>Eventos</h1>
                </div>
                <form action='insere_evento.php' method='post' enctype='multipart/form-data'>
                                        <div class='form-group'>
                                            <label>Nome</label>
                                            <input name='nome'  id='nome' type='text' maxlength='100' required=' ' class='form-control' placeholder='Digite seu nome'>
                                        </div>

                                        <div class='form-group'>
                                            <label>Categoria do Evento</label>
                                            <select name='categoria' id='categoria' maxlength='100' required='' class='form-control'>
                                                <option>Show</option>
                                                <option>Festival</option>
                                                <option>Balada</option>
                                                <option>Pool Party</option>
                                                <option>Evento</option>
                                            </select>
                                        </div>

                                        <div class='form-group'>
                                            <label>Descrição</label>
                                            <input name='descricao'  id='descricao' type='text' maxlength='100' required=' ' class='form-control' placeholder='Digite uma descricao'>
                                        </div>
                                    
                                        <div class='form-group'>
                                            <label>Link de Compra</label>
                                            <input name='link_compra'  id='link_compra' type='text' maxlength='100' required=' ' class='form-control' placeholder='Digite o para compra dos ingressos'>
                                        </div>

                                        <div class='form-group input-group'> 
                                            <label>Data do Evento</label>  
                                            <input name='dt_evento' id='dt_evento' maxlength='10' required='' type='date' class='form-control'>
                                        </div>

                                       
                                       <div class='form-group'>
                                            
                                             <label>Hora do Evento</label> 
                                             <input name='hr_evento' id='hr_evento' maxlength='10' required='' type='time' class='form-control'>
                                            
                                        </div>

                                        <div class='form-group'>
                                            <label>Classificação</label>
                                            <input name='classificacao'  id='classificacao' type='text' maxlength='100' required=' ' class='form-control' placeholder='Digite a classificação do evento'>
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
                                            <label>Imagem</label>
                                            <input class='form-control' name='imagem' id='imagem' maxlength='16' required='' type='file'>
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
