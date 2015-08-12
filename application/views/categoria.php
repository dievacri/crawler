<div data-ng-controller="CategoriaController as categoria">
	<h3>Categorias</h3>
	<div class="row">
		<div ng-repeat="(key,data) in categoria.data">
			<div class="bs-callout bs-callout-info" id="callout-alerts-dismiss-plugin">
			    <h4 ng-bind="data.nombreCategoria"></h4>
			    <div>
			    	<button ng-click="categoria.goToEdit(data.idCategoria,data.nombreCategoria);" class="btn btn-primary">
			    		<span class="glyphicon glyphicon-pencil"></span>
			    	</button>
			    	<button ng-click="categoria.eliminar(data.idCategoria);" class="btn btn-primary">
			    		<span class="glyphicon glyphicon-trash"></span>
			    	</button>
			    </div>	
		  	</div>
		</div>
	</div>
	<div class="row">
		<div class="alert alert-danger col-md-4" role="alert" ng-show="categoria.error.length > 0" ng-bind="categoria.error"></div>
	</div>
	<div class="row">
		<button ui-sref="app.categoria.registrar" class="btn btn-info">Agregar <span class="glyphicon glyphicon-plus"></span></button>
	</div>
	<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal">
	  	<div class="modal-dialog" role="document">
		    <div class="modal-content">
		        <form ng-submit="categoria.editar();" novalidate>
			      	<div class="modal-header">
			        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="editModal">Modificar categoria</h4>
			      	</div>
			      	<div class="modal-body">
			          	<div class="form-group">
		            		<label for="category-name" class="control-label">Nombre de la categoria:</label>
			            	<input type="text" class="form-control" id="category-name" ng-bind="categoria.nameEdited" ng-model="categoria.nameEdited">
			            	<input type="hidden" class="form-control" id="category-id" ng-bind="categoria.idEdited" ng-model="categoria.idEdited">
			          	</div>
			          	<div class="alert alert-danger" role="alert" ng-show="categoria.modificar.length > 0" ng-bind="categoria.modificar"></div>
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