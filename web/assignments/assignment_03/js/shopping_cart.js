angular.module('App', ['ngMaterial'])
  .controller('ItemController', ['$scope', '$mdDialog', function ($scope, $mdDialog) {
    var itemCtrl = this;

  }])
  .controller('NavController', [ '$scope', function ($scope) {
    $scope.currentNavItem = 'catalog';

    $scope.goto = function(page) {
      $scope.status = "Goto " + page;
  }]);
