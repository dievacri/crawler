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

        function compara (idItem,idProducto) {
            $http({
                url: 'http://localhost:8000/index.php/comparador_controller/compararItem',
                method: "GET",
                params: {idItem:idItem,idProducto:idProducto},
            }).success(function(data){
                if(data.respuesta == "success"){
                    comparador.data = data.mensaje;
                }else{
                    comparador.error = data.mensaje;
                }
            });    
        }       
    }
})();
