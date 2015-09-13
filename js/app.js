angular.module('myapp', ['ngRoute'])
    .controller('AppCtrl',['$scope', function($scope){
        $scope.subject = true;
        $scope.toggleSubject = function() {
            $scope.subject = $scope.subject === false ? true: false;
        };
	}])
	.controller('HistoryCtrl',function($scope){
		$scope.message='This is history page';
	})

	.config(['$routeProvider', function($routeProvider){
		$routeProvider.
		when('/history',{
			templateUrl: '#/history.html',
			controller: 'HistoryCtrl'
		}).
		when('/contact',{
			templateUrl: '#/contact.html',
			controller: 'ContactCtrl'
		}).
		otherwise({
			redirectTo: '/teacherHome.html'
		});
	}]);


