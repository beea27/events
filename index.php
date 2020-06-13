<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>SÚBETE</title>
        <link rel="shortcut icon" href="img/favicon.png">
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top"><img class="logo" src="img/logo/logo.png" alt="" /></a><button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu<i class="fas fa-bars ml-1"></i></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services"><b>Sobre</b></a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#portfolio"><b>Próximos Eventos</b></a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#atracoes"><b>Atrações</b></a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact"><b>Contato</b></a></li>
                        <?php
                        session_start();
                        if (!isset($_SESSION['nome']) )
                        {   
                            echo "<li class='nav-item'><a class='nav-link js-scroll-trigger' href='login.php'><b>Login</b></a></li>";
                        }else{

                            echo "
                            <li class='nav-item'>
                                <div class='dropdown'>
                                    <button class='btn btn-secondary text-uppercase nav-link dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                      <b>$_SESSION[nome]</b>
                                    </button>
                                    <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                                        <a class='opt-menu nav-item dropdown-item js-scroll-trigger' href='dash/admin/pages/index.php'>Painel</a>
                                        <a class='opt-menu nav-item dropdown-item js-scroll-trigger' href='login/logout.php'>Sair</a>
                                    </div>
                                </div>
                            </li>
                            ";
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-heading text-uppercase">A vida é mais divertida em uma festa!</div>
                <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">VER MAIS</a>
            </div>
        </header>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading titulo-branco text-uppercase">Sobre</h2>
                    <p class="text-muted" style="padding-bottom: 20px">A Súbete tem como objetivo organizar e divulgar os melhores festivais, shows, baladas e eventos!</p>
                </div>
                <div class="row text-center">
                    <div class="col-md-4">
                        <img class="events" src="img/sobre/icon2.png" alt="alternative">
                        <h4 class="my-3">Shows</h4>
                        <p class="text-muted">Shows e festivais nacionais e internacionais para curtir com os seus ídolos preferidos!</p>
                    </div>
                    <div class="col-md-4">
                        <img class="events" src="img/sobre/icon1.png" alt="alternative">
                        <h4 class="my-3">Baladas</h4>
                        <p class="text-muted">As melhores baladas que irão tornar suas noites inesquecíveis!</p>
                    </div>
                    <div class="col-md-4">
                        <img class="events" src="img/sobre/icon3.png" alt="alternative">
                        <h4 class="my-3">Pool Parties</h4>
                        <p class="text-muted">Dentre diversos eventos você ainda pode curtir a melhores Pool Parties desse verão!</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Portfolio Grid-->
        <section class="page-section bg-light" id="portfolio">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Próximos Eventos</h2>
                </div>
                <div class="row">
                    <?php
                        include 'contato/conecta.php';
                        mysqli_select_db($conecta, "aps") or print(mysqli_error());

                                    
                        $sql="SELECT * FROM tb_evento
                        WHERE status = 'Ativo'";

                        $result=mysqli_query($conecta,$sql);
                       
                        while($consulta=mysqli_fetch_array($result)){
                           
                            echo "
                            <div class='col-lg-4 col-sm-6 mb-4'>
                                <div class='portfolio-item'>
                                    <a class='portfolio-link' data-toggle='modal' href='#portfolioModal$consulta[id_evento]'>
                                    <div class='portfolio-hover'>
                                        <div class='portfolio-hover-content'><i class='fas fa-plus fa-3x'></i></div>
                                    </div>
                                    <img class='img-fluid' src='data:image/jpeg;base64,".base64_encode($consulta['imagem'])."'></a>
                                    <div class='portfolio-caption'>
                                        <div class='portfolio-caption-heading'>$consulta[nome]</div>
                                        <div class='portfolio-caption-subheading cor-categoria'>$consulta[categoria]</div>
                                    </div>
                                </div>
                            </div>";
                        }
                    ?>
                </div>
            </div>
        </section>
        <section class="parceiros" id="atracoes" style="padding: 3rem 0 !important;">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading titulo-branco text-uppercase"><b>Atrações</b></h2>
                    <h3 class="section-subheading text-muted" style="padding-top:20px">Alguns dos grandes nomes que já passaram por nosso eventos!
                    </h3>
                </div>
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="img/parceiros/anitta.png" class="artistas" alt="...">
                            <img src="img/parceiros/ed.png" class="artistas" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="img/parceiros/mari.png" class="artistas" alt="...">
                            <img src="img/parceiros/thumbnail_natruts.jpg" class="artistas" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="img/parceiros/dragons.png" class="artistas" alt="...">
                            <img src="img/parceiros/melim.png" class="artistas" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="img/parceiros/ozuna.png" class="artistas" alt="...">
                            <img src="img/parceiros/pedro_sampaio.png" class="artistas" alt="...">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </section>
        <!-- Clients-->
        <div class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid d-block mx-auto" src="assets/img/logos/envato.jpg" alt="" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid d-block mx-auto" src="assets/img/logos/designmodo.jpg" alt="" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid d-block mx-auto" src="assets/img/logos/themeforest.jpg" alt="" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid d-block mx-auto" src="assets/img/logos/creative-market.jpg" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Contato</h2>
                    <h3 class="section-subheading text-muted">Entre em contato para combinarmos seu proximo evento.</h3>
                </div>
                <form id="contactForm"  action="contato/contato.php" method="post">
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" id="name" name="nome" type="text" placeholder="Seu Nome *" required="required" data-validation-required-message="Insira seu nome, por favor!" />
                                
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="email" name="email" type="email" placeholder="Seu Email *" required="required" data-validation-required-message="Insira seu e-mail, por favor!" />
                                
                            </div>
                            <div class="form-group mb-md-0">
                                <input class="form-control" id="celular" name="celular" max-length="14"  placeholder="Seu Celular *" required="required" data-validation-required-message="Insira seu celular, por favor!" />
                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-textarea mb-md-0">
                                <textarea class="form-control" id="mensagem" name="mensagem"  placeholder="Sua Mensagem *" required="required" max-length="500" data-validation-required-message="Insira sua menssagem, por favor!"></textarea>
                                
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <div id="success"></div>
                        <button class="btn btn-primary btn-xl text-uppercase" type="submit">Enviar</button>
                    </div>
                </form>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-left">APS - Desenvolvimento de Software para Web</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a><a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-right"><a class="mr-3" href="#!">Universidade Anhembi Morumbi</a></div>
                </div>
            </div>
        </footer>

        <?php
             mysqli_select_db($conecta, "aps") or print(mysqli_error());

             $sql="SELECT * FROM tb_evento
                    WHERE status = 'Ativo'";

             $result=mysqli_query($conecta,$sql);
         
            while($consulta=mysqli_fetch_array($result)){
               
                    echo"
                    <!-- Portfolio Modals--><!-- Modal 1-->
                    <div class='portfolio-modal modal fade' id='portfolioModal$consulta[id_evento]' tabindex='-1' role='dialog' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='close-modal' data-dismiss='modal'>
                                    <img src='img/close.png' alt='Close modal' />
                                </div>
                                <div class='container'>
                                    <div class='row justify-content-center'>
                                        <div class='col-lg-8'>
                                            <div class='modal-body'>
                                                <!-- Project Details Go Here-->
                                                <h2 class='text-uppercase'>$consulta[nome]</h2>
                                                <img class='img-fluid d-block mx-auto' src='data:image/jpeg;base64,".base64_encode($consulta['imagem'])."' alt='' />
                                                <p class='titulo'><b>$consulta[descricao]</b></p>
                                                <ul class='list-inline'>
                                                    <div class='data'>
                                                        <img style='margin:0px 20px' src='img/calendar.png'>
                                                        <li><b> $consulta[dt_evento] - Abertura: $consulta[hr_evento]</b></li>
                                                    </div>
                                                    <li><b>Endereço<br> </b>$consulta[complemento] <br> $consulta[logradouro], $consulta[numero] - $consulta[bairro] - $consulta[cidade] - $consulta[estado]</li>
                                                    <li><br><b>Classificação:</b> $consulta[classificacao]</li>
                                                </ul>
                                                <a class='btn btn-primary' href='$consulta[link_compra]' target='_blank' ><b>COMPRAR</b></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>";
                
        }
        ?>
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Contact form JS-->
        <script src="assets/mail/jqBootstrapValidation.js"></script>
        <script src="assets/mail/contact_me.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
