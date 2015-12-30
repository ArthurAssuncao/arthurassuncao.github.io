app.service('toastService', function($rootScope, $mdToast){
    var last = {
        bottom: true,
        top: false,
        left: false,
        right: true
    };
    $rootScope.toastPosition = angular.extend({},last);
        $rootScope.getToastPosition = function() {
        sanitizePosition();
        return Object.keys($rootScope.toastPosition)
            .filter(function(pos) { return $rootScope.toastPosition[pos]; })
            .join(' ');
    };
    function sanitizePosition() {
        var current = $rootScope.toastPosition;
        if ( current.bottom && last.top ) current.top = false;
        if ( current.top && last.bottom ) current.bottom = false;
        if ( current.right && last.left ) current.left = false;
        if ( current.left && last.right ) current.right = false;
        last = angular.extend({},current);
    }
    this.showSimpleToast = function(msg) {
        $mdToast.show(
          $mdToast.simple()
            .content(msg)
            .position($rootScope.getToastPosition())
            .hideDelay(3000)
        );
    };
    this.showSimpleToastTimeMillis = function(msg, time) {
        $mdToast.show(
          $mdToast.simple()
            .content(msg)
            .position($rootScope.getToastPosition())
            .hideDelay(time)
        );
    };
});