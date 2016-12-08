angular.module('app', ['ui.bootstrap']);
function CarouselCtrl($scope){
	$scope.myInterval = 3000;
	$scope.slides = [
		{
			image: 'http://lorempixel.com/400/200/'
		},
		{
			image: 'http://lorempixel.com/400/200/food'
		},
		{
			image: 'http://lorempixel.com/400/200/sports'
		},
		{
			image: 'http://lorempixel.com/400/200/people'
		}
	];
}