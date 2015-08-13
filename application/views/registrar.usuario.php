<div data-ng-controller="UsuarioController as usuario">
	<h3>Registrar Usuario</h3>
	<div class="row">
		<form class="form-horizontal" ng-submit="usuario.registrar()" novalidate>
			<div class="form-group">
				<label for="nombreUsuario" class="col-sm-2 control-label">Nombre</label>
			    <div class="col-sm-3">
			      <input type="text" class="form-control" id="nombreUsuario" name="nombreUsuario" placeholder="Nombre del Usuario" ng-model="usuario.nombreUsuario">
			    </div>
			</div>
			<div class="form-group">
				<label for="apellidoUsuario" class="col-sm-2 control-label">Apellido</label>
			    <div class="col-sm-3">
			      <input type="text" class="form-control" id="apellidoUsuario" name="apellidoUsuario" placeholder="Apellido del Usuario" ng-model="usuario.apellidoUsuario">
			    </div>
			</div>
			<div class="form-group">
				<label for="emailUsuario" class="col-sm-2 control-label">Email</label>
			    <div class="col-sm-3">
		      		<input type="text" class="form-control" id="emailUsuario" name="emailUsuario" placeholder="Email del Usuario" ng-model="usuario.emailUsuario">
			    </div>
			</div>
			<div class="form-group">
				<label for="passwordUsuario" class="col-sm-2 control-label">Contraseña</label>
			    <div class="col-sm-3">
		      		<input type="password" class="form-control" id="passwordUsuario" name="passwordUsuario" placeholder="Password del Usuario" ng-model="usuario.passwordUsuario">
			    </div>
			</div>

			<div class="form-group">
				<label for="name" class="col-sm-2 control-label">Pais</label>
			    <div class="col-sm-3">
			      	<select class="form-control" ng-options="data.idPais as data.nombrePais for (key , data) in usuario.dataPais" ng-model="usuario.pais">			
					</select>
			    </div>
			</div>
			<div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-success">Registrar</button>
			    </div>
		  	</div>
		</form>
	</div>
	<div class="row">
		<div class="alert alert-danger col-md-4" role="alert" ng-show="usuario.errorRegistrar.length > 0" ng-bind="usuario.errorRegistrar"></div>
	</div>
</div>