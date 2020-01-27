app.controller('newParcel', function($scope, $http, $locale, $cookies, $location, $timeout, $interval, $filter){

   console.log("CONTROLLER: new parcel");

   $scope.from = {};
   $scope.from.filter = {};
   $scope.from.filter.cities  = [];
   $scope.from.filter.streets = [];

   $scope.from.filter.doZip = function(){
      console.log("doZip() " + $scope.from.filter.zip);

      $scope.from.filter.cities = [];
      $scope.from.filter.streets = [];

      $scope.cache.buildings.list.forEach(function(building){
         if(building.zip.indexOf($scope.from.filter.zip) > -1){

            $scope.from.countryId      = building.countryId;
            $scope.from.regionTypeText = $scope.cache.regionTypes.id[building.regionTypeId].name;
            $scope.from.regionText     = $scope.cache.regions.id[building.regionId].name;
            $scope.from.cityTypeText   = $scope.cache.cityTypes.id[building.cityTypeId].name;
            $scope.from.cityText       = $scope.cache.cities.id[building.cityId].name;
            $scope.from.streetTypeText = $scope.cache.streetTypes.id[building.streetTypeId].name;
            $scope.from.streetText     = $scope.cache.streets.id[building.streetId].name;


            //$scope.from.isRegionEdit = true;
            $scope.from.isCitySelect = true;
            $scope.from.isStreetSelect= true;

            $scope.from.filter.cities.push($scope.cache.cities.id[building.cityId]);
            $scope.from.filter.streets.push($scope.cache.streets.id[building.streetId]);
         }
      });
   };




   $scope.selectFrom = function(from){
      console.log("selectFrom() id=" + from.id);
      $scope.from = from;

      $scope.server.loading = true;


      $scope.server.request("/addresses/from/client/list/" + $scope.profile.SID + "/" + $scope.from.id + "/" + $scope.lang,
                            [],
                            function(response){
                               console.log("getClientFromAddresses() code=" + response.operationCode);

                               if(response.operationCode == 0){
                                  //Let's check only one now
                                  $scope.from.address        = response.addresses.address[0];
                                  $scope.from.countryId      = $scope.cache.buildings.id[$scope.from.address.buildingId].countryId;
                                  $scope.from.regionTypeText = $scope.cache.regionTypes.id[$scope.cache.buildings.id[$scope.from.address.buildingId].regionTypeId].name;
                                  $scope.from.regionText     = $scope.cache.regions.id[$scope.cache.buildings.id[$scope.from.address.buildingId].regionId].name;
                                  $scope.from.cityTypeText   = $scope.cache.cityTypes.id[$scope.cache.buildings.id[$scope.from.address.buildingId].cityTypeId].name;
                                  $scope.from.cityText       = $scope.cache.cities.id[$scope.cache.buildings.id[$scope.from.address.buildingId].cityId].name;
                                  $scope.from.streetTypeText = $scope.cache.streetTypes.id[$scope.cache.buildings.id[$scope.from.address.buildingId].streetTypeId].name;
                                  $scope.from.streetText     = $scope.cache.streets.id[$scope.cache.buildings.id[$scope.from.address.buildingId].streetId].name;


                                  delete($scope.server.loading);
                               };
                            });

   };
   $scope.to = {};
   $scope.selectTo = function(to){
      console.log("selectTo() id=" + to.id);
      $scope.to = to;

      $scope.server.loading = true;

      $scope.server.request("/addresses/to/client/list/" + $scope.profile.SID + "/" + $scope.to.id + "/" + $scope.lang,
                            [],
                            function(response){
                               console.log("getClientToAddresses() code=" + response.operationCode);

                               if(response.operationCode == 0){
                                  //Let's check only one now
                                  $scope.to.address = response.addresses.address[0];
                                  delete($scope.server.loading);
                               };
                            });
   };


   $scope.actions = {};
   $scope.actions.selectFrom = {};
   $scope.actions.selectFrom.open = function(){
      $scope.actions.selectFrom.isVisible = true;
   };
   $scope.actions.selectFrom.cancel = function(){
      delete $scope.actions.selectFrom.isVisible;
   };



   $scope.actions.selectTo = {};
   $scope.actions.selectTo.open = function(){
      $scope.actions.selectTo.isVisible = true;
   };
   $scope.actions.selectTo.cancel = function(){
      delete $scope.actions.selectTo.isVisible;
   };


/*
   $scope.contractor = {};
   $scope.contractor.page = {};
   $scope.contractor.page.limit = 5;


   $scope.contractor.select = function(client){
      $scope.contractor.client = client;
      $scope.contractor.isVisible = true;
   }

   $scope.contractor.done = function(selection){
      console.log(selection);
      $scope.contractor.client.selected = selection;
      delete $scope.contractor.isVisible;
   }


   $scope.contractor.cancel = function(){
      delete $scope.contractor.isVisible;
   }
*/


   if(window.PDFJS){
//       PDFJS.workerSrc = '/js/vendor/pdf.worker.js';
//       PDFJS.cMapUrl = '/js/pdfjs/cmaps/';
//       PDFJS.cMapPacked = true;
   }


});
