//This function creates the Angular module/App
var lcccEventApp = new angular.module( 'wpAngularEventWidget', ['ui.router', 'ngResource'] );

//This factory functions creates the Angular APP FEED
lcccEventApp.factory( 'LCCCEvents', function( $resource ) {
	return $resource( 'https://test.lorainccc.edu/wp-json/wp/v2/lccc_events?filter[order]=ASC&filter[orderby]=meta_value&filter[meta_key]=event_start_date&filter[posts_per_page]=5', {
		ID: '@id'
	})
});

lcccEventApp.controller( 'EventListCtrl', ['$scope', 'LCCCEvents', function( $scope, Posts ) {
	console.log('EventListCtrl');
	Posts.query(function( res ) {
		$scope.posts = res;
	});
}]);
                                

//This is the config function for the app.It routes the templates loaded based on the URL you are on.
lcccEventApp.config( function( $stateProvider, $urlRouterProvider){
	$urlRouterProvider.otherwise('/');
// The states below will load the controller based on what state the visitor is. The state is defined by the URl the visitor is on
	$stateProvider
		.state( 'lccc-event-list', {
			url: '/',
			controller: 'EventListCtrl',
			templateUrl: appInfo.template_directory + 'templates/list.php'
		})
});

lcccEventApp.filter( 'to_trusted', ['$sce', function( $sce ){
	return function( text ) {
		return $sce.trustAsHtml( text );
	}
}])
//End of All LCCC App

//Stocker App starts here

//This function creates the Angular APP
var lcccStockerEventApp = new angular.module( 'wpAngularStockerEvtWidget', ['ui.router', 'ngResource'] );

//This factory functions creates the Angular APP FEED
lcccStockerEventApp.factory( 'LCCCStockerEvents', function( $resource ) {
	return $resource( 'https://sites.lorainccc.edu/stocker/wp-json/wp/v2/lccc_events?filter[order]=ASC&filter[orderby]=meta_value&filter[meta_key]=event_start_date&filter[posts_per_page]=5', {
		ID: '@id'
	})
});

lcccStockerEventApp.controller( 'StockerEventListCtrl', ['$scope', 'LCCCStockerEvents', function( $scope, Posts ) {
	console.log('StockerEventListCtrl');
	Posts.query(function( res ) {
		$scope.posts = res;
	});
	
}]);

//This is the config function for the app.It routes the templates loaded based on the URL you are on.
lcccStockerEventApp.config( function( $stateProvider, $urlRouterProvider){
	$urlRouterProvider.otherwise('/');
// The states below will load the controller based on what state the visitor is. The state is defined by the URl the visitor is on
	$stateProvider
		.state( 'stocker-event-list', {
			url: '/',
			controller: 'StockerEventListCtrl',
			templateUrl: appInfo.template_directory + 'templates/list.php'
		})
});

lcccStockerEventApp.filter( 'to_trusted', ['$sce', function( $sce ){
	return function( text ) {
		return $sce.trustAsHtml( text );
	}
}])

//End of Stocker App

//Athletic App starts here

//This function creates the Angular APP
var lcccAthleticEventApp = new angular.module( 'wpAngularAthEventWidget', ['ui.router', 'ngResource'] );

//This factory functions creates the Angular APP FEED
lcccAthleticEventApp.factory( 'LCCCAthleticEvents', function( $resource ) {
	return $resource( 'https://test.lorainccc.edu/athletics/wp-json/wp/v2/lccc_events?filter[order]=ASC&filter[orderby]=meta_value&filter[meta_key]=event_start_date&filter[posts_per_page]=5', {
		ID: '@id'
	})
});

lcccAthleticEventApp.controller( 'AthEventListCtrl', ['$scope', 'LCCCAthleticEvents', function( $scope, Posts ) {
	console.log('AthEventListCtrl');
	Posts.query(function( res ) {
		$scope.posts = res;
	});
	
}]);

//This is the config function for the app.It routes the templates loaded based on the URL you are on.
lcccAthleticEventApp.config( function( $stateProvider, $urlRouterProvider){
	$urlRouterProvider.otherwise('/');
// The states below will load the controller based on what state the visitor is. The state is defined by the URl the visitor is on
	$stateProvider
		.state( 'athletic-event-list', {
			url: '/',
			controller: 'AthEventListCtrl',
			templateUrl: appInfo.template_directory + 'templates/list.php'
		})
});

lcccAthleticEventApp.filter( 'to_trusted', ['$sce', function( $sce ){
	return function( text ) {
		return $sce.trustAsHtml( text );
	}
}])

//End of Athletic App