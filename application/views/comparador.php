<div data-ng-controller="ComparadorController as comparador">
	<h3>Comparar Items</h3>
	<div class="row">
		<div class="col-md-4">
			<select class="form-control" ng-change="comparador.getItems()" ng-options="data.idCategoria as data.nombreCategoria for (key , data) in comparador.dataCategoria" ng-model="comparador.categoria">			
			</select>
		</div>
	</div>
	<div class="row">
		<div ng-repeat="(key,data) in comparador.data">
			<div class="bs-callout bs-callout-info" id="callout-alerts-dismiss-plugin">
			    <h4 ng-bind="data.nombreItem"></h4>
			    <div id="data.idItem">
			    	<button ng-click="comparador.compara(data.idItem,data.idProducto);" class="btn btn-primary">
			    		<span class="glyphicon glyphicon-send"></span>
			    	</button>
			    	<div></div>
			    </div>	
		  	</div>
		</div>
	</div>
	<div class="row">
		<div class="alert alert-danger col-md-4" role="alert" ng-show="comparador.error.length > 0" ng-bind="comparador.error"></div>
	</div>
	<div class="row">
		<button class="btn btn-info">Comparar Todos <span class="glyphicon glyphicon-send"></span></button>
	</div>
	<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal">
	  	<div class="modal-dialog" role="document">
		    <div class="modal-content">
		        <form ng-submit="compania.editar();" novalidate>
			      	<div class="modal-header">
			        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="editModal">Modificar compañia</h4>
			      	</div>
			      	<div class="modal-body">
			          	<div class="form-group">	
		            		<label for="country-name" class="control-label">ID de la compañia:</label>		          		
			            	<input type="text" class="form-control" id="country-id" ng-bind="compania.id.edited" ng-model="compania.id.edited">
			            	<input type="hidden" class="form-control" id="country-id-old">
			          	</div>
			          	<div class="form-group">
		            		<label for="country-name" class="control-label">Nombre de la compañia:</label>
			            	<input type="text" class="form-control" id="country-name" ng-bind="compania.named.edited" ng-model="compania.name.edited">
			          	</div>
			          	<div class="alert alert-danger" role="alert" ng-show="compania.modificar.length > 0" ng-bind="compania.modificar"></div>
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