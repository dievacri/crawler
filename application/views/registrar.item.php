<div data-ng-controller="ItemController as item">
	<h3>Registrar Item</h3>
	<div class="row">
		<div class="col-md-6">		
			<form class="form-horizontal" ng-submit="item.registrar()" novalidate>
				<input type="hidden" id="idItem" name="idItem" ng-bind="item.idItemEdited" ng-model="item.idItemEdited">			
				<div class="form-group">
					<label for="categoria" class="col-md-4 control-label">Categoria</label>
			    	<div class="col-md-8">
						<select id="categoria" name="producto" class="form-control" ng-change="item.getProducts()" ng-options="data.idCategoria as data.nombreCategoria for (key , data) in item.dataCategoria" ng-model="item.categoria">			
						</select>
					</div>
				</div>	
				<div class="form-group">				
					<label for="producto" class="col-md-4 control-label">Producto</label>
			    	<div class="col-md-8">
						<select id="producto" name="producto" class="form-control" ng-options="data.idProducto as data.nombreProducto for (key , data) in item.dataProducto" ng-model="item.producto">			
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="name" class="col-md-4 control-label">Nombre</label>
				    <div class="col-md-8">
				      <input type="text" class="form-control" id="name" name="name" placeholder="Nombre del Item" ng-model="item.nombre">
				    </div>
				</div>			
				<div class="form-group">
					<label for="zona" class="col-md-4 control-label">Zona</label>
				    <div class="col-md-8">
				      <input type="text" class="form-control" id="zona" name="zona" placeholder="Zona del Item" ng-model="item.valor">
				    </div>
				</div>		
				<div class="form-group">
					<label for="url" class="col-md-4 control-label">Url</label>
				    <div class="col-md-8">
				      <input type="text" class="form-control" id="url" name="url" placeholder="URL del Item" ng-model="item.url">
				    </div>
				</div>		
				<div class="form-group">
					<label for="indice" class="col-md-4 control-label">Indice</label>
				    <div class="col-md-8">
				      <input type="text" class="form-control" id="indice" name="indice" placeholder="Indice" ng-model="item.indice">
				    </div>
				</div>		
				<div class="form-group">
					<label for="comentario" class="col-md-4 control-label">Comentario</label>
				    <div class="col-md-8">
				      <input type="text" class="form-control" id="comentario" name="comentario" placeholder="Comentario del Item" ng-model="item.comentario">
				    </div>
				</div>
				<div class="form-group">
				    <div class="col-sm-offset-4 col-sm-8">
				      <button type="submit" class="btn btn-success">Registrar</button>
				    </div>
			  	</div>
			</form>
		</div>
		<div class="col-md-6">
			<div class="col-md-offset-5 col-md-7">
				<button ng-click="item.show(item.valor, item.url, item.indice);" type="button" class="btn btn-success">Mostrar</button>
			</div>
			<div class="col-md-12" id="contentItem">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="alert alert-danger col-md-4" role="alert" ng-show="item.errorRegistrar.length > 0" ng-bind="item.errorRegistrar"></div>
	</div>
</div>