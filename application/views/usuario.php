<div data-ng-controller="UsuarioController as usuario">
	<h3>Usuarios</h3>
	<div class="row">
		<div ng-repeat="(key,data) in usuario.data">
			<div class="bs-callout bs-callout-info" id="callout-alerts-dismiss-plugin">
			    <h4 ng-bind="data.mailUsuario"></h4>
			    <div>
			    	<button ng-click="usuario.goToEdit(data.idUsuario,data.nombreUsuario,data.apellidoUsuario,data.mailUsuario,data.idPais);" class="btn btn-primary">
			    		<span class="glyphicon glyphicon-pencil"></span>
			    	</button>
			    	<button ng-click="usuario.eliminar(data.idUsuario);" class="btn btn-primary">
			    		<span class="glyphicon glyphicon-trash"></span>
			    	</button>
			    </div>	
		  	</div>
		</div>
	</div>
	<div class="row">
		<div class="alert alert-danger col-md-4" role="alert" ng-show="usuario.error.length > 0" ng-bind="usuario.error"></div>
	</div>
	<div class="row">
		<button ui-sref="app.usuario.registrar" class="btn btn-info">Agregar <span class="glyphicon glyphicon-plus"></span></button>
	</div>
	<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal">
	  	<div class="modal-dialog" role="document">
		    <div class="modal-content">
		        <form ng-submit="usuario.editar();" novalidate>
			      	<div class="modal-header">
			        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="editModal">Modificar Usuario</h4>
			      	</div>
			      	<div class="modal-body">
			          	<div class="form-group">	
		            		<label for="user-name" class="control-label">Nombre:</label>		          		
			            	<input type="text" class="form-control" id="user-name" ng-bind="usuario.nameEdited" ng-model="usuario.nameEdited">
			            	<input type="hidden" class="form-control" id="user-id" ng-bind="usuario.id" ng-model="usuario.id">
			          	</div>
			          	<div class="form-group">
		            		<label for="user-lastName" class="control-label">Apellido:</label>
			            	<input type="text" class="form-control" id="user-lastName" ng-bind="usuario.lastNameEdited" ng-model="usuario.lastNameEdited">
			          	</div>
			          	<div class="form-group">
		            		<label for="user-email" class="control-label">Email:</label>
			            	<input type="text" class="form-control" id="user-email" ng-bind="usuario.mailEdited" ng-model="usuario.mailEdited">
			          	</div>			          	
						<div class="form-group">
							<label for="user-country" class="control-label">Pais:</label>
					      	<select class="form-control" id="user-country" ng-options="data.idPais as data.nombrePais for (key , data) in usuario.dataPais" ng-model="usuario.paisEdited">			
							</select>
						</div>
			          	<div class="alert alert-danger" role="alert" ng-show="usuario.modificar.length > 0" ng-bind="usuario.modificar"></div>
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