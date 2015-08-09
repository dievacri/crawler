(function () {
    'use strict';

    angular
        .module('crawler', [
        'ui.router',
        'oc.lazyLoad',
        'ngSanitize'
        ])
        .config(stateConfig)
        .run(stateRun);

    stateConfig.$inject = ['$urlRouterProvider', '$stateProvider'];
    stateRun.$inject = ['$state'];

    /* @ngInject */
    function stateConfig(url, router) {
        url.otherwise('/login');

        router.state('login', {
            url: '/login',
            templateUrl: '/application/views/login.php',
            controller: 'HomeController',
            controllerAs: 'home',
            resolve: {
                deps: ['$ocLazyLoad', function (lazy) {
                    return lazy.load([{
                        files: [
                            '/public/app/components/home/home.controller.js'
                        ]
                    }]);
                }]
            }
        })
    };

    /* @ngInject */
    function stateRun(state) {

    };

})();
