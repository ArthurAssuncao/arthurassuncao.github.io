var app = angular.module('ArthurAssuncao', ['ngMaterial', 'ngAnimate', 'ngAria', 'typer']);

app.config(function($mdThemingProvider) {
  $mdThemingProvider.theme('default')
    .primaryPalette('blue');
});

app.constant('configs', {
  url: 'http://localhost:8080',
  name: 'ArthurAssuncao'
});