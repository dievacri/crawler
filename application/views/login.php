<div class="col-md-12" data-ng-controller="HomeController">
	<div id="div-login">
		<form name="formLogin" ng-submit="home.login()" novalidate>
			<h3>Inicio Sesion</h3>
			<input ng-model="home.user" class="form-control" type="email" name="user" id="user" placeholder="Usuario" required>
			<input ng-model="home.password" class="form-control" type="password" name="password" id="password" placeholder="Password" required>
			<button ng-disabled="formLogin.user.$error.email || formLogin.user.$error.required || formLogin.password.$error.required" class="btn btn-lg btn-primary" type="submit">Entrar</button>
		</form>
	</div>
	<div ng-show="formLogin.$submitted || formLogin.user.$touched || formLogin.password.$touched">
		<div class="alert alert-danger col-md-4" role="alert" ng-show="formLogin.user.$error.required">El campo Usuario esta vacio</div>
      	<div class="alert alert-danger col-md-4" role="alert" ng-show="formLogin.user.$error.email">No es un email correcto</div>
      	<div class="alert alert-danger col-md-4" role="alert" ng-show="formLogin.password.$error.required">La contraseña es requerida</div>      	
	</div>
	<div class="alert alert-danger col-md-4" role="alert" ng-show="home.error.length > 0" ng-bind="home.error"></div>
<div>