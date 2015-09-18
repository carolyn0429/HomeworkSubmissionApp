angular.module('myapp', ['ngRoute', 'ngResource'])
    .controller('AppCtrl',['$scope', function($scope){
        $scope.subject = true;
        $scope.toggleSubject = function() {
            $scope.subject = $scope.subject === false ? true: false;
        };
	}])
	.controller('HistoryCtrl',['$scope', '$http', function ($scope, $http) {
        $http.get('submissionHistory.php')
        .success(function(data) {
            $scope.submissions = data;
        });
    }])

	.config(['$routeProvider', function($routeProvider){
		$routeProvider.
		when('/',{
			templateUrl: 'views/homeworks.html'
		}).				
		when('/history',{
			templateUrl: 'views/history.html',
			controller: 'HistoryCtrl'
		}).
		when('/contact',{
			templateUrl: 'views/contact.html',
			
		}).
		otherwise({
			redirectTo: '/'
		});
}]);

