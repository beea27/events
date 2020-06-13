
<?php
echo"
<head>
    <title>SÚBETE - Painel</title>
    <link rel='shortcut icon' href='../img/favicon.png'>

    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name='description' content=''>
    <meta name='author' content=''>

    <!-- tabela -->
   <link href='../vendor/datatables-plugins/dataTables.bootstrap.css' rel='stylesheet'>
   <link href='../vendor/datatables-responsive/dataTables.responsive.css' rel='stylesheet'>

    <!-- Bootstrap Core CSS -->
    <link href='../vendor/bootstrap/css/bootstrap.min.css' rel='stylesheet'>

    <!-- MetisMenu CSS -->
    <link href='../vendor/metisMenu/metisMenu.min.css' rel='stylesheet'>

    <!-- Custom CSS -->
    <link href='../dist/css/sb-admin-2.css' rel='stylesheet'>

    <!-- Morris Charts CSS -->
    <link href='../vendor/morrisjs/morris.css' rel='stylesheet'>

    <!-- Custom Fonts -->
    <link href='../vendor/font-awesome/css/font-awesome.min.css' rel='stylesheet' type='text/css'>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js'></script>
        <script src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js'></script>
    <![endif]-->
    <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'>
    </script>";?>
    <script>
  jQuery(function($){
  var $rows = $('#table tr');
  $('#content').keyup(function() {
    var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

    $rows.show().filter(function() {
      var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
      return !~text.indexOf(val);
    }).hide();
  });
});
    </script><?php
echo "
</head>

<body>

<div id='wrapper'>

        <!-- Navigation -->
        <nav class='navbar navbar-default navbar-static-top' role='navigation' style='margin-bottom: 0'>
            <div class='navbar-header'>
                <a class='navbar-brand' href='index.php' style='padding: 2px 15px;'><img src='../img/logo.png' width='100px' height='46,7px'></a>
            </div>
            <!-- /.navbar-header -->

            <ul class='nav navbar-top-links navbar-right'>
                
                <!-- /.dropdown -->
                <li class='dropdown'>
                    <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
                        <i class='fa fa-user fa-fw'></i> <i class='fa fa-caret-down'></i>
                    </a>
                    <ul class='dropdown-menu dropdown-user'>
 
                        <li><a href='#'><i class='fa fa-user fa-fw'></i> $_SESSION[nome]</a>
                        </li>

                        <li><a href='../../../index.php'><i class='fa fa-home fa-fw'></i> Voltar ao site</a>
                        </li>
    
                        <li class='divider'></li>
                        <li><a href='../../../login/logout.php'><i class='fa fa-sign-out fa-fw'></i> Sair</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class='navbar-default sidebar' role='navigation'>
                <div class='sidebar-nav navbar-collapse'>
                    <ul class='nav' id='side-menu'>
                        <li class='sidebar-search'>
                            <div class='input-group custom-search-form'>
                                <input type='text' class='form-control' placeholder='Pesquisar...'>
                                <span class='input-group-btn'>
                                <button class='btn btn-default' type='button'>
                                    <i class='fa fa-search'></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <!--menu-->
                        <li>
                            <a href='index.php'><i class='fa fa-comments'></i> Mensagens</a>
                        </li>";
                        if(isset($_SESSION['cargo'])){
                            echo "
                            <li>
                                <a href='#'><i class='fa fa-wrench fa-file-text'></i> Formulários<span class='fa arrow'></span></a>
                                <ul class='nav nav-second-level'>
                                    
                                    <li>
                                        <a href='funcionario.php'><i class='fa fa-user'></i> Funcionários</a>
                                    </li>

                                    <li>
                                        <a href='evento.php'><i class='fa fa-calendar'></i> Evento</a>
                                    </li>
                                
                                </ul>
                            </li>
                            ";
                        }
                        echo"
                        <li>
                            <a href='#'><i class='fa fa-wrench fa-table'></i> Registros<span class='fa arrow'></span></a>
                            <ul class='nav nav-second-level'>
                        ";
                            if(isset($_SESSION['cargo'])){      
                                echo"  
                                <li>
                                    <a href='tb_funcionario.php'><i class='fa fa-user'></i> Funcionários</a>
                                </li>";
                            }
                            echo"
                                <li>
                                    <a href='tb_evento.php'><i class='fa fa-calendar'></i> Evento</a>
                                </li>
                              
                                
                            </ul>
                        </li>
                        <!--Fim do menu-->
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>";?>