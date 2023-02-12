$(function() {
    "use strict";



// chart 1

var options = {
            chart: {
                height: 125,
                type: 'area',
                zoom: {
                      enabled: false
                    },
             foreColor: '#4e4e4e',
             toolbar: {
                  show: false
                },
          sparkline:{
              enabled:true,
            },
            dropShadow: {
                    enabled: false,
                    opacity: 0.15,
                    blur: 3,
                    left: -7,
                    top: 15,
                    //color: 'rgba(0, 158, 253, 0.65)',
                }
            },
            plotOptions: {
                bar: {
            columnWidth: '10%',
              endingShape: 'rounded',
                    dataLabels: {
                        position: 'top', // top, center, bottom
                    },
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                width: 3, 
                curve: 'straight'
            },
            series: [{
                name: 'Twitter Followers',
                data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
            }],

            xaxis: {
                type: 'month',
                categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct"],                
            },
            yaxis: {
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false,
                },
                labels: {
                    show: false,
                    formatter: function(val) {
                    return parseInt(val);
                  }
                }

            },
            fill: {
                type: 'gradient',
                gradient: {
                    shade: 'light',
                    //gradientToColors: ['#6a11cb'],
                    shadeIntensity: 1,
                    type: 'vertical',
                    opacityFrom: 0.8,
                    opacityTo: 0.2,
                    stops: [0, 80, 100]
                },
            },
            //colors: ['#2575fc'],
            legend: {
                show: 0,
                position: "top",
                horizontalAlign: "center",
                offsetX: -20,
                fontSize: "12px",
                markers: {
                  radius: 50,
                  width: 10,
                  height: 10
                }
              },
            grid:{
                show: false,
                borderColor: 'rgba(66, 59, 116, 0.12)',
            },
            tooltip: {
                theme: 'dark',
                x: {
                    show: false
                },

            }
        }

        var chart = new ApexCharts(
            document.querySelector("#twitter-followers"),
            options
        );

        chart.render();
		
		
		
		
	// chart 2

    var options = {
            chart: {
                height: 290,
                type: 'radialBar',
            },
            plotOptions: {
                radialBar: {
					startAngle: -135,
                    endAngle: 225,
					hollow: {
						margin: 0,
						size: '65%',
						background: '#000',
						dropShadow: {
                        enabled: true,
                        top: -3,
                        left: 0,
                        blur: 4,
                        opacity: 0.35
                        }
					  },
                    track: {
                      background: '#fff',
                      strokeWidth: '100%',
                      margin: 0, // margin is in pixels
                      dropShadow: {
                        enabled: true,
                        top: -3,
                        left: 0,
                        blur: 4,
                        opacity: 0.35
                      }
                    },
                    dataLabels: {
                        name: {
                            fontSize: '14px',
                            color: '#fff',
                            offsetY: -10
                        },
                        value: {
                            offsetY: 0,
                            fontSize: '22px',
                            color: '#fff',
                            formatter: function (val) {
                                return val + "%";
                            }
                        }
                    }
                },
            },
            stroke: {
                dashArray: 4
            },
            fill: {
              type: 'gradient',
              gradient: {
              shade: 'dark',
              type: 'horizontal',
              shadeIntensity: 0.5,
              gradientToColors: ['#f31368'],
              inverseColors: false,
              opacityFrom: 1,
              opacityTo: 1,
              stops: [0, 100]
            }
         },
		  colors: ["#0ce8fe"],
          series: [75],
          labels: ['Median Ratio'],
            
        }

       var chart = new ApexCharts(
            document.querySelector("#total-visitors"),
            options
        );
        
        chart.render();

         



  // chart 3

  var options = {
            chart: {
                height: 35,
                type: 'bar',
                zoom: {
                      enabled: false
                    },
             foreColor: '#4e4e4e',
             toolbar: {
                  show: false
                },
          sparkline:{
              enabled:true,
            },
            dropShadow: {
                    enabled: true,
                    opacity: 0.1,
                    blur: 3,
                    left: -7,
                    top: 15,
                    //color: 'rgba(0, 158, 253, 0.65)',
                }
            },
            plotOptions: {
                bar: {
            columnWidth: '10%',
              endingShape: 'rounded',
                    dataLabels: {
                        position: 'top', // top, center, bottom
                    },
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                width: 3, 
                curve: 'straight'
            },
            series: [{
                name: 'Facebook Pageviews',
                data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
            }],

            xaxis: {
                type: 'month',
                categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct"],                
            },
            yaxis: {
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false,
                },
                labels: {
                    show: false,
                    formatter: function(val) {
                    return parseInt(val);
                  }
                }

            },
            fill: {
                type: 'gradient',
                gradient: {
                    shade: 'light',
                    gradientToColors: ['#8f50ff'],
                    shadeIntensity: 1,
                    type: 'vertical',
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [0, 80, 100]
                },
            },
            colors: ['#d13adf'],
            legend: {
                show: 0,
                position: "top",
                horizontalAlign: "center",
                offsetX: -20,
                fontSize: "12px",
                markers: {
                  radius: 50,
                  width: 10,
                  height: 10
                }
              },
            grid:{
                show: false,
                borderColor: 'rgba(66, 59, 116, 0.12)',
            },
            tooltip: {
                theme: 'dark',
                x: {
                    show: false
                },

            }
        }

        var chart = new ApexCharts(
            document.querySelector("#facebook-pageviews"),
            options
        );

        chart.render();
		
		
		
		

// chart 4


var options = {
            chart: {
                height: 35,
                type: 'line',
                zoom: {
                      enabled: false
                    },
             foreColor: '#4e4e4e',
             toolbar: {
                  show: false
                },
          sparkline:{
              enabled:true,
            },
            dropShadow: {
                    enabled: true,
                    opacity: 0.15,
                    blur: 3,
                    left: -7,
                    top: 5,
                    //color: 'rgba(0, 158, 253, 0.65)',
                }
            },
            plotOptions: {
                bar: {
            columnWidth: '10%',
              endingShape: 'rounded',
                    dataLabels: {
                        position: 'top', // top, center, bottom
                    },
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                width: 2.5, 
                curve: 'straight'
            },
            series: [{
                name: 'Bounce Rate',
                data: [85, 101, 98, 87, 105, 91, 114, 94]
            }],

            xaxis: {
                type: 'month',
                categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct"],                
            },
            yaxis: {
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false,
                },
                labels: {
                    show: false,
                    formatter: function(val) {
                    return parseInt(val);
                  }
                }

            },
            fill: {
                type: 'gradient',
                gradient: {
                    shade: 'light',
                    gradientToColors: ['#00b09b'],
                    shadeIntensity: 1,
                    type: 'horizontal',
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [0, 80, 100]
                },
            },
            colors: ['#96c93d'],
            legend: {
                show: 0,
                position: "top",
                horizontalAlign: "center",
                offsetX: -20,
                fontSize: "12px",
                markers: {
                  radius: 50,
                  width: 10,
                  height: 10
                }
              },
            grid:{
                show: false,
                borderColor: 'rgba(66, 59, 116, 0.12)',
            },
            tooltip: {
                theme: 'dark',
                x: {
                    show: false
                },

            }
        }

        var chart = new ApexCharts(
            document.querySelector("#bounce-rate"),
            options
        );

        chart.render();
		



 
// chart 5

var options = {
            chart: {
                height: 200,
                type: 'area',
                zoom: {
                      enabled: false
                    },
             foreColor: '#4e4e4e',
             toolbar: {
                  show: true
                },
          sparkline:{
              enabled:false,
            },
            dropShadow: {
                    enabled: false,
                    opacity: 0.15,
                    blur: 3,
                    left: -7,
                    top: 15,
                    //color: 'rgba(0, 158, 253, 0.65)',
                }
            },
            plotOptions: {
                bar: {
            columnWidth: '30%',
              endingShape: 'rounded',
                    dataLabels: {
                        position: 'top', // top, center, bottom
                    },
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                width: 0, 
                curve: 'smooth'
            },
            series: [{
                name: 'List Subscribers',
                data: [4, 3, 10, 9, 29, 19, 22, 9, 12, 7, 19, 5]
            }],

            xaxis: {
                type: 'month',
                categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],                
            },
            yaxis: {
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false,
                },
                labels: {
                    show: false,
                    formatter: function(val) {
                    return parseInt(val);
                  }
                }

            },

            fill: {
                type: 'gradient',
                gradient: {
                    shade: 'light',
                    gradientToColors: ['#ee0979'],
                    shadeIntensity: 1,
                    type: 'vertical',
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [0, 100, 100, 100]
                },
            },
            colors: ['#ff6a00'],
            grid:{
                show: true,
                borderColor: 'rgba(66, 59, 116, 0.15)',
            },
            tooltip: {
                theme: 'dark',
                x: {
                    show: false
                },

            },
            title: {
                text: 'Monthly List Subscribers'
            }
        }

        var chart = new ApexCharts(
            document.querySelector("#list-subscribers"),
            options
        );

        chart.render();



     

     // chart 6

     var optionsProgress1 = {
	  chart: {
	    height: 70,
	    type: 'bar',
	    stacked: true,
	    sparkline: {
	      enabled: true
	    }
	  },
	  plotOptions: {
	    bar: {
	      horizontal: true,
	      barHeight: '20%',
	      colors: {
	        backgroundBarColors: ['#40475D']
	      }
	    },
	  },
	  dataLabels: {
             enabled: false
          },
	  stroke: {
	    width: 0,
	  },
	  series: [{
	    name: 'Direct',
	    data: [44]
	  }],
	  title: {
	    floating: true,
	    offsetX: -10,
	    offsetY: 5,
	    text: 'Direct'
	  },
	  subtitle: {
	    floating: true,
	    align: 'right',
	    offsetY: 0,
	    text: '44%',
	    style: {
	      fontSize: '20px'
	    }
	  },
	  fill: {
	    type: 'gradient',
	    gradient: {
	      gradientToColors: ['#F55555']
	    },
	  },
	  colors: ['#FCCF31'],
	  tooltip: {
	  	theme: 'dark',
	  	x: {
              show: false
             },
	    enabled: true
	    
	  },
	  xaxis: {
	    categories: ['Direct'],
	  },
	  yaxis: {
	    max: 100
	  }
	}

	var chartProgress1 = new ApexCharts(document.querySelector('#direct'), optionsProgress1);
	chartProgress1.render();





	// chart 7

     var optionsProgress2 = {
	  chart: {
	    height: 70,
	    type: 'bar',
	    stacked: true,
	    sparkline: {
	      enabled: true
	    }
	  },
	  plotOptions: {
	    bar: {
	      horizontal: true,
	      barHeight: '20%',
	      colors: {
	        backgroundBarColors: ['#40475D']
	      }
	    },
	  },
	  dataLabels: {
           enabled: false
        },
	  stroke: {
	    width: 0,
	  },
	  series: [{
	    name: 'Organic Search',
	    data: [80]
	  }],
	  title: {
	    floating: true,
	    offsetX: -10,
	    offsetY: 5,
	    text: 'Organic Search'
	  },
	  subtitle: {
	    floating: true,
	    align: 'right',
	    offsetY: 0,
	    text: '80%',
	    style: {
	      fontSize: '20px'
	    }
	  },
	  fill: {
	    type: 'gradient',
	    gradient: {
	      gradientToColors: ['#6078ea']
	    },
	  },
	  colors: ['#17ead9'],
	  tooltip: {
	  	theme: 'dark',
	  	x: {
              show: false
             },
	    enabled: true
	    
	  },
	  xaxis: {
	    categories: ['Organic Search'],
	  },
	  yaxis: {
	    max: 100
	  },
	}

	var chartProgress2 = new ApexCharts(document.querySelector('#organic-search'), optionsProgress2);
	chartProgress2.render();




// chart 8

    var optionsProgress3 = {
	  chart: {
	    height: 70,
	    type: 'bar',
	    stacked: true,
	    sparkline: {
	      enabled: true
	    }
	  },
	  plotOptions: {
	    bar: {
	      horizontal: true,
	      barHeight: '20%',
	      colors: {
	        backgroundBarColors: ['#40475D']
	      }
	    },
	  },
	  dataLabels: {
           enabled: false
        },
	  stroke: {
	    width: 0,
	  },
	  series: [{
	    name: 'Referral',
	    data: [74]
	  }],
	  title: {
	    floating: true,
	    offsetX: -10,
	    offsetY: 5,
	    text: 'Referral'
	  },
	  subtitle: {
	    floating: true,
	    align: 'right',
	    offsetY: 0,
	    text: '74%',
	    style: {
	      fontSize: '20px'
	    }
	  },
	  fill: {
	    type: 'gradient',
	    gradient: {
	      gradientToColors: ['#6094ea']
	    },
	  },
	  colors: ['#f02fc2'],
	  tooltip: {
	  	theme: 'dark',
	  	x: {
              show: false
             },
	    enabled: true
	    
	  },
	  xaxis: {
	    categories: ['Referral'],
	  },
	  yaxis: {
	    max: 100
	  },
	}

   var chartProgress3 = new ApexCharts(document.querySelector('#referral'), optionsProgress3);
	chartProgress3.render();
	
	
	
	
	// chart 9

    var optionsProgress4 = {
	  chart: {
	    height: 70,
	    type: 'bar',
	    stacked: true,
	    sparkline: {
	      enabled: true
	    }
	  },
	  plotOptions: {
	    bar: {
	      horizontal: true,
	      barHeight: '20%',
	      colors: {
	        backgroundBarColors: ['#40475D']
	      }
	    },
	  },
	  dataLabels: {
           enabled: false
        },
	  stroke: {
	    width: 0,
	  },
	  series: [{
	    name: 'Social',
	    data: [63]
	  }],
	  title: {
	    floating: true,
	    offsetX: -10,
	    offsetY: 5,
	    text: 'Social'
	  },
	  subtitle: {
	    floating: true,
	    align: 'right',
	    offsetY: 0,
	    text: '63%',
	    style: {
	      fontSize: '20px'
	    }
	  },
	  fill: {
	    type: 'gradient',
	    gradient: {
	      gradientToColors: ['#6a11cb']
	    },
	  },
	  colors: ['#2575fc'],
	  tooltip: {
	  	theme: 'dark',
	  	x: {
              show: false
             },
	    enabled: true
	    
	  },
	  xaxis: {
	    categories: ['Social'],
	  },
	  yaxis: {
	    max: 100
	  },
	}

   var chartProgress4 = new ApexCharts(document.querySelector('#social'), optionsProgress4);
	chartProgress4.render();



    
   // chart 10

    var options = {
      chart: {
        height: 270,
        type: 'radialBar',
        toolbar: {
          show: false
        }
      },
      plotOptions: {
        radialBar: {
          //startAngle: -135,
          //endAngle: 225,
           hollow: {
            margin: 0,
            size: '85%',
            background: 'transparent',
            image: undefined,
            imageOffsetX: 0,
            imageOffsetY: 0,
            position: 'front',
            dropShadow: {
              enabled: true,
              top: 3,
              left: 0,
              blur: 4,
              color: 'rgba(0, 169, 255, 0.85)',
              opacity: 0.65
            }
          },
          track: {
            background: '#fff',
            strokeWidth: '67%',
            margin: 0, // margin is in pixels
            dropShadow: {
              enabled: true,
              top: -3,
              left: 0,
              blur: 4,
			  color: 'rgba(0, 169, 255, 0.85)',
              opacity: 0.65
            }
          },

          dataLabels: { 
            showOn: 'always',
            name: {
              offsetY: -5,
              show: false,
              color: '#000',
              fontSize: '14px'
            },
            value: {
              formatter: function (val) {
						return val + "%";
					},
              color: '#000',
              fontSize: '35px',
              show: true,
			  offsetY: 10,
            }
          }
        }
      },
      fill: {
        type: 'gradient',
        gradient: {
          shade: 'light',
          type: 'horizontal',
          shadeIntensity: 0.5,
          gradientToColors: ['#0072ff'],
          inverseColors: false,
          opacityFrom: 1,
          opacityTo: 1,
          stops: [0, 100]
        }
      },
      colors: ["#00c8ff"],
      series: [64],
      stroke: {
        lineCap: 'round',
        //dashArray: 4
      },
      labels: ['Newsletter Open Rate'],

    }

    var chart = new ApexCharts(
      document.querySelector("#newsletter-open-rate"),
      options
    );

    chart.render();

		
	// chart 11


	var options = {
      chart: {
        height: 270,
        type: 'radialBar',
        toolbar: {
          show: false
        }
      },
      plotOptions: {
        radialBar: {
         //startAngle: -135,
         // endAngle: 225,
           hollow: {
            margin: 0,
            size: '85%',
            background: 'transparent',
            image: undefined,
            imageOffsetX: 0,
            imageOffsetY: 0,
            position: 'front',
            dropShadow: {
              enabled: true,
              top: 3,
              left: 0,
              blur: 4,
              color: 'rgba(229, 124, 107, 0.85)',
              opacity: 0.65
            }
          },
          track: {
            background: '#fff',
            strokeWidth: '67%',
            margin: 0, // margin is in pixels
            dropShadow: {
              enabled: true,
              top: -3,
              left: 0,
              blur: 4,
			  color: 'rgba(229, 124, 107, 0.85)',
              opacity: 0.65
            }
          },

          dataLabels: { 
            showOn: 'always',
            name: {
              offsetY: -5,
              show: false,
              color: '#000',
              fontSize: '14px'
            },
            value: {
              formatter: function (val) {
						return val + "%";
					},
              color: '#000',
              fontSize: '35px',
              show: true,
			  offsetY: 10,
            }
          }
        }
      },
      fill: {
        type: 'gradient',
        gradient: {
          shade: 'light',
          type: 'horizontal',
          shadeIntensity: 0.5,
          gradientToColors: ['#db36a4'],
          inverseColors: false,
          opacityFrom: 1,
          opacityTo: 1,
          stops: [0, 100]
        }
      },
      colors: ["#f7ff00"],
      series: [68],
      stroke: {
        lineCap: 'round',
        //dashArray: 4
      },
      labels: ['Click Through Rate'],

    }

    var chart = new ApexCharts(
      document.querySelector("#click-through-rate"),
      options
    );

    chart.render();	











    });