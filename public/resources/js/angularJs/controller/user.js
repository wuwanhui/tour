angular.module('app', []).controller('user', function($scope,$http) {
	
	$http({
		method : "get",
		url : "http://localhost:8080/supplier-controller/manage/system/user/list.json"

	}).success(function(data, header, config, status) {
		$scope.users = data.datas;

	}).error(function(data, header, config, status) {
		alert(data);
	});
	

});