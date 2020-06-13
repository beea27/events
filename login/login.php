<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>D'CORES-Login</title>
  
  <link rel="shortcut icon" href="img/favicon.png">
  
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>

      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>

<?php 
        include('login/verifica_usuario_ativo.php');
    ?>

    <video  id="bgvid" class="bg_video" playsinline autoplay muted loop>
        <source src="videos/decoracao.mp4" type="video/mp4">
    </video>

  <div class="login-wrap" style="min-height:1100px !important;">
    <div class="login-html">
        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Entrar</label>
        <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Cadastrar</label>
        <div class="login-form">
            <div class="sign-in-htm">
                <div class="group">
            <form action="login/verifica_login.php" method="get"> 
            
                    <label for="user" class="label">E-mail</label>
                    <input id="user"  type="text" name="usuario" class="input" required="">
                </div>
                <div class="group">
                    <label for="pass" class="label">Senha</label>
                    <input id="pass" name="senha" type="password" class="input" data-type="password" required="">
                </div>
    
                <div class="group">
                    <input id="check" type="checkbox" class="check" checked>
                    <label for="check"><span class="icon"></span> Lembrar senha</label>
                </div>
                <div class="group">
                    <input type="submit" class="button" value="Entrar" >
                </div>
            </form>

                <div class="hr"></div>
                <div class="foot-lnk">
                    <a href="#forgot">Esqueceu a senha?</a>
                </div>
                        
                        <br><br><br>    
                                
                <div class="foot-lnk">
                    <a href="index.php">Voltar ao site <i class="fa fa-home"> </i>></i></a>
                </div>
            </div>


    <!-- CADASTRO -->


            <div class="sign-up-htm">
                <div class="group">
                <form action="login/formulario.php" method="post">
                    <label for="user"  class="label">Nome completo</label>
                    <input id="user" name="nome" type="text" class="input" required="">
                </div>

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
                                        <div class="group">
                                            <label for="pass" class="label">CEP</label>
                                            <input  required="" class="input"  onblur="pesquisacep(this.value)" id="cep" name="cep" type="text">
                                        </div>

                                        <div class="group">
                                            <label for="pass" class="label">Estado</label>
                                            <input class="input" id="estado" name="estado" required=""  >
                                        </div>

                                        <div class="group">
                                            <label for="pass" class="label">Cidade</label>
                                            <input class="input" id="cidade" name="cidade" required="">
                                        </div>

                                        <div class="group">
                                            <label for="pass" class="label">Bairro</label>
                                            <input class="input" required="" id="bairro" name="bairro">
                                        </div>

                                        <div class="group">
                                            <label for="pass" class="label">Logradouro</label>
                                            <input class="input" required="" id="logradouro" name="logradouro" >
                                        </div>
                                        <div class="group">
                                            <label for="pass" class="label">Número</label>
                                            <input class="input" required="" id="numero" name="numero" >
                                        </div>
                                        <div class="group">
                                            <label for="pass" class="label">Complemento</label>
                                            <input class="input"  id="complemento" name="complemento" >
                                        </div>

                                        <div class="group">
                                            <label for="email" class="label">E-mail</label>
                                            <input id="email" name="email" type="text" class="input" required="">
                                        </div>

                                       <!-- <div class="group">
                                            <label for="pass" class="label">Confirme a senha</label>
                                            <input id="pass" type="password" class="input" data-type="password">
                                        </div> -->
                                        <div class="group">
                                            <label for="senha" class="label">Senha</label>
                                            <input id="senha" name="senha" type="password" class="input" data-type="password" required="">
                                        </div>
                                        
                                        <div class="group">
                                            <input type="submit" class="button" value="cadastrar">
                                        </div>
                                        </form>
                                        <div class="hr"></div>
                                        <div class="foot-lnk">
                                            <label for="tab-1">Já possui cadastro?</a>
                                        </div>
                                    
            </div>
        </div>
    </div>
</div>

</body>
</html>