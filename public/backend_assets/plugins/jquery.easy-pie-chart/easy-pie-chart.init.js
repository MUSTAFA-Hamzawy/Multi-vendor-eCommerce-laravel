!function($) {
    "use strict";

    var EasyPieChart = function() {};

    EasyPieChart.prototype.init = function() {
    	//initializing various types of easy pie charts
		
    	$('.easy-pie-chart-1').easyPieChart({
			easing: 'easeOutBounce',
			barColor : '#ffffff',
			lineWidth: 6,
			animate: 1000,
            lineCap: 'rgba(255, 255, 255, 0.14)',
            trackColor : 'rgba(255, 255, 255, 0.14)',
			onStep: function(from, to, percent) {
				$(this.el).find('.percent').text(Math.round(percent));
			}
		});

		$('.easy-pie-chart-2').easyPieChart({
			easing: 'easeOutBounce',
			barColor : '#ffffff',
			lineWidth: 6,
			lineCap: 'rgba(255, 255, 255, 0.14)',
            trackColor : 'rgba(255, 255, 255, 0.14)',
			onStep: function(from, to, percent) {
				$(this.el).find('.percent').text(Math.round(percent));
			}
		});

		$('.easy-pie-chart-3').easyPieChart({
			easing: 'easeOutBounce',
			barColor : '#ffffff',
			lineWidth: 6,
			lineCap: 'rgba(255, 255, 255, 0.14)',
            trackColor : 'rgba(255, 255, 255, 0.14)',
			onStep: function(from, to, percent) {
				$(this.el).find('.percent').text(Math.round(percent));
			}
		});

		$('.easy-pie-chart-4').easyPieChart({
			easing: 'easeOutBounce',
			barColor : '#ffffff',
			lineWidth: 6,
			lineCap: 'rgba(255, 255, 255, 0.14)',
            trackColor : 'rgba(255, 255, 255, 0.14)',
			onStep: function(from, to, percent) {
				$(this.el).find('.percent').text(Math.round(percent));
			}
		});

		$('.easy-pie-chart-5').easyPieChart({
			easing: 'easeOutBounce',
			barColor : '#ffffff',
			lineWidth: 8,
			trackColor : 'rgba(255, 255, 255, 0.14)',
			scaleColor: false,
			onStep: function(from, to, percent) {
				$(this.el).find('.percent').text(Math.round(percent));
			}
		});

		$('.easy-pie-chart-6').easyPieChart({
			easing: 'easeOutBounce',
			barColor : '#ffffff',
			lineWidth: 8,
			trackColor : 'rgba(255, 255, 255, 0.14)',
			scaleColor: false,
			onStep: function(from, to, percent) {
				$(this.el).find('.percent').text(Math.round(percent));
			}
		});


		$('.easy-pie-chart-7').easyPieChart({
			easing: 'easeOutBounce',
			barColor : '#ffffff',
			lineWidth: 8,
			trackColor : 'rgba(255, 255, 255, 0.14)',
			scaleColor: false,
			onStep: function(from, to, percent) {
				$(this.el).find('.percent').text(Math.round(percent));
			}
		});

		$('.easy-pie-chart-8').easyPieChart({
			easing: 'easeOutBounce',
			barColor : '#ffffff',
			lineWidth: 8,
			trackColor : 'rgba(255, 255, 255, 0.14)',
			scaleColor: false,
			onStep: function(from, to, percent) {
				$(this.el).find('.percent').text(Math.round(percent));
			}
		});


    },
    //init
    $.EasyPieChart = new EasyPieChart, $.EasyPieChart.Constructor = EasyPieChart
}(window.jQuery),

//initializing
function($) {
    "use strict";
    $.EasyPieChart.init()
}(window.jQuery);