(function() {
    'use strict';

    angular
        .module('crawler')
        .controller('CategoriaController', CategoriaController);

    /* CategoriaController.$inject = [''];

    /* @ngInject */
    function CategoriaController($http,store,$state,$window){
        var categoria = this;        

        categoria.registrar = registrar;
        categoria.eliminar = eliminar;
        categoria.goToEdit = goToEdit;
        categoria.editar = editar;

        activate();

        function activate() {
            $http({
                url: 'http://localhost:8000/index.php/categoria_controller',
                method: "GET"
            }).success(function(data){
                if(data.respuesta == "success"){
                    categoria.data = data.mensaje;
                }else{
                    categoria.error = data.mensaje;
                }
            });
        }

        function registrar(){
            var user = store.get('usuario');
            $http({
                url: 'http://localhost:8000/index.php/categoria_controller/registrarCategoria',
                method: "POST",
                data : "idPais="+user.pais+"&name="+categoria.name,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).success(function(data){
                if(data.respuesta == "success"){
                    $state.go("app.compania.home");
                }else{
                    pais.registrar = data.mensaje;
                }
            });
        }

        function eliminar(idCategoria){
            $http({
                url: 'http://localhost:8000/index.php/categoria_controller/eliminarCategoria',
                method: "DELETE",
                data : "idCategoria="+idCategoria,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).success(function(data){
                if(data.respuesta == "success"){
                    $window.location.reload();
                }else{
                    categoria.error = data.mensaje;
                }
            });
        }

        function goToEdit(id, name){            
            categoria.idEdited = id;
            categoria.nameEdited = name;
            $('#editModal').modal('show');  
        }

        function editar(){
            $http({
                url: 'http://localhost:8000/index.php/categoria_controller/modificarCategoria',
                method: "PUT",
                data : "idCategory="+categoria.idEdited+"&nameCategory="+categoria.nameEdited,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).success(function(data){
                if(data.respuesta == "success"){
                    $window.location.reload();
                    $('#editModal').modal('hide');
                }else{
                    categoria.modificar = data.mensaje;
                }
            });
        }       
    }
})();
