<div data-ng-controller="AlertaController as alerta">
	<h3>Alertas</h3>
	<div class="row">
		<div class="col-md-4">
          	<div class="form-group">
				<label for="desde" class="col-md-2 control-label text-right">Desde:</label>
				<div class="col-md-10">
          			<input id="desde" name="desde" type="date" class="form-control" datepicker-popup ng-model="alerta.desde" max-date="'2020-06-22'"  ng-required="true" close-text="Close" />              
      			</div>
      		</div>
        </div>
		<div class="col-md-4">
          	<div class="form-group">
				<label for="hasta" class="col-md-2 control-label text-right">Hasta:</label>
				<div class="col-md-10">
          			<input id="hasta" name="hasta" type="date" class="form-control" datepicker-popup ng-model="alerta.hasta" max-date="'2020-06-22'"  ng-required="true" close-text="Close" />              
      			</div>
      		</div>
        </div>
		<div class="col-md-4">
			<button ng-click="alerta.getAlertas()" class="btn btn-success">Filtrar x Fecha</button>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label for="estado" class="col-md-3 control-label text-right">Estado:</label>
				<div class="col-md-9">
					<select id="estado" name="estado" class="form-control" ng-change="alerta.getAlertas()" ng-options="data.idEstado as data.nombreEstado for (key , data) in alerta.dataEstado" ng-model="alerta.estado">			
					</select>
				</div>
			</div>
		</div>		
		<div class="col-md-4">
			<div class="form-group">
				<label for="categoria" class="col-md-3 control-label text-right">Categoria:</label>
				<div class="col-md-9">
					<select id="categoria" name="categoria" class="form-control" ng-change="alerta.getAlertas()" ng-options="data.idCategoria as data.nombreCategoria for (key , data) in alerta.dataCategoria" ng-model="alerta.categoria">			
					</select>
				</div>
			</div>
		</div>		
		<div class="col-md-4">
			<div class="form-group">
				<label for="ordenar" class="col-md-3 control-label text-right">Ordenar:</label>
				<div class="col-md-9">
					<select id="ordenar" name="ordenar" class="form-control" ng-change="alerta.getAlertas()" ng-model="alerta.ordenar">
					    <option value="fecha">Fecha</option>
				        <option value="valorAlerta">Valor</option>
				        <option value="idEstado">Estado</option>			
					</select>
				</div>
			</div>
		</div>				
	</div>
	<div class="row">
		<div ng-repeat="(key,data) in alerta.data">
			<div class="bs-callout bs-callout-info" id="callout-alerts-dismiss-plugin">
			    <h4>
			    	<i ng-bind="data.nombreCategoria"></i> - <i ng-bind="data.nombreProducto"></i> (<i ng-bind="data.id"></i> - <i ng-bind="data.idProducto"></i></i>) <i ng-bind="data.nombreItem"></i>
			    </h4>
			    <h4 ng-bind="data.fecha"></h4>
			    <div id="{{'resp-'+$index}}">
				    <div ng-if="data.idEstado == '1' || data.idEstado == '4'">
				    	<div ng-if="data.idEstado != '4'">
					    	<button ng-click="item.aceptar(data.idAlerta,$index);" class="btn btn-primary">
					    		<span class="glyphicon glyphicon-ok"></span>
					    	</button>			    	
					    </div>
				    	<button ng-click="alerta.rechazar(data.idAlerta,$index);" class="btn btn-primary">
				    		<span class="glyphicon glyphicon-remove"></span>
				    	</button>
				    </div>
				</div>    
			    <div id="{{'result-'+$index}}">
			    	<span ng-if="data.idEstado == '2'">Aceptado</span>
			    	<span ng-if="data.idEstado == '3'">Rechazado</span>			    	
			    	<button ng-click="alerta.show(data.idAlerta);" class="btn btn-primary">
			    		<span class="glyphicon glyphicon-eye-open"></span>
			    	</button>
			    </div>	
		  	</div>
		</div>
	</div>
	<div class="row">
		<div class="alert alert-danger col-md-4" role="alert" ng-show="alerta.error.length > 0" ng-bind="alerta.error"></div>
	</div>

	<div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showModal">
	  	<div class="modal-dialog" role="document">
		    <div class="modal-content">
		        <form ng-submit="categoria.editar();" novalidate>
			      	<div class="modal-header">
			        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="editModal">Detalle de Alerta</h4>
			      	</div>
			      	<div class="modal-body">
			          	<div class="form-group">
		            		<label for="nombreItem" class="control-label">Item</label>
		            		<span id="nombreItem" name="nombreItem" ng-bind="alerta.infoNombre"></span>
			          	</div>	
			          	<div class="form-group">
		            		<label for="categoria" class="control-label">Categoria</label>
		            		<span id="categoria" name="categoria" ng-bind="alerta.infoCategoria"></span>
			          	</div>	
			          	<div class="form-group">
		            		<label for="producto" class="control-label">Producto</label>
		            		<span id="producto" name="producto" ng-bind="alerta.infoProducto"></span>
			          	</div>
			          	<div class="form-group">
		            		<label for="estado" class="control-label">Estado</label>
		            		<span id="estado" name="estado" ng-bind="alerta.infoEstado"></span>
			          	</div>
			          	<div class="form-group">
		            		<label for="compania" class="control-label">Compañia</label>
		            		<span id="compania" name="compania" ng-bind="alerta.infoCategoria"></span>
			          	</div>					        
			          	<div class="form-group">
		            		<label for="fecha" class="control-label">Fecha</label>
		            		<span id="fecha" name="fecha" ng-bind="alerta.infoFecha"></span>
			          	</div>	  	
			          	<div class="form-group">
		            		<label for="url" class="control-label">URL</label>
		            		<span id="url" name="url" ng-bind="alerta.infoUrl"></span>
			          	</div>	
			          	<div class="form-group">
		            		<label for="zona" class="control-label">Zona</label>
		            		<span id="zona" name="zona" ng-bind="alerta.infoZona"></span>
			          	</div>	
			          	<div class="form-group">
		            		<label for="comentario" class="control-label">Comentario</label>
		            		<span id="comentario" name="comentario" ng-bind="alerta.infoComentario"></span>
			          	</div>	
			          	<div class="form-group">
		            		<label for="contenido" class="control-label">Contenido</label>
		            		<span id="contenido" name="contenido" ng-bind="alerta.infoContenido"></span>
			          	</div>	
			      	</div>
			      	<div class="modal-footer">
			        	<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			      	</div>
		        </form>
		    </div>
	  	</div>
	</div>
</div>