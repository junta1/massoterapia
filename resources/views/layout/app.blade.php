<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- As 3 meta tags acima *devem* vir em primeiro lugar dentro do `head`; qualquer outro conteúdo deve vir *após* essas tags -->
        <title>Massoterapia 1.0</title>

        <!-- Bootstrap -->
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/estilo.css" rel="stylesheet">
        <!-- HTML5 shim e Respond.js para suporte no IE8 de elementos HTML5 e media queries -->
        <!-- ALERTA: Respond.js não funciona se você visualizar uma página file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body>

        <nav class="navbar navbar-default" >
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    
                    {{link_to('/', $title = 'Dashboard', $attributes = ['class'=>'navbar-brand'])}}
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
<!--                        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
                        
                        <li><a href="#">Link</a></li>
                        -->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Paciente <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li>{{ link_to_route('paciente-cadastro.index', 'Novo Paciente')}}</li>
                            </ul>
                        </li>
                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sintoma <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li>{{ link_to_route('sintoma-tipo.index', 'Sintomas Tipo')}}</li>
                                <li role="separator" class="divider"></li>
                                <li>{{ link_to_route('sintoma-categoria.index', 'Sintomas Categoria')}}</li>
                            </ul>
                        </li>
                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Medida <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Nova Medida</a></li>
                            </ul>
                        </li>
                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profissional <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Novo profissional</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Cargo profissional</a></li>
                            </ul>
                        </li>
                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Consulta <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Nova Consulta</a></li>
                            </ul>
                        </li>
                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Relatório <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Relatório Sintomas</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Relatório Medidas</a></li>
                            </ul>
                        </li>
                        
                        <li>{{ link_to_route('usuarios.index', 'Usuário')}}</li>
                        
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        
        <div class="container-fluid">
        @yield('content')
        </div>
        <!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
<!--        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
        <script src="/js/1.11.3-jquery.min.js"></script>
        <!-- Inclui todos os plugins compilados (abaixo), ou inclua arquivos separadados se necessário -->
        <script src="/js/bootstrap.min.js"></script>
    </body>
</html>