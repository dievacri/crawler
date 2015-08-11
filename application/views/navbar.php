<div class="container-fluid">
  <div class="navbar-header">
    <a class="navbar-brand" ui-sref="app.home">
      <img alt="Brand" src="/public/images/logo-crawler.png">
    </a>          
  </div>
  <div class="collapse navbar-collapse" id="content-nav">
      <p class="navbar-text">Bienvenido <span ng-bind="home.getUser();"></span></p>
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-flag"></span></a>
          <ul class="dropdown-menu">
            <li ng-repeat="(key,data) in home.countries">
              <a ng-bind="data.nombrePais"></a>
            </li>
          </ul>
        </li>
        <li>
          <a><span ng-bind=""></span></a>
        </li>                
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-cog"></span> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Cambiar contraseña</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#" ng-click="home.logout()">Salir</a></li>
          </ul>
        </li>
      </ul>
  </div>
</div>