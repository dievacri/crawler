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

    stateConfig.$inject = ['$urlRouterProvider', '$stateProvider','$ocLazyLoadProvider'];
    stateRun.$inject = ['$state'];

    /* @ngInject */
    function stateConfig(url, router,$lazyLoad) {
        $lazyLoad.config({
            debug: true
        });

        url.otherwise('/login');

        router.state('login', {
            url: '/login',
            templateUrl: '/application/views/login.php',
            controller: 'LoginController',
            controllerAs: 'login',
            resolve: {
                deps: ['$ocLazyLoad', function (lazy) {
                    return lazy.load([{
                        files: [
                            '/public/app/components/home/login.controller.js'
                        ]
                    }]);
                }]
            }
        })
        .state('app', {
            abstract: true,
            templateUrl: '/application/views/template.php',
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
        .state('app.home', {
            url:'/home',
            templateUrl: '/application/views/home.php',
            controller: 'HomeController',
            controllerAs: 'home'
        })
        .state('app.pais', {
            abstract: true,
            templateUrl: '/application/views/template.pais.php'
        })
        .state('app.pais.home', {
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
        .state('app.pais.registrar', {
            url: '/pais/registrar',
            templateUrl: '/application/views/registrar.pais.php',
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
        .state('app.compania', {
            abstract: true,
            templateUrl: '/application/views/template.compania.php'
        })
        .state('app.compania.registrar', {
            url: '/compania/registrar',
            templateUrl: '/application/views/registrar.compania.php',
            controller: 'CompaniaController',
            controllerAs: 'compania',
            resolve: {
                deps: ['$ocLazyLoad', function (lazy) {
                    return lazy.load([{
                        files: [
                            '/public/app/components/compania/compania.controller.js'
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
