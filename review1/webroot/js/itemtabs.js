/**
 * Created by Vuilniss on 15/09/2016.
 */

angular.module('storefront', []).controller('tabs', Tabs);

function Tabs($scope){
    $scope.view = '';
    $scope.activeMenu = '';

    $scope.isActive = isActive;
    $scope.showMain = showMain;
    $scope.showSuggestions = showSuggestions;

    $scope.showMain();

    function setView(view, menuId){
        $scope.view = view;
        $scope.activeMenu = menuId;
    }

    function isActive(menuId){
        return $scope.activeMenu === menuId;
    }

    function showMain(){
        setView('main', '');
    }

    function showSuggestions(){
        setView('suggestions', 'Suggestions');
    }
}
