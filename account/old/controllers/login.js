app.controller('login', function($scope, $http, $locale, $cookies, $location, $timeout, $interval){

   console.log("CONTROLLER: login");

   $scope.form = {};
   $scope.form.login    = "admin";
   $scope.form.password = "admin";


   $scope.recovery = {};





   $scope.login = function(e){
      console.log("login() login=" + $scope.form.login + " password=" + $scope.form.password);

      if(angular.isUndefined($scope.form.login) || $scope.form.login == ''){
         $scope.form.errorCode = 99000;
      }
      else if(angular.isUndefined($scope.form.password) || $scope.form.password == ''){
         $scope.form.errorCode = 99001;
      }
      else{
         $scope.server.loading = true;

         $scope.server.request("/user/login",
                               [$scope.form.login, $scope.form.password, new Date().getTimezoneOffset()],
                               function(response){
                                  $scope.form.errorCode = response.operationCode;
                                  console.log(response.operationCode);

                                  if(response.operationCode == 0){
                                     $cookies.put("SID",  response.SID, {'expires': $scope.dateLongCookie});
                                     $scope.profile.SID = response.SID;


                                     $scope.server.request("/user/profile",
                                                           [$cookies.get("SID")],
                                                           function(response){
                                                              if(response.operationCode == 0){
                                                                 console.log("SID: valid");
                                                                 $scope.profile.nameFirst = response.nameFirst;
                                                                 $scope.profile.nameLast  = response.nameLast;
                                                                 $scope.profile.isAdmin   = response.isAdmin;

                                                                 $scope.nav("dashboard", "parcels");
                                                              }
                                                              else{
                                                                 $scope.nav("login");
                                                              }
                                                           });



/*
                                     if($cookies.get("page") == null || $cookies.get("page")[0] == "login"){
                                        $scope.nav("dashboard", "parcels");
                                     }
                                     else{
                                        $scope.nav($cookies.get("page"));
                                     }
*/
                                  }
                                  else{
                                     delete $scope.server.loading;
                                  }
                               });
      }

      e.preventDefault();
   };


   $scope.server.loading = false;

});


