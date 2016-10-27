/**
 * Created by cheza on 9/26/16.
 */

var fountainAngular = angular.module('fountainMF', []);

fountainAngular.config(function ($interpolateProvider) {
   $interpolateProvider.startSymbol('!{');
    $interpolateProvider.endSymbol('}!');
});

