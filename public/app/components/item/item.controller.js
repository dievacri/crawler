(function() {
    'use strict';

    angular
        .module('crawler')
        .controller('ItemController', ItemController);

    /* ItemController.$inject = [''];

    /* @ngInject */
    function ItemController($http,$state,$window){
        var item = this;        

        item.getProducts = getProducts;
        item.getItems = getItems;
        item.registrar = registrar;
        item.goToEdit = goToEdit;
        item.editar = editar;
        item.eliminar = eliminar;
        item.show = show;

        activate();

        function activate() {
            $http({
                url: 'http://localhost:8000/index.php/categoria_controller',
                method: "GET"
            }).success(function(data){
                if(data.respuesta == "success"){
                    item.dataCategoria = data.mensaje;
                }else{
                    item.error = data.mensaje;
                }
            });
        }

        function getProducts(){
            $http({
                url: 'http://localhost:8000/index.php/producto_controller',
                method: "GET",
                params: {idCategoria:item.categoria},
            }).success(function(data){
                if(data.respuesta == "success"){
                    item.dataProducto = data.mensaje;
                }else{
                    item.error = data.mensaje;
                }
            });
        }

        function getItems(){
            $http({
                url: 'http://localhost:8000/index.php/item_controller',
                method: "GET",
                params: {idProducto:item.producto},
            }).success(function(data){
                if(data.respuesta == "success"){
                    item.data = data.mensaje;
                }else{
                    item.error = data.mensaje;
                }
            });
        }
        function registrar(){            
            var params = "idCategoria="+item.categoria+"&idProducto="+item.producto+"&nombreItem="+item.nombre+
                        "&zona="+item.valor+"&urlItem="+item.url+"&comentario="+item.comentario+"&indice="+item.indice;
            $http({
                url: 'http://localhost:8000/index.php/item_controller/registrarItem',
                method: "POST",
                data : params,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).success(function(data){
                if(data.respuesta == "success"){
                    $state.go("app.item.home");
                }else{
                    item.errorRegistrar = data.mensaje;
                }
            });
        }
        function goToEdit(idItem, nombreItem, zona, urlItem, comentario){
            item.idItemEdited = idItem;
            item.nombreItemEdited = nombreItem;
            item.zonaEdited = zona;
            item.urlItemEdited = urlItem;
            item.comentarioEdited = comentario;
            $('#editModal').modal('show');
        }

        function editar () { 
            var params = "&nombreItem="+item.nombreItemEdited+"&zona="+item.zonaEdited+"&urlItem="+item.urlItemEdited+
                        "&comentario="+item.comentarioEdited+"&idItem="+item.idItemEdited;           
            $http({
                url: 'http://localhost:8000/index.php/item_controller/modificarItem',
                method: "PUT",
                data : params,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).success(function(data){
                if(data.respuesta == "success"){
                    $window.location.reload();
                    $('#editModal').modal('hide');
                }else{
                    item.modificar = data.mensaje;
                }
            });
        }

        function eliminar (idItem) {
            $http({
                url: 'http://localhost:8000/index.php/item_controller/eliminarItem',
                method: "DELETE",
                data : "idItem="+idItem,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).success(function(data){
                if(data.respuesta == "success"){
                    $window.location.reload();
                }else{
                    pais.error = data.mensaje;
                }
            });
        }

        function show(zona, url, indice){
            $http({
                url: 'http://localhost:8000/index.php/item_controller/mostrarItem',
                method: "GET",
                params: {zona:zona,url:url,indice:indice},
            }).success(function(data){
                if(data.respuesta == "success"){
                    $('#contentItem').append(data.contenido);
                    $('#showModal').modal('show');
                }else{
                    item.error = data.mensaje;
                }
            });
        }
     
    }
})();
