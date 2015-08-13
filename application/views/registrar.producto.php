<div data-ng-controller="ProductoController as producto">
	<h3>Registrar Producto</h3>
	<div class="row">
		<form class="form-horizontal" ng-submit="producto.registrar()" novalidate>
			<div class="form-group">
				<label for="name" class="col-sm-2 control-label">ID del Producto</label>
			    <div class="col-sm-3">
			      <input type="text" class="form-control" id="idproducto" name="idproducto" placeholder="Id de Producto" ng-model="producto.idProducto">
			    </div>
			</div>
			<div class="form-group">
				<label for="name" class="col-sm-2 control-label">Nombre</label>
			    <div class="col-sm-3">
			      <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" ng-model="producto.name">
			    </div>
			</div>
			<div class="form-group">
				<label for="name" class="col-sm-2 control-label">Categoria</label>
			    <div class="col-sm-3">
			      	<select class="form-control" ng-options="data.idCategoria as data.nombreCategoria for (key , data) in producto.dataCategoria" ng-model="producto.categoria">			
					</select>
			    </div>
			</div>
			<div class="form-group">
				<label for="name" class="col-sm-2 control-label">Compañia</label>
			    <div class="col-sm-3">
			      	<select class="form-control" ng-options="data.idCompania as data.nombreCompania for (key , data) in producto.dataCompania" ng-model="producto.compania">			
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
		<div class="alert alert-danger col-md-4" role="alert" ng-show="producto.errorRegistrar.length > 0" ng-bind="producto.errorRegistrar"></div>
	</div>
</div>