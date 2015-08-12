(function() {
    'use strict';

    angular
        .module('crawler')
        .controller('HomeController', homeController);

    /* homeController.$inject = [''];

    /* @ngInject */
    function homeController($http,$location,store,$window){
        var home = this;

        home.getUser = getUser;
        home.logout = logout;
        home.changeCountry = changeCountry;

        home.activate = activate();

        function activate() {
             $http({
                url: 'http://localhost:8000/index.php/pais_controller',
                method: "GET"
            }).success(function(data){
                if(data.respuesta == "success"){
                    var user = store.get('usuario');
                    home.countries = data.mensaje;
                    for (var i = home.countries.length - 1; i >= 0; i--) {
                        if(home.countries[i].idPais == user.pais){
                            home.countrie = home.countries[i].nombrePais;
                        }
                    };
                }
            }); 
        }

        function getUser(){
            var user = store.get('usuario');
            return user.email;
        }

        function logout(){
            store.remove('usuario');
            $location.path('/login');
        }

        function changeCountry(idPais){
            var user = store.get('usuario');
            var newUser = {email:user.email,pais:idPais};
            $http({
                url: 'http://localhost:8000/index.php/user_controller/cambiarPais',
                method: "PUT",
                data : "idPais="+idPais,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).success(function(data){
                if(data.respuesta == "success"){
                    store.remove('usuario');
                    store.set('usuario',newUser);
                    $window.location.reload();
                }
            });
        }

    }
})();
