
<div class="navbar navbar-default" role="navigation">

    <div class="navbar-inner">
        <button type="button" class="navbar-toggle pull-left animated flip">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{url('')}}">
            <i class="glyphicon glyphicon-home"></i>
        </a>
        <!-- user dropdown starts -->
        <div class="btn-group pull-right">
            <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                <i class="glyphicon glyphicon-user"></i>&nbsp;
                <span class="hidden-sm hidden-xs">{{Sentry::getUser()->nombre}}</span>
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li>{{HTML::link('login/logout','Cerrar Sesión')}}</li>
                <li class="divider"></li>
                <li>{{HTML::link('administracion','Administración')}}</li>
            </ul>
        </div>
   
        <!-- user dropdown ends -->
        <ul class="collapse navbar-collapse nav navbar-nav top-menu">
            <li class="dropdown">
                <a href="#" data-toggle="dropdown"><i class="glyphicon glyphicon-list"></i> Mi Equipo <span
                        class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li>{{HTML::link('fichas/nueva','Nueva Ficha')}}</li>
                    <li>{{HTML::link('fichas','Consultar Fichas')}}</li>
                    
                    <li class="divider"></li>                    
                    <li>{{HTML::link('fichas/pagos','Registrar pagos')}}</li>
                    
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" data-toggle="dropdown"><i class="glyphicon glyphicon-list"></i> Torneos <span
                        class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                   <li>{{HTML::link('torneos','Mis Torneos')}}</li>
                </ul>
            </li>            
            <li class="dropdown">
                <a href="#" data-toggle="dropdown"><i class="glyphicon glyphicon-list"></i> Listados <span
                        class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                   <li>{{HTML::link('reportes/resueltos/','Listado Guaicaipuro')}}</li>
                </ul>
            </li>
        </ul>
    </div>
</div>
