(function () {
    'use strict';

    angular
        .module('crawler', [
        'ui.router',
        'oc.lazyLoad',
        'ngSanitize',
        'angular-storage'
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
        .state('app', {
            abstract: true,
            templateUrl: '/application/views/template.php',
            resolve: {
                deps: ['$ocLazyLoad', function (lazy) {
                    return lazy.load([{
                        files: [
                            '/public/app/components/home/home.controller.js',
                            '/public/app/components/sidebar/sidebar.controller.js'
                        ]
                    }]);
                }]
            }
        })
        .state('app.home', {
            url:'/home',
            templateUrl: '/application/views/home.php',
            controller: 'HomeController',
            controllerAs: 'home',
            resolve: {
                deps: ['$ocLazyLoad', function (lazy) {
                    return lazy.load([{
                        files: [
                            '/public/app/components/home/home.controller.js',
                            '/public/app/components/sidebar/sidebar.controller.js'
                        ]
                    }]);
                }]
            }
        })
        .state('app.pais', {
            url: '/pais',
            templateUrl: '/application/views/pais.php',
            controller: 'PaisController',
            controllerAs: 'pais',
            resolve: {
                deps: ['$ocLazyLoad', function (lazy) {
                    return lazy.load([{
                        files: [
                            '/public/app/components/pais/pais.controller.js'
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
