(function() {
    'use strict';

    angular
        .module('crawler')
        .controller('ProductoController', ProductoController);

    /* ProductoController.$inject = [''];

    /* @ngInject */
    function ProductoController($http,store,$state,$window){
        var producto = this;

        producto.getProducts = getProducts;
        producto.registrar = registrar;
        producto.eliminar = eliminar;
        producto.goToEdit = goToEdit;
        producto.editar = editar;        

        activate();

        function activate() {
            $http({
                url: 'http://localhost:8000/index.php/categoria_controller',
                method: "GET"
            }).success(function(data){
                if(data.respuesta == "success"){
                    producto.dataCategoria = data.mensaje;
                }else{
                    producto.error = data.mensaje;
                }
            });
            $http({
                url: 'http://localhost:8000/index.php/compania_controller',
                method: "GET"
            }).success(function(data){
                if(data.respuesta == "success"){
                    producto.dataCompania = data.mensaje;
                }else{
                    
                }
            });            
        }

        function getProducts(){
            $http({
                url: 'http://localhost:8000/index.php/producto_controller',
                method: "GET",
                params: {idCategoria:producto.categoria},
            }).success(function(data){
                if(data.respuesta == "success"){
                    producto.data = data.mensaje;
                }else{
                    producto.error = data.mensaje;
                }
            });
        }

        function registrar(){
            var user = store.get('usuario');
            $http({
                url: 'http://localhost:8000/index.php/producto_controller/registrarProducto',
                method: "POST",
                data : "idCompania="+producto.compania+"&idPais="+user.pais+"&idCategoria="+producto.categoria+"&idProducto="+producto.idProducto+"&nombreProducto="+producto.name,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).success(function(data){
                if(data.respuesta == "success"){
                    $state.go("app.producto.home");
                }else{
                    producto.errorRegistrar = data.mensaje;
                }
            });
        }

        function eliminar(idProducto){
             $http({
                url: 'http://localhost:8000/index.php/producto_controller/eliminarProducto',
                method: "DELETE",
                data : "idProducto="+idProducto,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).success(function(data){
                if(data.respuesta == "success"){
                    $window.location.reload();
                }else{
                    producto.error = data.mensaje;
                }
            });
        }

        function goToEdit(idProducto,idCategoria,idCompania,nombreProducto){                
            producto.idEdited = idProducto;
            producto.id = idProducto;
            producto.categoriaEdited = idCategoria;
            producto.categoryId = idCategoria;
            producto.companiaEdited = idCompania;
            producto.nameEdited = nombreProducto;
            $('#editModal').modal('show');  
        }

        function editar(){
            $http({
                url: 'http://localhost:8000/index.php/producto_controller/modificarProducto',
                method: "PUT",
                data : "idProductoOld="+producto.id+"&idProducto="+producto.idEdited+"&idCategoriaOld="+producto.categoryId+"&idCategoria="+producto.categoriaEdited+"&idCompania="+producto.companiaEdited+"&nombreProducto="+producto.nameEdited,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).success(function(data){
                if(data.respuesta == "success"){
                    $window.location.reload();
                    $('#editModal').modal('hide');
                }else{
                    producto.modificar = data.mensaje;
                }
            });
        }       
    }
})();
