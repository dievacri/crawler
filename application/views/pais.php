<div data-ng-controller="PaisController">
	<h3>Paises</h3>
	<div class="row"></div>
	<div class="row">
		<div class="alert alert-danger col-md-4" role="alert" ng-show="pais.error.length > 0" ng-bind="pais.error"></div>
	</div>
	<div class="row">
		<button ui-sref="app.pais.registrar" class="btn btn-info">Agregar<span class="glyphicon glyphicon-plus"></span></button>
	</div>
</div>