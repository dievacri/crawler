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
            controllerAs: 'home'         
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
            abstract: true,
            templateUrl: '/application/views/template.pais.php',
            controllerAs: 'pais',
            resolve: {
                deps: ['$ocLazyLoad', function (lazy) {
                    return lazy.load([{
                        files: [
                            '/public/app/components/home/home.controller.js',
                            '/public/app/components/sidebar/sidebar.controller.js',

                            '/public/app/components/pais/pais.controller.js'
                        ]
                    }]);
                }]
            }
        })
        .state('app.pais.home', {
            url: '/pais',
            templateUrl: '/application/views/pais.php',
            controller: 'PaisController'
        })
        .state('app.pais.registrar', {
            url: '/pais/registrar',
            templateUrl: '/application/views/registrar.pais.php',
            controller: 'PaisController',
            controllerAs: 'pais'
        })
        .state('app.compania', {
            abstract: true,
            templateUrl: '/application/views/template.compania.php'
        })
        .state('app.compania.home', {
            url: '/compania',
            templateUrl: '/application/views/compania.php',
            controller: 'CompaniaController',
            controllerAs: 'compania',
            resolve: {
                deps: ['$ocLazyLoad', function (lazy) {
                    return lazy.load([{
                        files: [
                            '/public/app/components/home/home.controller.js',
                            '/public/app/components/sidebar/sidebar.controller.js',
                            '/public/app/components/compania/compania.controller.js'
                        ]
                    }]);
                }]
            }
        })
        .state('app.compania.registrar', {
            url: '/compania/registrar',
            templateUrl: '/application/views/registrar.compania.php',
            controller: 'CompaniaController',
            controllerAs: 'compania'
        })
        .state('app.categoria', {
            abstract: true,
            templateUrl: '/application/views/template.categoria.php'
        })        
        .state('app.categoria.home', {
            url: '/categoria',
            templateUrl: '/application/views/categoria.php',
            controller: 'CategoriaController',
            controllerAs: 'categoria',
            resolve: {
                deps: ['$ocLazyLoad', function (lazy) {
                    return lazy.load([{
                        files: [
                            '/public/app/components/home/home.controller.js',
                            '/public/app/components/sidebar/sidebar.controller.js',
                            '/public/app/components/categoria/categoria.controller.js'
                        ]
                    }]);
                }]
            }
        })        
        .state('app.categoria.registrar', {
            url: '/categoria/registrar',
            templateUrl: '/application/views/registrar.categoria.php',
            controller: 'CategoriaController',
            controllerAs: 'categoria'
        })
        .state('app.producto', {
            abstract: true,
            templateUrl: '/application/views/template.producto.php'
        })     
        .state('app.producto.home', {
            url: '/producto',
            templateUrl: '/application/views/producto.php',
            controller: 'ProductoController',
            controllerAs: 'producto',
            resolve: {
                deps: ['$ocLazyLoad', function (lazy) {
                    return lazy.load([{
                        files: [
                            '/public/app/components/home/home.controller.js',
                            '/public/app/components/sidebar/sidebar.controller.js',
                            '/public/app/components/producto/producto.controller.js'
                        ]
                    }]);
                }]
            }
        })   
        .state('app.producto.registrar', {
            url: '/producto/registrar',
            templateUrl: '/application/views/registrar.producto.php',
            controller: 'ProductoController',
            controllerAs: 'producto'
        })
        .state('app.usuario', {
            abstract: true,
            templateUrl: '/application/views/template.usuario.php'
        })     
        .state('app.usuario.home', {
            url: '/usuario',
            templateUrl: '/application/views/usuario.php',
            controller: 'UsuarioController',
            controllerAs: 'usuario',
            resolve: {
                deps: ['$ocLazyLoad', function (lazy) {
                    return lazy.load([{
                        files: [
                            '/public/app/components/home/home.controller.js',
                            '/public/app/components/sidebar/sidebar.controller.js',
                            '/public/app/components/usuario/usuario.controller.js'
                        ]
                    }]);
                }]
            }
        })   
        .state('app.usuario.registrar', {
            url: '/usuario/registrar',
            templateUrl: '/application/views/registrar.usuario.php',
            controller: 'UsuarioController',
            controllerAs: 'usuario'
        })
    };

    /* @ngInject */
    function stateRun(state) {

    };

})();
