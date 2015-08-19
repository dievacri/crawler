(function() {
    'use strict';

    angular
        .module('crawler')
        .controller('AlertaController', AlertaController);

    /* AlertaController.$inject = [''];

    /* @ngInject */
    function AlertaController($http){
        var alerta = this; 

        alerta.getAlertas = getAlertas;
        alerta.aceptar = aceptar;
        alerta.rechazar = rechazar;    
        alerta.show = show;   
        
        activate();
        today();
        getAlertas();
        
        function activate() {
            $http({
                url: 'http://localhost:8000/index.php/categoria_controller',
                method: "GET"
            }).success(function(data){
                if(data.respuesta == "success"){
                    alerta.dataCategoria = data.mensaje;
                }else{
                    alerta.error = data.mensaje;
                }
            }); 
            $http({
                url: 'http://localhost:8000/index.php/alerta_controller/getEstados',
                method: "GET"
            }).success(function(data){
                if(data.respuesta == "success"){
                    alerta.dataEstado = data.mensaje;
                }else{
                    alerta.error = data.mensaje;
                }
            });        
        }

        function today () {
            alerta.desde = new Date();    
            alerta.hasta = new Date();
            alerta.hasta.setDate(alerta.hasta.getDate() + 1);       
        }    

        function getAlertas () {               
            $http({
                url: 'http://localhost:8000/index.php/alerta_controller',
                method: "GET",
                params:{fechaDesde:alerta.desde,fechaHasta:alerta.hasta,estado:alerta.estado,categoria:alerta.categoria,ordenar:alerta.ordenar},
            }).success(function(data){
                if(data.respuesta == "success"){
                    alerta.data = data.mensaje;
                }else{
                    alerta.error = data.mensaje;
                }
            });      
        }

        function aceptar (idAlerta,index){
            $http({
                url: 'http://localhost:8000/index.php/alerta_controller/aceptarAlerta',
                method: "PUT",
                data : "idAlerta="+idAlerta,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).success(function(data){
                if(data.respuesta == "success"){
                    $('#result-'+index).html("Aceptado");
                    $('#resp-'+index).hide();
                }else{
                    alerta.error = data.mensaje;
                }
            });
        }   

        function rechazar (idAlerta,index) {
            $http({
                url: 'http://localhost:8000/index.php/alerta_controller/rechazarAlerta',
                method: "PUT",
                data : "idAlerta="+idAlerta,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).success(function(data){
                if(data.respuesta == "success"){
                    $('#result-'+index).html("Rechazado");
                    $('#resp-'+index).hide();
                }else{
                    alerta.error = data.mensaje;
                }
            });
        }

        function show (idAlerta) {
            $http({
                url: 'http://localhost:8000/index.php/alerta_controller/getAlerta',
                method: "GET",
                params:{idAlerta:idAlerta},
            }).success(function(data){
                if(data.respuesta == "success"){
                    alerta.infoNombre = data.mensaje.nombreItem;
                    alerta.infoCategoria = data.mensaje.nombreCategoria;
                    alerta.infoProducto = data.mensaje.nombreProducto;
                    alerta.infoEstado = data.mensaje.nombreEstado;                    
                    alerta.infoFecha = data.mensaje.fecha;
                    alerta.infoUrl = data.mensaje.urlItem;
                    alerta.infoZona = data.mensaje.zona;
                    alerta.infoComentario = data.mensaje.comentario;
                    alerta.infoContenido = data.mensaje.valorAlerta;
                    $('#showModal').modal('show');
                }else{
                    alerta.error = data.mensaje;
                }
            });              
        }
    }
})();
