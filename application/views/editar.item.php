<div data-ng-controller="ItemController as item">
	<h3>Editar Item</h3>
	<div class="row">
		<div class="col-md-6">		
			<form class="form-horizontal" ng-submit="item.editar()" novalidate>		
				<div class="form-group">
					<label for="name" class="col-md-4 control-label">Nombre</label>
				    <div class="col-md-8">
				      <input type="text" class="form-control" id="name" name="name" placeholder="Nombre del Item" ng-model="item.nombreEdited">
				    </div>
				</div>			
				<div class="form-group">
					<label for="zona" class="col-md-4 control-label">Zona</label>
				    <div class="col-md-8">
				      <input type="text" class="form-control" id="zona" name="zona" placeholder="Zona del Item" ng-model="item.valorEdited">
				    </div>
				</div>		
				<div class="form-group">
					<label for="url" class="col-md-4 control-label">Url</label>
				    <div class="col-md-8">
				      <input type="text" class="form-control" id="url" name="url" placeholder="URL del Item" ng-model="item.urlEdited">
				    </div>
				</div>		
				<div class="form-group">
					<label for="indice" class="col-md-4 control-label">Indice</label>
				    <div class="col-md-8">
				      <input type="text" class="form-control" id="indice" name="indice" placeholder="Indice" ng-model="item.indiceEdited">
				    </div>
				</div>		
				<div class="form-group">
					<label for="comentario" class="col-md-4 control-label">Comentario</label>
				    <div class="col-md-8">
				      <input type="text" class="form-control" id="comentario" name="comentario" placeholder="Comentario del Item" ng-model="item.comentarioEdited">
				    </div>
				</div>
				<div class="form-group">
				    <div class="col-sm-offset-4 col-sm-8">
				      <button type="submit" class="btn btn-success">Editar</button>
				    </div>
			  	</div>
			</form>
		</div>
		<div class="col-md-6">
			<div class="col-md-offset-5 col-md-7">
				<button type="button" class="btn btn-success">Mostrar</button>
			</div>
			<div class="col-md-12">
				<textarea class="form-control" rows="15" cols="100" readonly></textarea>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="alert alert-danger col-md-4" role="alert" ng-show="item.errorEditar.length > 0" ng-bind="item.errorEditar"></div>
	</div>
</div>