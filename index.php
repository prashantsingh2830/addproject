<html lang="en">

<head>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<!-- Angular JS -->

<script src="js/ang.js"></script>
	
	<script src="js/angular.min.js"></script>
	<script src="js/angular-route.min.js"></script>


		<link rel="stylesheet" href="jquery-ui/jquery-ui.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	
	</head>
<div ng-app="myApp">
    <div ng-controller="TableCtrl">
        <div class="input-group">
            <input class="form-control" ng-model="searchText" placeholder="Search" type="search" ng-change="search()" /> <span class="input-group-addon">
      <span class="glyphicon glyphicon-search"></span>
</span>
        </div>
        <table class="table  table-hover data-table sort display">
            <thead>
                <tr>
                    <th class="ItemName"> <a href="" ng-click="columnToOrder='ItemName';reverse=!reverse">Item Name

                         </a>
                    </th>
                    <th class="Category"> <a href="" ng-click="columnToOrder='Category';reverse=!reverse"> Category </a>
                    </th>
                    <th class="Price"> <a href="" ng-click="columnToOrder='Price';reverse=!reverse"> Price </a>
                    </th>
					 <th class="aq"> <a href="" ng-click="columnToOrder='aq';reverse=!reverse"> Available Quantity </a>
                    </th>
					
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="item in filteredList | orderBy:columnToOrder:reverse">
                    <td>{{item.ItemName}}</td>
                    <td>{{item.Category}}</td>
                    <td>{{item.Price}}</td>
					<td>{{item.aq}}</td>
					
					
                </tr>
            </tbody>
        </table>
       <button ng-click="clicked()" target="_blank">Click me!</button>
    </div>
    <!-- Ends Controller -->
</div>


</body>
<script>
//Demo of Searching and Sorting Table with AngularJS
//var myApp = angular.module('myApp', []);
var myApp = angular.module('myApp', []);
/* myApp.config(['$locationProvider', function($locationProvider){
  $locationProvider.html5Mode(true);   
}]); */


myApp.controller('TableCtrl', ['$location','$scope' ,'$window', function ($location, $scope) {

var searchObject = $location.search();
alert(searchObject.dt);


    $scope.allItems = getDummyData();

    $scope.resetAll = function () {
        $scope.filteredList = $scope.allItems;
        $scope.ItemName = '';
        $scope.Category='';
        $scope.Price = '';
		$scope.AvailableQuantity = '';
        $scope.searchText = '';
    }
    $scope.clicked = function(){   

        window.open('page2.php');
    }

    $scope.search = function () {
		if($scope.searchText.length>3)
		{
		
        $scope.filteredList = _.filter($scope.allItems,

		
		
        function (item) {
            return searchUtil(item, $scope.searchText);
        });
		}

        if ($scope.searchText == '') {
            $scope.filteredList = $scope.allItems;
        }
    }

    $scope.resetAll();
}]);

/* Search Text in all 3 fields */
function searchUtil(item, toSearch) {
    /* Search Text in all 3 fields */
    return (item.ItemName.toLowerCase().indexOf(toSearch.toLowerCase()) > -1 || item.Category.toLowerCase().indexOf(toSearch.toLowerCase()) > -1 || item.ItemName == toSearch) ? true : false;
}

/*Get Dummy Data for Example*/
function getDummyData() {
    return [{
        ItemName: 'Canon EOD 20D',
        Category: 'Camera',
        Price: '20000',
		aq:'3'
    }, {
        ItemName: 'Adidas Light runner Juice it',
        Category: 'Shoess',
        Price: '2000',
		aq:'2'
    }, {
         ItemName: 'Real Apple',
        Category: 'Juice',
        Price: '50',
		aq:'6'
    }];
}

var VLogin = angular.module('myapp',[]);

VLogin.controller('TestCtrl', ['$scope',function($scope) {

    $scope.clicked = function(){   

        $location.path('/test.html');
    }

}]);
</script>