<div data-ng-controller="PaisController as pais">
	<h3>Registrar Pais</h3>
	<div class="row">
		<form class="form-horizontal" ng-submit="pais.registrar()" novalidate>
			<div class="form-group">
				<label for="name" class="col-sm-2 control-label">Nombre</label>
			    <div class="col-sm-3">
			      <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" ng-model="pais.name">
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
		<div class="alert alert-danger col-md-4" role="alert" ng-show="pais.error.registrar.length > 0" ng-bind="pais.error.registrar"></div>
	</div>
</div>