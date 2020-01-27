app.controller('shipmentEdit', function($scope, $http, $locale, $cookies, $location, $timeout, $interval, $filter){

   console.log("CONTROLLER: edit shipment");

   $scope.actions = {};
   $scope.actions.selectDelivery = {};

   $scope.actions.appendDelivery = function(){
      console.log("CONTROLLER: appendDelivery()");

      $scope.actions.selectDelivery.isVisible = true;
   }
   $scope.actions.selectDelivery.cancel = function(){
      console.log("cancel()");

      delete $scope.actions.selectDelivery.isVisible;
   }

});
