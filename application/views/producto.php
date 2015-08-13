<div data-ng-controller="ProductoController as producto">
	<h3>Productos</h3>
	<div class="row">
		<div class="col-md-4">
			<select class="form-control" ng-change="producto.getProducts()" ng-options="data.idCategoria as data.nombreCategoria for (key , data) in producto.dataCategoria" ng-model="producto.categoria">			
			</select>
		</div>
	</div>
	<div class="row">
		<div ng-repeat="(key,data) in producto.data">
			<div class="bs-callout bs-callout-info" id="callout-alerts-dismiss-plugin">
			    <h4>ID Producto : <span ng-bind="data.idProducto"></span></h4>
			    <h4>ID Compañia : <span ng-bind="data.idCompania"></span></h4>
			    <h4>Nombre : <span ng-bind="data.nombreProducto"></span></h4>
			    <div>
			    	<button ng-click="producto.goToEdit(data.idProducto,data.idCategoria,data.idCompania,data.nombreProducto);" class="btn btn-primary">
			    		<span class="glyphicon glyphicon-pencil"></span>
			    	</button>
			    	<button ng-click="producto.eliminar(data.idProducto);" class="btn btn-primary">
			    		<span class="glyphicon glyphicon-trash"></span>
			    	</button>
			    </div>	
		  	</div>
		</div>
	</div>
	<div class="row">
		<div class="alert alert-danger col-md-4" role="alert" ng-show="producto.error.length > 0" ng-bind="producto.error"></div>
	</div>
	<div class="row">
		<button ui-sref="app.producto.registrar" class="btn btn-info">Agregar <span class="glyphicon glyphicon-plus"></span></button>
	</div>
	<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal">
	  	<div class="modal-dialog" role="document">
		    <div class="modal-content">
		        <form ng-submit="producto.editar();" novalidate>
			      	<div class="modal-header">
			        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="editModal">Modificar producto</h4>
			      	</div>
			      	<div class="modal-body">
			          	<div class="form-group">	
		            		<label for="product-id" class="control-label">ID del Producto:</label>		          		
			            	<input type="text" class="form-control" id="product-id" ng-bind="producto.idEdited" ng-model="producto.idEdited">
			            	<input type="hidden" class="form-control" id="product-id-old" ng-bind="producto.id" ng-model="producto.id">
			          	</div>
			          	<div class="form-group">
		            		<label for="product-name" class="control-label">Nombre del producto:</label>
			            	<input type="text" class="form-control" id="product-name" ng-bind="producto.nameEdited" ng-model="producto.nameEdited">
			          	</div>
			          	<div class="form-group">
							<label for="product-category" class="control-label">Categoria</label>							
			            	<input type="hidden" class="form-control" id="product-category-old" ng-bind="producto.categoryId" ng-model="producto.categoryId">
					      	<select class="form-control" id="product-category" ng-options="data.idCategoria as data.nombreCategoria for (key , data) in producto.dataCategoria" ng-model="producto.categoriaEdited">			
							</select>
						</div>
						<div class="form-group">
							<label for="product-company" class="control-label">Compañia</label>
					      	<select class="form-control" id="product-company" ng-options="data.idCompania as data.nombreCompania for (key , data) in producto.dataCompania" ng-model="producto.companiaEdited">			
							</select>
						</div>
			          	<div class="alert alert-danger" role="alert" ng-show="producto.modificar.length > 0" ng-bind="producto.modificar"></div>
			      	</div>
			      	<div class="modal-footer">
			        	<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				        <button type="submit" class="btn btn-primary">Modificar</button>
			      	</div>
		        </form>
		    </div>
	  	</div>
	</div>
</div>