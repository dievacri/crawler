<div data-ng-controller="AlertaController as alerta">
	<h3>Alertas</h3>
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
			    <div>
			    	<button ng-click="comparador.compara(data.idItem,data.idProducto,$index);" class="btn btn-primary">
			    		<span class="glyphicon glyphicon-send"></span>
			    	</button>
			    	<div id="{{'result-'+$index}}"></div>
			    </div>	
		  	</div>
		</div>
	</div>
	<div class="row">
		<div class="alert alert-danger col-md-4" role="alert" ng-show="comparador.error.length > 0" ng-bind="comparador.error"></div>
	</div>
	<div class="row">
		<button ng-click="comparador.comparaTodos(comparador.categoria);" class="btn btn-info">Comparar Todos <span class="glyphicon glyphicon-send"></span></button>
	</div>
</div>