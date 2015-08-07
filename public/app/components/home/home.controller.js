(function() {
    'use strict';

    angular
        .module('crawler')
        .controller('HomeController', homeController);

    /* homeController.$inject = [''];

    /* @ngInject */
    function homeController(){
        var home = this;
        home.property = "login";
        console.log("home");
        activate();

        function activate() {
        }
    }
})();
