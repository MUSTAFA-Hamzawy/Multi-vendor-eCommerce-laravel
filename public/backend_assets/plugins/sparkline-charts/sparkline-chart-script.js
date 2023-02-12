
  $(function() {
    "use strict";

    $('#sparklinechart1').sparkline([ 1, 4, 5, 9, 8, 10, 5, 8, 4, 1, 0, 7, 5, 7, 9, 8, 10, 5], {
            type: 'bar',
            height: '45',
            barWidth: '3',
            resize: true,
            barSpacing: '4',
            barColor: '#ffffff',
			spotColor: '#ffffff',
            minSpotColor: '#ffffff',
            maxSpotColor: '#ffffff',
            highlightSpotColor: '#ffffff',
            highlightLineColor: '#ffffff'
        });
		
		
	$("#sparklinechart2").sparkline([1,1,0,1,-1,-1,1,-1,0,0,1,-1,1,1,-1,0,0,1,1,-1,-1,1,1], {
		type: 'tristate',
		height: '30',
		zeroAxis: false
		});	
		
		
	$("#sparklinechart3").sparkline([28,48,40,19,96,27,100], {
            type: 'line',
            width: '150',
            height: '65',
            lineWidth: '2',
            lineColor: '#ffffff',
            fillColor: 'transparent',
            spotColor: '#ffffff',
            minSpotColor: '#ffffff',
            maxSpotColor: '#ffffff',
            highlightSpotColor: '#ffffff',
            highlightLineColor: '#ffffff'
    }); 	
		
		
	  $("#sparklinechart4").sparkline([5,6,7,9,9,5,3,2,2,4,6,7], {
		type: 'line',
		width: '180',
		height: '65',
		lineWidth: '2',
		lineColor: '#ffffff',
		fillColor: 'rgba(255, 255, 255, 0.65)',
		maxSpotColor: '#ffffff',
		highlightLineColor: '#ffffff',
		highlightSpotColor: '#ffffff'
	  });
  
  
   $('#sparklinechart5').sparkline([20, 20, 20], {
            type: 'pie',
            height: '200',
            resize: true,
            sliceColors: ['rgb(255, 255, 255)', 'rgba(255, 255, 255, 0.65)', 'rgba(255, 255, 255, 0.35)']
        }); 


	$('#sparklinechart6').sparkline([40, 40, 40], {
		  type: 'pie',
		  height: '200',
		  resize: true,
		  sliceColors: ['#d13adf', '#fba540', '#03d0ea']
	  });
	  
  
  $("#sparklinechart7").sparkline([15,16,20,18,19,14,17,12,11,12,10,14,17,14,10,15], {
    type: 'bar',
    width: '100%',
    height: '200',
    barWidth: 6,
    barSpacing: 10,
    barColor: '#ffffff'
  });
  


   });