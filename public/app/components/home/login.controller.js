(function() {
    'use strict';

    angular
        .module('crawler')
        .controller('LoginController', loginController);

    /* loginController.$inject = [''];

    /* @ngInject */
    function loginController($http,$state,store){
        var login = this;

        login.getLogin = getLogin;

        login.activate = activate();

        function activate() {
        }

        function getLogin(){
            $http({
                url: 'http://localhost:8000/index.php/usuario_controller/loginUser',
                method: "POST",
                data : "user="+login.user+"&password="+login.password,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).success(function(data){
                if(data.respuesta == "success"){
                    //mandamos a la login
                    store.set('usuario',{email:login.user,pais:data.pais});
                    $state.go("app.home");                   
                }else{
                    login.error = data.respuesta;
                }
            });    
        }

    }
})();
