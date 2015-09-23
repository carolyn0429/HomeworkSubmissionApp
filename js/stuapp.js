angular.module('stuapp', ['ngRoute', 'ngResource'])

	.controller('HomeworkCtrl',['$scope', '$http', function ($scope, $http) {
        $http.get('assignedHomework.php')
        .success(function(data) {
            $scope.homeworks = data;
         });
    }])
	.controller('SubmitCtrl',['$scope', '$http', function ($scope, $http) {
        $http.get('assignedHomework.php')
        .success(function(data) {
            $scope.homeworks1 = data;
         });
    }])
    .controller('AnswerCtrl',['$scope', '$http', function ($scope, $http) {
        $http.get('getAnswer.php')
        .success(function(data) {
            $scope.answers = data;
        });
    }])

	.config(['$routeProvider', function($routeProvider){
		$routeProvider.
		when('/student',{
			templateUrl: 'views/studenthw.html',
			controller: 'HomeworkCtrl'
		}).	
		when('/answer',{
			templateUrl: 'views/hwSubmissionHistory.html',
			controller: 'AnswerCtrl'
			
		}).
		when('/submit',{
			templateUrl: 'views/submithw.php',
			controller: 'SubmitCtrl'
			
		}).	
		when('/homeworks',{
			templateUrl: 'views/studenthw.html'
			
		}).
		when('/profile',{
			templateUrl: 'views/profile.html',
			//controller: 'ContactCtrl'
		}).
		otherwise({
			redirectTo: '/student'
		});
}]);