<div class="col-md-12">
    <nav data-ng-controller="HomeController" class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" ui-sref="app.home">
            <img alt="Brand" src="/public/images/logo-crawler.png">
          </a>          
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <p class="navbar-text">Bienvenido <span ng-bind="home.getUser()"></span></p>
            <ul class="nav navbar-nav navbar-right">                
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-cog"></span> <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Cambiar contraseña</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a ng-click="home.logout()">Salir</a></li>
                  </ul>
                </li>
            </ul>
        </div>
      </div>
    </nav>
    <div class="row">
        <div class="col-md-2">
            <div data-ng-controller="SidebarController" data-ng-include="'/application/views/sidebar.php'">
            </div>
        </div>
        <div class="col-md-10 container-fluid">
            <div class="side-body">
                <div ui-view></div>
            </div>
        </div>
    </div>
</div>