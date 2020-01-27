app.controller('listParcels', function($scope, $http, $locale, $cookies, $location, $timeout, $interval, $filter){

   console.log("CONTROLLER: listParcels");



   $scope.menu = {};


   $scope.menu.isAllSelected = false;


   $scope.menu.selectAll = function(){
      $scope.menu.isAllSelected = !$scope.menu.isAllSelected;


      $scope.ui.deliveries.forEach(function(delivery){
         delivery.isSelected = $scope.menu.isAllSelected;
      });
   }


   $scope.details = {};


   $scope.details.show = function(delivery){
      $scope.details.delivery = delivery;
      $scope.details.isVisible = true;
   }
   $scope.details.close = function(){
      delete $scope.details.isVisible;
   }


   $scope.filters = {};

   $scope.columns = {};


   $scope.actions = {};
   $scope.actions.info = function(delivery){
      $scope.actions.info.isVisible = true;
      $scope.actions.delivery = delivery;

      $scope.actions.close = function(){
         delete $scope.actions.delivery;
         delete $scope.actions.info.isVisible;
         delete $scope.actions.close;
      };
   };
   $scope.actions.delete = function(parcel){
      $scope.actions.delete.isVisible = true;
      $scope.actions.id = parcel.id;

      $scope.actions.yes = function(){
         parcel.delete();
         delete $scope.actions.delete.isVisible;
         delete $scope.actions.yes;
         delete $scope.actions.no;
      };
      $scope.actions.no = function(){
         delete $scope.actions.delete.isVisible;
         delete $scope.actions.yes;
         delete $scope.actions.no;
      };
   };

  


   if(window.PDFJS){
//       PDFJS.workerSrc = '/js/vendor/pdf.worker.js';
//       PDFJS.cMapUrl = '/js/pdfjs/cmaps/';
//       PDFJS.cMapPacked = true;
   }


});
