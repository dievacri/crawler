(function() {
    'use strict';

    angular
        .module('crawler')
        .controller('CompaniaController', companiaController);

    /* companiaController.$inject = [''];

    /* @ngInject */
    function companiaController($http,$state,store,$window){
        var compania = this;

        compania.registrar = registrar;
        compania.eliminar = eliminar;
        compania.goToEdit = goToEdit;
        compania.editar = editar;
        activate();

        function activate() {
            var user = store.get('usuario');
            $http({
                url: 'http://localhost:8000/index.php/compania_controller',
                method: "GET"
            }).success(function(data){
                if(data.respuesta == "success"){
                    compania.data = data.mensaje;
                }else{
                    compania.error = data.mensaje;
                }
            });
        }

        function registrar(){
            var user = store.get('usuario');
            $http({
                url: 'http://localhost:8000/index.php/compania_controller/registrarCompania',
                method: "POST",
                data : "idCompania="+compania.idCompania+"&idPais="+user.pais+"&name="+compania.name,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).success(function(data){
                if(data.respuesta == "success"){
                    $state.go("app.compania.home");
                }else{
                    pais.error.registrar = data.mensaje;
                }
            });
        }

        function eliminar(idCompania){
            var user = store.get('usuario');
            $http({
                url: 'http://localhost:8000/index.php/compania_controller/eliminarCompania',
                method: "DELETE",
                data : "idCompania="+idCompania,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).success(function(data){
                if(data.respuesta == "success"){
                    $window.location.reload();
                }else{
                    compania.error = data.mensaje;
                }
            });
        }


        function goToEdit(id,name){
            $('#country-id').val(id);
            $('#country-id-old').val(id);
            $('#country-name').val(name);
            $('#editModal').modal('show');  
        }

        function editar(){
            var idCompany = $('#country-id').val();
            var idCompanyOld = $('#country-id-old').val();
            var nombreCompany = $('#country-name').val();
            $http({
                url: 'http://localhost:8000/index.php/compania_controller/modificarCompania',
                method: "PUT",
                data : "idCompany="+idCompany+"&nombreCompany="+nombreCompany+"&idCompanyOld="+idCompanyOld,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).success(function(data){
                if(data.respuesta == "success"){
                    $window.location.reload();
                    $('#editModal').modal('hide');
                }else{
                    compania.modificar = data.mensaje;
                }
            });
        } 
    }
})();
