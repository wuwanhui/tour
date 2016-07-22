var app = angular.module("app", ['ngMessages']);
app.service('TourService', ['$http',
    function ($http) {
        this.getAirwaysList = function () {
            return $http.get('/api/v1.0/resources/airways').error(function (result) {
                alert('加载失败：' + result);
            });
        }

        this.getFlightList = function (id) {
            return $http.get('/api/v1.0/resources/airways/flight?aid=' + id).error(function (result) {
                alert('加载失败：' + result);
            });
        }

    }
]);
