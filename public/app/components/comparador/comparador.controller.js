(function() {
    'use strict';

    angular
        .module('crawler')
        .controller('ComparadorController', ComparadorController);

    /* ComparadorController.$inject = [''];

    /* @ngInject */
    function ComparadorController($http){
        var comparador = this;        

        comparador.getItems = getItems;
        comparador.compara = compara;
        comparador.comparaTodos = comparaTodos;

        activate();

        function activate() {
            $http({
                url: 'http://localhost:8000/index.php/categoria_controller',
                method: "GET"
            }).success(function(data){
                if(data.respuesta == "success"){
                    comparador.dataCategoria = data.mensaje;
                }else{
                    comparador.error = data.mensaje;
                }
            });
        }

        function getItems () {
            $http({
                url: 'http://localhost:8000/index.php/item_controller',
                method: "GET",
                params: {idProducto:-1,idCategoria:comparador.categoria},
            }).success(function(data){
                if(data.respuesta == "success"){
                    comparador.data = data.mensaje;
                }else{
                    comparador.error = data.mensaje;
                }
            });
        }

        function compara (idItem,idProducto,idResult) {
            $http({
                url: 'http://localhost:8000/index.php/comparador_controller/compararItem',
                method: "GET",
                params: {idItem:idItem,idProducto:idProducto,idResult:idResult},
            }).success(function(data){
                if(data.respuesta == "success"){
                    $('#result-'+idResult).html(data.mensaje);
                }else{
                    comparador.error = data.mensaje;
                }
            });    
        }

        function comparaTodos(idCategoria){
            $http({
                url: 'http://localhost:8000/index.php/comparador_controller/compararTodos',
                method: "GET",
                params: {idCategoria:idCategoria},
            }).success(function(data){
                if(data.respuesta == "success"){                    
                    for (var i = data.mensaje.length - 1; i >= 0; i--) {
                        $('#result-'+data.mensaje[i].idResult).html(data.mensaje[i].mensaje);
                    };
                }else{
                    comparador.error = data.mensaje;
                }
            }); 
        }       
    }
})();
