app.controller('dashboardCntr', function($scope, $http, $locale, $cookies, $location, $timeout, $interval, $filter){

   console.log("CONTROLLER: dashboard");


   if(window.PDFJS){
//       PDFJS.workerSrc = '/js/vendor/pdf.worker.js';
//       PDFJS.cMapUrl = '/js/pdfjs/cmaps/';
//       PDFJS.cMapPacked = true;
   }




   $scope.dashboard = {};


   $scope.cache = {};
   $scope.cache.countries = {};
   $scope.cache.countries.id = {};
   $scope.cache.countries.list = [];

   $scope.cache.regions = {};
   $scope.cache.regions.id = {};
   $scope.cache.regions.list = [];

   $scope.cache.regionTypes = {};
   $scope.cache.regionTypes.id = {};
   $scope.cache.regionTypes.list = [];


   $scope.cache.cities = {};
   $scope.cache.cities.id = {};
   $scope.cache.cities.list = [];
   $scope.cache.cityTypes = {};
   $scope.cache.cityTypes.id = {};
   $scope.cache.cityTypes.list = [];

   $scope.cache.streets = {};
   $scope.cache.streets.id = {};
   $scope.cache.streets.list = [];
   $scope.cache.streetTypes = {};
   $scope.cache.streetTypes.id = {};
   $scope.cache.streetTypes.list = [];



   $scope.cache.buildings = {};
   $scope.cache.buildings.id = {};
   $scope.cache.buildings.list = [];



   $scope.cache.clients = {};
   $scope.cache.clients.from = {};
   $scope.cache.clients.from.id = {};
   $scope.cache.clients.from.list = [];
   $scope.cache.clients.to = {};
   $scope.cache.clients.to.id = {};
   $scope.cache.clients.to.list = [];


   $scope.cache.deliveries = {};
   $scope.cache.deliveries.id = {};
   $scope.cache.deliveries.list = [];
   $scope.cache.deliveries.status = {};
   $scope.cache.deliveries.status.id = {};
   $scope.cache.deliveries.status.list = [];


   $scope.cache.shipments = {};
   $scope.cache.shipments.id = {};
   $scope.cache.shipments.list = [];
   $scope.cache.shipments.status = {};
   $scope.cache.shipments.status.id = {};
   $scope.cache.shipments.status.list = [];
   $scope.cache.shipments.places = {};
   $scope.cache.shipments.places.id = {};
   $scope.cache.shipments.places.list = [];


   $scope.shipments = {};
   $scope.shipments.places = {};

   $scope.removeArray = function(array, element){
      var idx = array.indexOf(element);
      if (idx != -1) {
         array.splice(idx, 1);
      }
   };






   $scope.new_parcel = {};
   $scope.new_parcel.clear = function(){
      $scope.new_parcel.from               = {};
      $scope.new_parcel.from.client        = {};
      $scope.new_parcel.from.country       = {};
      $scope.new_parcel.to                 = {};
      $scope.new_parcel.to.client          = {};
      $scope.new_parcel.to.client.selected = {};
      $scope.new_parcel.to.country         = {};
      $scope.new_parcel.images             = [];

      delete $scope.new_parcel.weight;
      delete $scope.new_parcel.places;
      delete $scope.new_parcel.volume;
   }


   $scope.delivery = {};
   $scope.delivery.actions = {};
   $scope.delivery.actions.addHandlers = function(delivery){
      delivery.delete = function(){
         console.log("delete() id=" + delivery.id)

         delete $scope.cache.deliveries.id[delivery.id];
         $scope.removeArray($scope.cache.deliveries.list, delivery);
         $scope.removeArray($scope.ui.deliveries, delivery);


         $scope.server.request("/deliveries/delete",
                               [$scope.profile.SID, delivery.id],
                               function(response){
                                  console.log(response.operationCode);

                                  if(response.operationCode == 0){
                                  };
                               });
      };

      delivery.setPlace = function(shipmentId, placeId){
         console.log("setPlace() " + delivery.id + " -> place=" + shipmentId + ":" + placeId)


         $scope.cache.deliveries.id[delivery.id].shipmentID = shipmentId;
         $scope.cache.deliveries.id[delivery.id].placeID    = placeId;


         $scope.server.request("/shipments/places/append",
                               [$scope.profile.SID, placeId, delivery.id],
                               function(response){
                                  console.log("appendDeliveryToPlace() code=" + response.operationCode);

                                  if(response.operationCode == 0){
                                  };
                               });

      };
      delivery.unsetPlace = function(){
         console.log("unsetPlace() deliveryID=" + delivery.id)

         var placeID = delivery.placeID;

         delete delivery.shipmentID;
         delete delivery.placeID;


         $scope.server.request("/shipments/places/remove",
                               [$scope.profile.SID, placeID, delivery.id],
                               function(response){
                                  console.log("unsetPlace() code=" + response.operationCode);

                                  if(response.operationCode == 0){
                                  };
                               });

      };

   };


   $scope.newDelivery = function(){
      console.log("newDelivery()");

      $scope.new_parcel.clear();
      $scope.nav("dashboard", "new_parcel");
   };



   $scope.new_parcel.create = function(from, to, toCountry, description, weight, volume, places){
      var parcel = {};
      parcel.from        = from;
      parcel.to          = to;
      parcel.isAddressOk = false;
      parcel.countryTo   = toCountry;
      parcel.places      = places;
      parcel.weight      = weight;
      parcel.volume      =  volume * 1000000;

      $scope.cache.deliveries.status.list.sort(function(status1, status2){
         return status1.order > status2.order;
      });

      parcel.status = $scope.cache.deliveries.status.list[0].id;


      $scope.server.request("/deliveries/new",
                            [$scope.profile.SID,
                             parcel.from,
                             parcel.to,
                             parcel.description,
                             parcel.weight,
                             parcel.volume,
                             parcel.places],
                            function(response){
                               console.log(response.operationCode);

                               if(response.operationCode == 0){
                                  parcel.id      = response.id;
                                  parcel.barcode = "23423423423";
                                  $scope.cache.deliveries.list.push(parcel);
                                  $scope.cache.deliveries.id[parcel.id] = parcel;

                                  $scope.delivery.actions.addHandlers(parcel);
                               };
                            });
   }


   $scope.uploadImage = function(image){
      console.log("uploadImage()");

      $scope.new_parcel.images.push(image);
      console.log($scope.new_parcel.images.length);
      $scope.$apply();
   }
   $scope.removeImage = function(image){
      console.log("removeImage()");

      var index = $scope.new_parcel.images.indexOf(image);
      $scope.new_parcel.images.splice(index, 1);
   }


   $scope.shipment = {};
   $scope.shipment.actions = {};
   $scope.shipment.actions.addHandlers = function(shipment){
      shipment.delete = function(){
         console.log("deleteShipment() id=" + shipment.id)


         delete $scope.cache.shipments.id[shipment.id];
         $scope.removeArray($scope.cache.shipments.list, shipment);
         $scope.removeArray($scope.ui.shipments, shipment);


         $scope.server.request("/shipments/delete",
                               [$scope.profile.SID, shipment.id],
                               function(response){
                                  console.log(response.operationCode);

                                  if(response.operationCode == 0){
                                  };
                               });
      };
      shipment.edit = function(){
         console.log("editShipment() id=" + this.id)

         $scope.shipments.edit = shipment;

         $scope.nav("dashboard", "shipment_edit");
      };
   };


   $scope.newShipment = function(){
      console.log("newShipment()");

         $scope.server.request("/shipments/new",
                               [$scope.profile.SID],
                               function(response){
                                  console.log(response.operationCode);

                                  if(response.operationCode == 0){
                                     var shipment = {};
                                     shipment.id     = response.id;
                                     shipment.volume = 0;
                                     shipment.weight = 0;
                                     shipment.places = 0;

                                     $scope.shipment.actions.addHandlers(shipment);

                                     $scope.cache.shipments.status.list.sort(function(status1, status2){
                                        return status1.order > status2.order;
                                     });

                                     shipment.status = $scope.cache.shipments.status.list[0].id;
                                     $scope.cache.shipments.id[shipment.id] = shipment;
                                     $scope.cache.shipments.list.push(shipment);

                                     $scope.shipments.edit = shipment;

                                     $scope.nav("dashboard", "shipment_edit");
                                  };
                               });
   };

   $scope.newShipmentPlace = function(id){
      console.log("newShipmentPlace() shipmentID=" + id);

         $scope.server.request("/shipments/places/new",
                               [$scope.profile.SID, id],
                               function(response){
                                  console.log(response.operationCode);

                                  if(response.operationCode == 0){
                                     var place = {};
                                     place.id = response.id;
                                     place.shipmentID = id;

                                     $scope.cache.shipments.places.actions.addHandlers(place);

                                     $scope.cache.shipments.places.id[place.id] = place;
                                     $scope.cache.shipments.places.list.push(place);
                                  };
                               });
   };
   $scope.cache.shipments.places.actions = {};
   $scope.cache.shipments.places.actions.addHandlers = function(place){
      place.delete = function(){
         console.log("deleteShipmentPlace() id=" + place.id)

         delete $scope.cache.shipments.places.id[place.id];
         $scope.removeArray($scope.cache.shipments.places.list, place);

         $scope.server.request("/shipments/places/delete",
                               [$scope.profile.SID, place.id],
                               function(response){
                                  console.log(response.operationCode);

                                  if(response.operationCode == 0){
                                  };
                               });
      };
   };




   $scope.newRegionType = function(countryId, name){
      console.log("newRegionType() countryId=" + countryId + ", name=" + name);
      $scope.server.loading = true;


      $scope.server.request("/addresses/region/types/new",
                            [countryId, name],
                            function(response){
                               console.log("newRegionType() code=" + response.operationCode);

                               if(response.operationCode == 0){
                                  var regionType = {};
                                  regionType.id        = response.id;
                                  regionType.countryId = countryId;
                                  regionType.name      = name;

                                  $scope.cache.regionTypes.id[regionType.id] = regionType;
                                  $scope.cache.regionTypes.list.push(regionType);
                                  delete $scope.server.loading;
                               };
                            });
   };
   $scope.newRegion = function(countryId, typeId, name){
      console.log("newRegion() countryId=" + countryId + ", name=" + name);
      $scope.server.loading = true;


      $scope.server.request("/addresses/regions/new",
                            [countryId, typeId, name],
                            function(response){
                               console.log("newRegion() code=" + response.operationCode);

                               if(response.operationCode == 0){
                                  var region = {};
                                  region.id           = response.id;
                                  region.countryId    = countryId;
                                  region.typeId       = typeId;
                                  region.name         = name;

                                  $scope.cache.regions.id[region.id] = region;
                                  $scope.cache.regions.list.push(region);
                                  delete $scope.server.loading;
                               };
                            });
   };


   $scope.newCityType = function(countryId, name){
      console.log("newCityType() countryId=" + countryId + ", name=" + name);
      $scope.server.loading = true;


      $scope.server.request("/addresses/city/types/new",
                            [countryId, name],
                            function(response){
                               console.log("newCityType() code=" + response.operationCode);

                               if(response.operationCode == 0){
                                  var cityType = {};
                                  cityType.id           = response.id;
                                  cityType.countryId    = countryId;
                                  cityType.name         = name;

                                  $scope.cache.cityTypes.id[cityType.id] = cityType;
                                  $scope.cache.cityTypes.list.push(cityType);
                                  delete $scope.server.loading;
                               };
                            });
   };



   $scope.loadSteps = 15;

   $scope.ui = {};
   $scope.ui.deliveries = [];
   $scope.ui.shipments  = [];


   $scope.loadFinished = function(){
      $scope.loadSteps--;
      console.log("[" + $scope.loadSteps + "]");

      if ($scope.loadSteps == 0){
         $scope.ui.deliveries = $scope.cache.deliveries.list;

         $scope.cache.deliveries.list.forEach(function(delivery){
            delivery.index = {};

            if($scope.cache.clients.from.id[delivery.from] == null){
//               delivery.index.nameTo = "-----";
            }
            else{
               delivery.index.nameFrom  = $scope.cache.clients.from.id[delivery.from].name;
               if(delivery.isAddressOk){
                  delivery.index.nameTo = $scope.cache.clients.to.id[delivery.to].name;
               }
            }
//            delivery.index.countryFrom = $scope.cache.clients.id[delivery.from].country;
//            delivery.index.countryTo   = $scope.cache.clients.id[delivery.to].country;
         });

         delete $scope.server.loading;
      }
   };



   $scope.getCountries = function(){
      $scope.server.request("/addresses/list/" + $scope.lang,
                            [],
                            function(response){
                               console.log("getCountries() code=" + response.operationCode);

                               if(response.operationCode == 0){


                                  $scope.cache.countries.list = response.countries;

                                  //console.log($scope.cache.countries.list);
                                  $scope.cache.countries.list.forEach(function(country){
                                     $scope.cache.countries.id[country.id] = country;
                                  });

//                                  $scope.new_parcel.from.country.selected = $scope.cache.countries.list[0];
//                                  $scope.new_parcel.to.country.selected   = $scope.cache.countries.list[0];

                                  $scope.loadFinished();
                               };
                            });
   }


   $scope.getRegions = function(){
      $scope.server.request("/addresses/regions/list/" + $scope.lang,
                            [],
                            function(response){
                               console.log("getRegions() code=" + response.operationCode);

                               if(response.operationCode == 0){


                                  $scope.cache.regions.list = response.regions.region;

                                  //console.log($scope.cache.cities.list);
                                  $scope.cache.regions.list.forEach(function(region){
                                     $scope.cache.regions.id[region.id] = region;
                                  });

//                                  $scope.new_parcel.from.country.selected = $scope.cache.countries.list[0];
//                                  $scope.new_parcel.to.country.selected   = $scope.cache.countries.list[0];

                                  $scope.loadFinished();
                               };
                            });
   }
   $scope.getRegionTypes = function(){
      $scope.server.request("/addresses/region/types/list/" + $scope.lang,
                            [],
                            function(response){
                               console.log("getRegionTypes() code=" + response.operationCode);

                               if(response.operationCode == 0){
                                  $scope.cache.regionTypes.list = response.types.type;

                                  //console.log($scope.cache.cities.list);
                                  $scope.cache.regionTypes.list.forEach(function(regionType){
                                     $scope.cache.regionTypes.id[regionType.id] = regionType;
                                  });

                                  $scope.loadFinished();
                               };
                            });
   }




   $scope.getCities = function(){
      $scope.server.request("/addresses/cities/list/" + $scope.lang,
                            [],
                            function(response){
                               console.log("getCities() code=" + response.operationCode);

                               if(response.operationCode == 0){


                                  $scope.cache.cities.list = response.cities.city;

                                  //console.log($scope.cache.cities.list);
                                  $scope.cache.cities.list.forEach(function(city){
                                     $scope.cache.cities.id[city.id] = city;
                                  });

                                  $scope.loadFinished();
                               };
                            });
   }
   $scope.getCityTypes = function(){
      $scope.server.request("/addresses/city/types/list/" + $scope.lang,
                            [],
                            function(response){
                               console.log("getCityTypes() code=" + response.operationCode);

                               if(response.operationCode == 0){


                                  $scope.cache.cityTypes.list = response.types.type;

                                  //console.log($scope.cache.cities.list);
                                  $scope.cache.cityTypes.list.forEach(function(cityType){
                                     $scope.cache.cityTypes.id[cityType.id] = cityType;
                                  });

                                  $scope.loadFinished();
                               };
                            });
   }





   $scope.getStreets = function(){
      $scope.server.request("/addresses/streets/list/" + $scope.lang,
                            [],
                            function(response){
                               console.log("getStreets() code=" + response.operationCode);

                               if(response.operationCode == 0){


                                  $scope.cache.streets.list = response.streets.street;

                                  //console.log($scope.cache.cities.list);
                                  $scope.cache.streets.list.forEach(function(street){
                                     $scope.cache.streets.id[street.id] = street;
                                  });

//                                  $scope.new_parcel.from.country.selected = $scope.cache.countries.list[0];
//                                  $scope.new_parcel.to.country.selected   = $scope.cache.countries.list[0];

                                  $scope.loadFinished();
                               };
                            });
   }
   $scope.getStreetTypes = function(){
      $scope.server.request("/addresses/street/types/list/" + $scope.lang,
                            [],
                            function(response){
                               console.log("getStreetTypes() code=" + response.operationCode);

                               if(response.operationCode == 0){
                                  $scope.cache.streetTypes.list = response.types.type;

                                  $scope.cache.streetTypes.list.forEach(function(streetType){
                                     $scope.cache.streetTypes.id[streetType.id] = streetType;
                                  });

                                  $scope.loadFinished();
                               };
                            });
   }



   $scope.getBuildings = function(){
      $scope.server.request("/addresses/buildings/list/" + $scope.lang,
                            [],
                            function(response){
                               console.log("getBuildings() code=" + response.operationCode);

                               if(response.operationCode == 0){


                                  $scope.cache.buildings.list = response.buildings.building;

                                  //console.log($scope.cache.cities.list);
                                  $scope.cache.buildings.list.forEach(function(building){
                                     $scope.cache.buildings.id[building.id] = building;
                                  });

//                                  $scope.new_parcel.from.country.selected = $scope.cache.countries.list[0];
//                                  $scope.new_parcel.to.country.selected   = $scope.cache.countries.list[0];

                                  $scope.loadFinished();
                               };
                            });
   }





   $scope.getDeliveryStatuses = function(){
      $scope.server.request("/deliveries/status/list/" + $scope.lang,
                            [],
                            function(response){
                               console.log("getDeliveryStatuses() code=" + response.operationCode);

                               if(response.operationCode == 0){


                                  $scope.cache.deliveries.status.list = response.statuses.status;

                                  //console.log($scope.cache.cities.list);
                                  $scope.cache.deliveries.status.list.forEach(function(status){
                                     $scope.cache.deliveries.status.id[status.id] = status;
                                  });

//                                  $scope.new_parcel.from.country.selected = $scope.cache.countries.list[0];
//                                  $scope.new_parcel.to.country.selected   = $scope.cache.countries.list[0];

                                  $scope.loadFinished();
                               };
                            });
   }



   $scope.getDeliveries = function(){
      $scope.server.request("/deliveries/list/" + $scope.profile.SID + "/" + $scope.lang,
                            [],
                            function(response){
                               console.log("getDeliveries() code=" + response.operationCode);

                               if(response.operationCode == 0){

                                  if(response.deliveries){
                                     $scope.cache.deliveries.list = response.deliveries;

                                     $scope.cache.deliveries.list.forEach(function(delivery){
                                        $scope.cache.deliveries.id[delivery.id] = delivery;
                                        $scope.delivery.actions.addHandlers(delivery);
                                     });


                                     $scope.loadFinished();
                                  }
                               };
                            });
   }
   $scope.getShipments = function(){
      $scope.server.request("/shipments/list/" + $scope.profile.SID + "/" + $scope.lang,
                            [],
                            function(response){
                               console.log("getShipments() code=" + response.operationCode);

                               if(response.operationCode == 0){

                                  if(response.shipments){
                                     $scope.cache.shipments.list = response.shipments.shipment;

                                     $scope.cache.shipments.list.forEach(function(shipment){
                                        $scope.cache.shipments.id[shipment.id] = shipment;
                                        $scope.shipment.actions.addHandlers(shipment)
                                     });


                                     $scope.loadFinished();
                                  }
                               };
                            });
   }
   $scope.getShipmentStatuses = function(){
      $scope.server.request("/shipments/status/list/" + $scope.lang,
                            [],
                            function(response){
                               console.log("getShipmentStatuses() code=" + response.operationCode);

                               if(response.operationCode == 0){


                                  if(response.statuses == null || response.statuses.status == null)
                                     $scope.cache.shipments.status.list = [];
                                  else
                                     $scope.cache.shipments.status.list = response.statuses.status;

                                  //console.log($scope.cache.cities.list);
                                  $scope.cache.shipments.status.list.forEach(function(status){
                                     $scope.cache.shipments.status.id[status.id] = status;
                                  });

//                                  $scope.new_parcel.from.country.selected = $scope.cache.countries.list[0];
//                                  $scope.new_parcel.to.country.selected   = $scope.cache.countries.list[0];

                                  $scope.loadFinished();
                               };
                            });
   }
   $scope.getShipmentPlaces = function(){
      $scope.server.request("/shipments/places/list/" + $scope.profile.SID + "/" + $scope.lang,
                            [],
                            function(response){
                               console.log("getShipmentPlaces() code=" + response.operationCode);

                               if(response.operationCode == 0){

                                  if(response.shipments){
                                     $scope.cache.shipments.places.list = response.shipments.shipment;

                                     $scope.cache.shipments.places.list.forEach(function(place){
                                        $scope.cache.shipments.places.id[place.id] = place;
                                        $scope.cache.shipments.places.actions.addHandlers(place);
                                     });


                                     $scope.loadFinished();
                                  }
                               };
                            });
   }

   $scope.getClientsFrom = function(){
      $scope.server.request("/clients/from/list/" + $scope.profile.SID + "/" + $scope.lang,
                            [],
                            function(response){
                               console.log("getClients() code=" + response.operationCode);

                               if(response.operationCode == 0){

                                  $scope.cache.clients.from.list = response.clients;
                                  if($scope.cache.clients.from.list == null) $scope.cache.clients.from.list = [];

                                  $scope.cache.clients.from.list.forEach(function(client){
                                     //console.log(client.id + "=" + client.name());

                                     client.printAddress = function(){
                                        return $scope.cache.countries.id[this.country].name
                                               + ", "
                                               + this.address.zip
                                               + " "
                                               + $scope.cache.cities.id[this.city].name
                                               + " "
                                               + this.address.street
                                               + " "
                                               + this.address.building
                                               + " "
                                               + ((this.address.building1 !== undefined) ? ("здание " + this.address.building1) : "");
                                               + " "
                                               + ((this.address.building2 !== undefined) ? ("строение " + this.address.building2) : "");
                                     };

                                     $scope.cache.clients.from.id[client.id] = client;
                                  });

                                  $scope.loadFinished();
                               };
                            });
   }
   $scope.getClientsTo = function(){
      $scope.server.request("/clients/to/list/" + $scope.profile.SID + "/" + $scope.lang,
                            [],
                            function(response){
                               console.log("getClients() code=" + response.operationCode);

                               if(response.operationCode == 0){

                                  $scope.cache.clients.to.list = response.clients;
                                  if($scope.cache.clients.to.list == null) $scope.cache.clients.to.list = [];

                                  $scope.cache.clients.to.list.forEach(function(client){
                                     //console.log(client.id + "=" + client.name());

                                     client.printAddress = function(){
                                        return $scope.cache.countries.id[this.country].name
                                               + ", "
                                               + this.address.zip
                                               + " "
                                               + $scope.cache.cities.id[this.city].name
                                               + " "
                                               + this.address.street
                                               + " "
                                               + this.address.building
                                               + " "
                                               + ((this.address.building1 !== undefined) ? ("здание " + this.address.building1) : "");
                                               + " "
                                               + ((this.address.building2 !== undefined) ? ("строение " + this.address.building2) : "");
                                     };

                                     $scope.cache.clients.to.id[client.id] = client;
                                  });

                                  $scope.loadFinished();
                               };
                            });
   }

   $scope.getCountries();
   $scope.getRegions();
   $scope.getRegionTypes();
   $scope.getCities();
   $scope.getCityTypes();
   $scope.getStreets();
   $scope.getStreetTypes();
   $scope.getBuildings();
   $scope.getClientsFrom();
   $scope.getClientsTo();
   $scope.getDeliveries();
   $scope.getDeliveryStatuses();
   $scope.getShipments();
   $scope.getShipmentStatuses();
   $scope.getShipmentPlaces();

   $scope.suka = function(){
      console.log("suka");
   };
});
