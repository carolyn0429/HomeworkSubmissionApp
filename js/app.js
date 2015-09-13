angular.module('myapp', [])
    .controller('AppCtrl',['$scope', function($scope){
        $scope.subject = true;
        $scope.toggleSubject = function() {
            $scope.subject = $scope.subject === false ? true: false;
        };
    
}]);