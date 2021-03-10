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

        </div>
        <table class="table  table-hover data-table sort display">
            <thead>
                <tr>
                    <th class="Item"> <a href="" ng-click="columnToOrder='Item';reverse=!reverse">Item

                         </a>
                    </th>
                    <th class="Price"> <a href="" ng-click="columnToOrder='Price';reverse=!reverse"> Price </a>
                    </th>
					 <th class="Quantity"> <a href="" ng-click="columnToOrder='Quantity';reverse=!reverse"> Available Quantity </a>
                    </th>
					
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="item in filteredList | orderBy:columnToOrder:reverse">
                    <td>{{item.Item}}</td>
                    <td>{{item.Price}}</td>
                    <td><input class="form-control" ng-model="searchText" placeholder="Search" type="search" id="qq" ng-change="search()" /></td>
					
					
                </tr>
            </tbody>
        </table>
		<button ng-click="clicked()" target="_blank">Buy</button><br/>
		
       <!--<button ng-click="clicked()" target="_blank">Click me!</button>-->
	   <span>{{msg}}</span>
    </div>
    <!-- Ends Controller -->
</div>


</body>
<script>
//Demo of Searching and Sorting Table with AngularJS
var myApp = angular.module('myApp', []);

myApp.controller('TableCtrl', ['$scope','$window', function ($scope) {


$scope.searchText = '';
    $scope.allItems = getDummyData();
$scope.filteredList = $scope.allItems;
/*     $scope.resetAll = function () {
        
        $scope.ItemName = '';
        $scope.Category='';
        $scope.Price = '';
		$scope.AvailableQuantity = '';
        $scope.searchText = '';
    } */
$scope.searchText = "1";
$scope.msg="";
$scope.search = function() {
	
	//$scope.searchText = "";
    var   x=angular.element(document.getElementById("qq"));      
    $scope.textbox = x.val();
        //alert($scope.textbox);
		if($scope.textbox >6)
		{
			$scope.msg= "Error";
			
		}
		else{
			$scope.msg= "";
			
		}

    }
    $scope.clicked = function(){   
    var   x=angular.element(document.getElementById("qq"));      
    $scope.textbox1 = x.val();
        window.location= 'index.php?dt='+ $scope.textbox1+'#%2Fww';
    }

/*     $scope.Search = function () {
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
    } */

    //$scope.resetAll();
}]);

/* Search Text in all 3 fields */
/* function searchUtil(item, toSearch) {
    /* Search Text in all 3 fields */
    //return (item.ItemName.toLowerCase().indexOf(toSearch.toLowerCase()) > -1 || item.Category.toLowerCase().indexOf(toSearch.toLowerCase()) > -1 || item.ItemName == toSearch) ? true : false;
//} 

/*Get Dummy Data for Example*/
function getDummyData() {
    return [{
        Item: 'Real Apple',
        Price: '50',
        Quantity: '1'
    }];
}


</script>