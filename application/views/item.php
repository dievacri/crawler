<div data-ng-controller="ItemController as item">
	<h3>Items</h3>	
	<div class="row">
		<div class="col-md-4">
			<select class="form-control" ng-change="item.getProducts()" ng-options="data.idCategoria as data.nombreCategoria for (key , data) in item.dataCategoria" ng-model="item.categoria">			
			</select>
		</div>
	</div>	
	<div class="row">
		<div class="col-md-4">
			<select class="form-control" ng-change="item.getItems()" ng-options="data.idProducto as data.nombreProducto for (key , data) in item.dataProducto" ng-model="item.producto">			
			</select>
		</div>
	</div>
	<div class="row">
		<div ng-repeat="(key,data) in item.data">
			<div class="bs-callout bs-callout-info" id="callout-alerts-dismiss-plugin">
			    <h4 ng-bind="data.nombreItem"></h4>
			    <div>
			    	<button ng-click="item.goToEdit(data.idItem,data.nombreItem,data.zona,data.urlItem,data.comentario)" class="btn btn-primary">
			    		<span class="glyphicon glyphicon-pencil"></span>
			    	</button>
			    	<button ng-click="item.eliminar(data.idItem);" class="btn btn-primary">
			    		<span class="glyphicon glyphicon-trash"></span>
			    	</button>
			    	<button ng-click="item.show(data.zona, data.urlItem, data.indice);" class="btn btn-primary">
			    		<span class="glyphicon glyphicon-eye-open"></span>
			    	</button>
			    </div>	
		  	</div>
		</div>
	</div>
	<!--<embed src="file_name.pdf" width="800px" height="2100px">-->
	<div class="row">
		<div class="alert alert-danger col-md-4" role="alert" ng-show="item.error.length > 0" ng-bind="item.error"></div>
	</div>
	<div class="row">
		<button ui-sref="app.item.registrar" class="btn btn-info">Agregar<span class="glyphicon glyphicon-plus"></span></button>
	</div>
	<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal">
	  	<div class="modal-dialog" role="document">
		    <div class="modal-content">
		        <form ng-submit="item.editar();" novalidate>
			      	<div class="modal-header">
			        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="editModal">Modificar item</h4>
			      	</div>
			      	<div class="modal-body">
			          	<div class="form-group">
		            		<label for="item-name" class="control-label">Nombre del item:</label>
			            	<input type="text" class="form-control" id="item-name" ng-bind="item.nombreItemEdited" ng-model="item.nombreItemEdited">
			            	<input type="hidden" class="form-control" id="item-id" ng-bind="item.idItemEdited" ng-model="item.idItemEdited">
			          	</div>
			          	<div class="form-group">
		            		<label for="item-zona" class="control-label">Zona del item:</label>
			            	<input type="text" class="form-control" id="item-zona" ng-bind="item.zonaEdited" ng-model="item.zonaEdited">			            	
			          	</div>
			          	<div class="form-group">
		            		<label for="item-url" class="control-label">Url del item:</label>
			            	<input type="text" class="form-control" id="item-url" ng-bind="item.urlItemEdited" ng-model="item.urlItemEdited">			            	
			          	</div>
			          	<div class="form-group">
		            		<label for="item-comentario" class="control-label">Comentario del item:</label>
			            	<input type="text" class="form-control" id="item-comentario" ng-bind="item.comentarioEdited" ng-model="item.comentarioEdited">			            	
			          	</div>
			          	<div class="alert alert-danger" role="alert" ng-show="item.modificar.length > 0" ng-bind="item.modificar"></div>
			      	</div>
			      	<div class="modal-footer">
			        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				        <button type="submit" class="btn btn-primary">Modificar</button>
			      	</div>
		        </form>
		    </div>
	  	</div>
	</div>
	<div id="showModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="showModal">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">
      		<div id="contentItem"></div>
	    </div>
	  </div>
	</div>
</div>