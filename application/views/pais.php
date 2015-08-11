<div data-ng-controller="PaisController">
	<h3>Paises</h3>
	<div class="row">
		<div ng-repeat="(key,data) in pais.data">
			<div class="bs-callout bs-callout-info" id="callout-alerts-dismiss-plugin">
			    <h4 ng-bind="data.nombrePais"></h4>
			    <div>
			    	<button ng-click="pais.goToEdit(data.idPais,data.nombrePais);" class="btn btn-primary">
			    		<span class="glyphicon glyphicon-pencil"></span>
			    	</button>
			    	<button ng-click="pais.eliminar(data.idPais);" class="btn btn-primary">
			    		<span class="glyphicon glyphicon-trash"></span>
			    	</button>
			    </div>	
		  	</div>
		</div>
	</div>
	<div class="row">
		<div class="alert alert-danger col-md-4" role="alert" ng-show="pais.error.length > 0" ng-bind="pais.error"></div>
	</div>
	<div class="row">
		<button ui-sref="app.pais.registrar" class="btn btn-info">Agregar<span class="glyphicon glyphicon-plus"></span></button>
	</div>
	<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal">
	  	<div class="modal-dialog" role="document">
		    <div class="modal-content">
		        <form ng-submit="pais.editar();" novalidate>
			      	<div class="modal-header">
			        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="editModal">Modificar Pais</h4>
			      	</div>
			      	<div class="modal-body">
			          	<div class="form-group">
		            		<label for="countrie-name" class="control-label">Nombre del Pais:</label>
			            	<input type="text" class="form-control" id="countrie-name" ng-bind="pais.named.edited" ng-model="pais.name.edited">
			            	<input type="hidden" class="form-control" id="countrie-id" ng-bind="pais.ide.edited" ng-model="pais.id.edited">
			          	</div>
			      	</div>
			      	<div class="modal-footer">
			        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				        <button type="submit" class="btn btn-primary">Modificar</button>
			      	</div>
		        </form>
		    </div>
	  	</div>
	</div>
</div>