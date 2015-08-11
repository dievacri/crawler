(function() {
    'use strict';

    angular
        .module('crawler')
        .controller('PaisController', PaisController);

    /* PaisController.$inject = [''];

    /* @ngInject */
    function PaisController($http,$location,$window){
        var pais = this;

        pais.registrar = registrar;
        pais.editar = editar;
        pais.eliminar = eliminar;
        pais.goToEdit = goToEdit;

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

        function registrar(){
            $http({
                url: 'http://localhost:8000/index.php/pais_controller/registrarPais',
                method: "POST",
                data : "name="+pais.name,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).success(function(data){
                if(data.respuesta == "success"){
                    $location.path("/pais");
                }else{
                    pais.error.registrar = data.mensaje;
                }
            });
        }

        function editar(){
            var idPais = $('#countrie-id').val();
            var nombrePais = $('#countrie-name').val();
            $http({
                url: 'http://localhost:8000/index.php/pais_controller/modificarPais',
                method: "PUT",
                data : "idPais="+idPais+"&nombrePais="+nombrePais,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).success(function(data){
                if(data.respuesta == "success"){
                    $window.location.reload();
                    $('#editModal').modal('hide');
                }
            });
        }

        function eliminar(idPais){
            var id = idPais;
            $http({
                url: 'http://localhost:8000/index.php/pais_controller/eliminarPais',
                method: "DELETE",
                data : "idPais="+id,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).success(function(data){
                if(data.respuesta == "success"){
                    $window.location.reload();
                }else{
                    pais.error = data.mensaje;
                }
            });
        }

        function goToEdit(id,name){
            $('#countrie-id').val(id);
            $('#countrie-name').val(name);
            $('#editModal').modal('show');  
        } 
    }
})();
