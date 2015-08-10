(function() {
    'use strict';

    angular
        .module('crawler')
        .controller('PaisController', PaisController);

    /* PaisController.$inject = [''];

    /* @ngInject */
    function PaisController($http){
        var pais = this;        

        activate();

        function activate() {
            $http({
                url: 'http://localhost:8000/index.php/pais_controller',
                method: "GET"
            }).success(function(data){
                if(data.respuesta == "success"){
                    pais.data = data.mensaje;
                }else{
                    pais.error = data.mensaje;
                }
            }); 
        }       
    }
})();
