(function() {
    'use strict';

    angular
        .module('crawler')
        .controller('CompaniaController', companiaController);

    /* companiaController.$inject = [''];

    /* @ngInject */
    function companiaController($http,$state,store){
        var compania = this;

        activate();

        function activate() {
        }
    }
})();
