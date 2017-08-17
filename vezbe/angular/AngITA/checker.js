var form = angular.module("form",[]);
form.controller("formController",function($scope){
    $scope.items = [
        {
            name:'Content Menadzment system',
            price:500,
            active:true
        },
        {
            name:'Dokument Menadzment sistem',
            price:400,
            active:false
        },
        {
            name:'Membership System',
            price:250,
            active:false
        },
         {
            name:'SMS Service',
            price:250,
            active:false
        }
    ];
    $scope.toggleactive=function(s){
        s.active=!s.active;
    }
    $scope.total=function(){
        var total=0;
        angular.forEach($scope.items, function(s) {
            if(s.active){
                total+= s.price;
            }
        
        });
        return total;
    }
})