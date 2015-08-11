(function() {
    'use strict';

    angular
        .module('crawler')
        .controller('HomeController', homeController);

    /* homeController.$inject = [''];

    /* @ngInject */
    function homeController($http,$location,store){
        var home = this;

        home.getUser = getUser;
        home.logout = logout;

        home.activate = activate();

        function activate() {
             $http({
                url: 'http://localhost:8000/index.php/pais_controller',
                method: "GET"
            }).success(function(data){
                if(data.respuesta == "success"){
                    home.countries = data.mensaje;
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

    }
})();
