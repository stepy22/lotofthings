var app = angular.module('myApp',[]);
app.controller('mainControler',function($scope, $log,filmDB){
$scope.svifilmovi=filmDB;
    $scope.classType=''
});
