(function() {
    'use strict';

    angular
        .module('crawler')
        .controller('UsuarioController', UsuarioController);

    /* UsuarioController.$inject = [''];

    /* @ngInject */
    function UsuarioController($http,$state,$window){
        var usuario = this;

        usuario.registrar = registrar;
        usuario.eliminar = eliminar;
        usuario.goToEdit = goToEdit;
        usuario.editar = editar;        

        activate();

        function activate() {            
            $http({
                url: 'http://localhost:8000/index.php/usuario_controller',
                method: "GET"
            }).success(function(data){
                if(data.respuesta == "success"){
                    usuario.data = data.mensaje;
                }else{
                    usuario.error = data.mensaje;
                }
            });            
             $http({
                url: 'http://localhost:8000/index.php/pais_controller',
                method: "GET"
            }).success(function(data){
                if(data.respuesta == "success"){
                    usuario.dataPais = data.mensaje;
                }
            }); 
        }   
        function registrar(){
            $http({
                url: 'http://localhost:8000/index.php/usuario_controller/registrarUsuario',
                method: "POST",
                data : "nombreUsuario="+usuario.nombreUsuario+"&apellidoUsuario="+usuario.apellidoUsuario+"&emailUsuario="+usuario.emailUsuario+"&passwordUsuario="+usuario.passwordUsuario+"&pais="+usuario.pais,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).success(function(data){
                if(data.respuesta == "success"){
                    $state.go("app.usuario.home");
                }else{
                    usuario.errorRegistrar = data.mensaje;
                }
            });
        }

        function eliminar(idUsuario){
            $http({
                url: 'http://localhost:8000/index.php/usuario_controller/eliminarUsuario',
                method: "DELETE",
                data : "idUsuario="+idUsuario,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).success(function(data){
                if(data.respuesta == "success"){
                    $window.location.reload();
                }else{
                    usuario.error = data.mensaje;
                }
            });
        }

        function goToEdit(idUsuario,nombreUsuario,apellidoUsuario,mailUsuario,idPais){
            usuario.id = idUsuario;
            usuario.nameEdited = nombreUsuario;
            usuario.lastNameEdited = apellidoUsuario;
            usuario.mailEdited = mailUsuario;
            usuario.paisEdited = idPais;
            $('#editModal').modal('show');
        }

        function editar(){
            $http({
                url: 'http://localhost:8000/index.php/usuario_controller/modificarUsuario',
                method: "PUT",
                data : "nombreUsuario="+usuario.nameEdited+"&apellidoUsuario="+usuario.lastNameEdited+"&mailUsuario="+usuario.mailEdited+"&idPais="+usuario.paisEdited+"&idUsuario="+usuario.id,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).success(function(data){
                if(data.respuesta == "success"){
                    $window.location.reload();
                    $('#editModal').modal('hide');
                }else{
                    usuario.modificar = data.mensaje;
                }
            });
        }    
    }
})();
