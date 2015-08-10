(function() {
    'use strict';

    angular
        .module('crawler')
        .controller('HomeController', homeController);

    /* homeController.$inject = [''];

    /* @ngInject */
    function homeController($http,$location,store){
        var home = this;

        home.login = login;
        home.getUser = getUser;
        home.logout = logout;

        activate();

        function activate() {
        }

        function login(){
            $http({
                url: 'http://localhost:8000/index.php/user_controller/loginUser',
                method: "POST",
                data : "user="+home.user+"&password="+home.password,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).success(function(data){
                if(data.respuesta == "success"){
                    //mandamos a la home
                    store.set('usuario',{email:home.user});
                    $location.path("/home");                   
                }else{
                    home.error = data.respuesta;
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
