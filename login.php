
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>SÚBETE - Login</title>
  
  <link rel="shortcut icon" href="img/favicon.png">
  
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>

      <link rel="stylesheet" href="css/login.css">

  
</head>

<body>


 

<div class="login-wrap">
    <div class="login-html">
        <div>
            <img width="200px" heigth="70px" class="logo" src="img/logo/logo.png">
        </div>
        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Entrar</label>
        <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"></label>
        <div class="login-form">
            <div class="sign-in-htm">
                <form action="login/verifica_login.php" method="post">
                    <div class="group">
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
                        
                <br>    
                                
                <div class="foot-lnk">
                    <a href="index.php" style="color:#ffec1a">Voltar ao site</a>
                </div>

            </div>
        </div>
    </div>
</div>

</body>
</html>