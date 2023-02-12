$(function() {
    "use strict";

  // chart 1

    var options = {
            chart: {
                height: 325,
                type: 'bar',
                stacked: false,
                foreColor: '#4e4e4e',
                toolbar: {
                      show: false
                    },
                dropShadow: {
                    enabled: true,
                    opacity: 0.1,
                    blur: 3,
                    left: -7,
                    top: 22,
                }
            },
            plotOptions: {
                bar: {
            columnWidth: '50%',
              endingShape: 'rounded',
                    dataLabels: {
                        position: 'top', // top, center, bottom
                    },
                }
            },
            dataLabels: {
                enabled: false,
                formatter: function(val) {
                  return parseInt(val);
                },
                offsetY: -20,
                style: {
                    fontSize: '14px',
                    colors: ["#304758"]
                }
            },
             stroke: {
                show: !0,
                width: 2,
                colors: ["transparent"]
            },
            grid:{
                show: true,
                borderColor: 'rgba(0, 0, 0, 0.10)',
                borderColor: 'rgba(0, 0, 0, 0.10)',
            },
            series: [{
                name: 'External Costs',
                data: [44, 75, 37, 56, 61, 58, 83, 60, 66]
            }, {
                name: 'Internal Costs',
                data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
            }, {
                name: 'Cost Per Hire',
                data: [20, 41, 26, 46, 30, 50, 12, 53, 41]
            }],
            xaxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shade: 'dark',
                    gradientToColors: [ '#009efd', '#ff6a00', '#000428'],
                    shadeIntensity: 1,
                    type: 'vertical',
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [0, 100, 100, 100]
                },
            },
            colors: ["#2af598", "#ee0979", '#0072ff'],
            tooltip: {
                theme: 'dark',
                y: {
                    formatter: function (val) {
                        return "$ " + val + " "
                    }
                }
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                  height: 330,
                  stacked: true,
                          },
                legend: {
                  show: !0,
                  position: "top",
                  horizontalAlign: "left",
                  offsetX: -20,
                  fontSize: "10px",
                  markers: {
                    radius: 50,
                    width: 10,
                    height: 10
                  }
                  },
                  plotOptions: {
                  bar: {
                    columnWidth: '30%'
                    }
                  }
                      }
                  }]
        }

        var chart = new ApexCharts(
            document.querySelector("#recruitment-cost"),
            options
        );

        chart.render();





// chart 2
    
    var options = {
            chart: {
                height: 340,
                type: 'radialBar',
            },
            plotOptions: {
                radialBar: {
                  //startAngle: -135,
                  //endAngle: 135,
                  hollow: {
                      margin: 12,
                      size: '50%',
                      background: '#fff',
                      image: undefined,
                      imageOffsetX: 0,
                      imageOffsetY: 0,
                      position: 'front',
                      dropShadow: {
                        enabled: true,
                        top: 3,
                        left: 0,
                        blur: 4,
                        opacity: 0.24
                      }
                    },
                    track: {
                      background: '#eeedfb',
                      strokeWidth: '20%',
                      margin: 5, // margin is in pixels
                      dropShadow: {
                        enabled: false,
                        top: -3,
                        left: 0,
                        blur: 4,
                        opacity: 0.35
                      }
                    },
                    dataLabels: {
                        name: {
                            color:'#000',
                            fontSize: '14px',
                            offsetY: -5
                        },
                        value: {
                            color: '#000',
                            fontSize: '25px',
                            offsetY: 5
                        },
                        total: {
                            show: true,
                            label: 'Total',
                            color: '#000',
                            formatter: function (w) {
                                // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
                                return 300
                            }
                        }
                    }
                }
            },
            stroke: {
               lineCap: "round",
           },
      fill: {
              type: 'gradient',
                gradient: {
                    shade: 'dark',
                    gradientToColors: [ '#d13adf', '#d13adf', '#f7971e', '#08a50e'],
                    shadeIntensity: 1,
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [0, 100, 100, 100]
                },
            },
      colors: ["#8f50ff", "#f1076f", "#ffd200", "#cddc35"],
            series: [90, 80, 70, 60],
            labels: ['Career Page', 'Referral', 'Agency', 'Job Boards'],
			responsive: [{
                breakpoint: 1280,
                options: {
                    chart: {
                        height: 350
                    }
                }
            }]
            
        }

       var chart = new ApexCharts(
            document.querySelector("#application-by-source"),
            options
        );
        
        chart.render();




// chart 3
  
  var options = {
            chart: {
                width: 150,
        //height: 150,
                type: 'radialBar',
            },
            plotOptions: {
                radialBar: {
                    //startAngle: -135,
                    //endAngle: 135,
                    hollow: {
                      margin: 0,
                      size: '70%',
                      background: '#fff',
                      image: undefined,
                      imageOffsetX: 0,
                      imageOffsetY: 0,
                      position: 'front',
                      dropShadow: {
                        enabled: true,
                        top: 3,
                        left: 0,
                        blur: 4,
                        opacity: 0.1
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
                        opacity: 0.1
                      }
                    },
                    dataLabels: {
                        name: {
                            fontSize: '14px',
                            color: '#000',
                            offsetY: -10,
              show: false
                        },
                        value: {
                            offsetY: 6,
                            fontSize: '20px',
                            color: '#000',
                            formatter: function (val) {
                                return val + "%";
                            }
                        }
                    }
                }
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shade: 'dark',
                    shadeIntensity: 0.15,
                    gradientToColors: ['#f14793'],
                    inverseColors: false,
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [0, 50, 65, 91]
                },
            },
            stroke: {
                dashArray: 4,
            },
            colors: ["#5204ce"],
            series: [64],
            labels: ['Screening Calls'],
            
        }

       var chart = new ApexCharts(
            document.querySelector("#screening-calls"),
            options
        );
        
        chart.render();





// chart 4
  
  var options = {
            chart: {
                width: 150,
        //height: 150,
                type: 'radialBar',
            },
            plotOptions: {
                radialBar: {
                    //startAngle: -135,
                    //endAngle: 135,
                    hollow: {
                      margin: 0,
                      size: '70%',
                      background: '#fff',
                      image: undefined,
                      imageOffsetX: 0,
                      imageOffsetY: 0,
                      position: 'front',
                      dropShadow: {
                        enabled: true,
                        top: 3,
                        left: 0,
                        blur: 4,
                        opacity: 0.1
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
                        opacity: 0.1
                      }
                    },
                    dataLabels: {
                        name: {
                            fontSize: '14px',
                            color: '#000',
                            offsetY: -10,
              show: false
                        },
                        value: {
                            offsetY: 6,
                            fontSize: '20px',
                            color: '#000',
                            formatter: function (val) {
                                return val + "%";
                            }
                        }
                    }
                }
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shade: 'dark',
                    shadeIntensity: 0.15,
                    gradientToColors: ['#ff5447'],
                    inverseColors: false,
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [0, 50, 65, 91]
                },
            },
            stroke: {
                dashArray: 4,
            },
            colors: ["#f1076f"],
            series: [76],
            labels: ['Assignments'],
            
        }

       var chart = new ApexCharts(
            document.querySelector("#assignments"),
            options
        );
        
        chart.render();




// chart 5
  
  var options = {
            chart: {
                width: 150,
        //height: 150,
                type: 'radialBar',
            },
            plotOptions: {
                radialBar: {
                    //startAngle: -135,
                    //endAngle: 135,
                    hollow: {
                      margin: 0,
                      size: '70%',
                      background: '#fff',
                      image: undefined,
                      imageOffsetX: 0,
                      imageOffsetY: 0,
                      position: 'front',
                      dropShadow: {
                        enabled: true,
                        top: 3,
                        left: 0,
                        blur: 4,
                        opacity: 0.1
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
                        opacity: 0.1
                      }
                    },
                    dataLabels: {
                        name: {
                            fontSize: '14px',
                            color: '#000',
                            offsetY: -10,
              show: false
                        },
                        value: {
                            offsetY: 6,
                            fontSize: '20px',
                            color: '#000',
                            formatter: function (val) {
                                return val + "%";
                            }
                        }
                    }
                }
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shade: 'dark',
                    shadeIntensity: 0.15,
                    gradientToColors: ['#0575e6'],
                    inverseColors: false,
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [0, 50, 65, 91]
                },
            },
            stroke: {
                dashArray: 4,
            },
            colors: ["#00f260"],
            series: [83],
            labels: ['interviews'],
            
        }

       var chart = new ApexCharts(
            document.querySelector("#interviews"),
            options
        );
        
        chart.render();




// chart 6
   
   var options = {
      chart: {
        height: 335,
        type: 'radialBar',
        toolbar: {
          show: false
        }
      },
      plotOptions: {
        radialBar: {
          startAngle: -135,
          endAngle: 225,
           hollow: {
            margin: 20,
            size: '80%',
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
              opacity: 0.24
            }
          },
          track: {
            background: '#fff',
            //strokeWidth: '67%',
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
            showOn: 'always',
            name: {
              offsetY: -10,
              show: false,
              color: '#32393f',
              fontSize: '16px'
            },
            value: {
              formatter: function (val) {
          return val + "%";
         },
              color: '#32393f',
              fontSize: '40px',
              show: true,
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
          gradientToColors: ['#f1076f'],
          inverseColors: false,
          opacityFrom: 1,
          opacityTo: 1,
          stops: [0, 100]
        }
      },
     // colors: ["#ff5447"],
      series: [75],
      stroke: {
        lineCap: 'round'
      },
      labels: ['Median Ratio'],

    }

    var chart = new ApexCharts(
      document.querySelector("#vacancies-status"),
      options
    );

    chart.render();




// chart 7

var options = {
            chart: {
                height: 330,
                type: 'bar',
                toolbar: {
                  show: false
                },
        dropShadow: {
                    enabled: true,
                    opacity: 0.1,
                    blur: 3,
                    left: -7,
                    top: 22,
                }
            },
            plotOptions: {
                bar: {
                    barHeight: '100%',
                    endingShape: 'rounded',
                    distributed: true,
                    horizontal: true,
                    dataLabels: {
                        position: 'bottom'
                    },
                }
            },
             fill: {
                type: 'gradient',
                gradient: {
                    shade: 'dark',
                    gradientToColors: [ '#8f50ff', '#0072ff', '#f1076f', '#08a50e', '#f7971e', '#fc00ff', '#000428', '#ba8b02', '#009efd', '#000000'],
                    shadeIntensity: 1,
                    type: 'horizontal',
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [0, 100, 100, 100]
                },
            },
            colors: ['#d13adf', '#00c8ff', '#ff5447', '#cddc35', '#ffd200', '#00dbde', '#004e92', '#181818', '#2af598', '#ffffff'],
            dataLabels: {
                enabled: true,
                textAnchor: 'start',
                style: {
                    colors: ['#fff']
                },
                formatter: function(val, opt) {
                    return opt.w.globals.labels[opt.dataPointIndex] + ":  " + val
                },
                offsetX: 0,
                dropShadow: {
                  enabled: true
                }
            },
            series: [{
                data: [950, 730, 848, 570, 840, 580, 900, 1100, 1200, 1280]
            }],
            stroke: {
                width: 1,
              colors: ['#fff'],

            },
            xaxis: {
                categories: ['Direct', 'Google', 'Medium.com', 'Git Hub', 'Envato', 'Youtube', 'cs.champion.com', 'T.co', 'Facebbok', 'LinkedIn'],
            },
            yaxis: {
                labels: {
                    show: false
                }
            },
            tooltip: {
                theme: 'dark',
                x: {
                    show: false
                },
                y: {
                    title: {
                        formatter: function() {
                            return ''
                        }
                    }
                }
            },
			grid:{
			  show: true,
			  borderColor: 'rgba(255, 255, 255, 0.12)',
	        },
			legend:{
				show:false
			}
        }

       var chart = new ApexCharts(
            document.querySelector("#top-referrers"),
            options
        );
        
        chart.render();


// chart 8


var options1 = {
      chart: {
        type: 'area',
        height: 110,
        sparkline: {
          enabled: true
        }
      },
      dataLabels: {
          enabled: false
      },
      fill: {
        type: 'gradient',
          gradient: {
              shade: 'light',
              //gradientToColors: [ '#8f50ff'],
              shadeIntensity: 1,
              type: 'vertical',
              opacityFrom: 0.7,
              opacityTo: 0.2,
              stops: [0, 100, 100, 100]
          },
      },
      colors: ["#f7971e"],
      series: [{
        name: 'New Users',
        data: [25, 66, 41, 59, 25, 44, 12, 36, 9, 21]
      }],
      stroke: {
              width: 2.5, 
              curve: 'smooth',
              dashArray: [0]
         },
      tooltip: {
        theme: 'dark',
        fixed: {
          enabled: false
        },
        x: {
          show: false
        },
        y: {
          title: {
            formatter: function (seriesName) {
              return ''
            }
          }
        },
        marker: {
          show: false
        }
      }
    }

    new ApexCharts(document.querySelector("#emp-nps"), options1).render();



    // chart 9

    var options1 = {
      chart: {
        type: 'area',
        height: 110,
        sparkline: {
          enabled: true
        }
      },
      dataLabels: {
          enabled: false
      },
      fill: {
        type: 'gradient',
          gradient: {
              shade: 'light',
              //gradientToColors: [ '#00c8ff'],
              shadeIntensity: 1,
              type: 'vertical',
              opacityFrom: 0.7,
              opacityTo: 0.2,
              stops: [0, 100, 100, 100]
          },
      },
      colors: ["#0072ff"],
      series: [{
        data: [12, 14, 2, 47, 32, 44, 14, 55, 41, 69]
      }],
      stroke: {
                width: 2.5, 
                curve: 'smooth',
                dashArray: [0]
         },
      tooltip: {
        theme: 'dark',
        fixed: {
          enabled: false
        },
        x: {
          show: false
        },
        y: {
          title: {
            formatter: function (seriesName) {
              return ''
            }
          }
        },
        marker: {
          show: false
        }
      }
    }

    new ApexCharts(document.querySelector("#training-expenses"), options1).render();



    // chart 10


    var options1 = {
      chart: {
        type: 'area',
        height: 110,
        sparkline: {
          enabled: true
        }
      },
      dataLabels: {
          enabled: false
      },
      fill: {
        type: 'gradient',
          gradient: {
              shade: 'light',
              //gradientToColors: [ '#ff5447'],
              shadeIntensity: 1,
              type: 'vertical',
              opacityFrom: 0.7,
              opacityTo: 0.2,
              stops: [0, 100, 100, 100]
          },
      },
      colors: ["#f1076f"],
      series: [{
        data: [47, 45, 74, 32, 56, 31, 44, 33, 45, 19]
      }],
      stroke: {
                width: 2.5, 
                curve: 'smooth',
                dashArray: [0]
         },
      tooltip: {
        theme: 'dark',
        fixed: {
          enabled: false
        },
        x: {
          show: false
        },
        y: {
          title: {
            formatter: function (seriesName) {
              return ''
            }
          }
        },
        marker: {
          show: false
        }
      }
    }

    new ApexCharts(document.querySelector("#csr-activities"), options1).render();


  // chart 11



  var options1 = {
      chart: {
        type: 'area',
        height: 110,
        sparkline: {
          enabled: true
        }
      },
      dataLabels: {
          enabled: false
      },
      fill: {
        type: 'gradient',
          gradient: {
              shade: 'light',
             // gradientToColors: [ '#08a50e'],
              shadeIntensity: 1,
              //type: 'vertical',
              opacityFrom: 0.7,
              opacityTo: 0.2,
              stops: [0, 100, 100, 100]
          },
      },
      colors: ["#08a50e"],
      series: [{
        data: [15, 75, 47, 65, 14, 32, 19, 54, 44, 61]
      }],
      stroke: {
                width: 2.5, 
                curve: 'smooth',
                dashArray: [0]
         },
      tooltip: {
        theme: 'dark',
        fixed: {
          enabled: false
        },
        x: {
          show: false
        },
        y: {
          title: {
            formatter: function (seriesName) {
              return ''
            }
          }
        },
        marker: {
          show: false
        }
      }
    }

    new ApexCharts(document.querySelector("#starter-this-month"), options1).render();


  
  // chart 12


  // chart 6

    var options = {
            chart: {
                width:200,
                height: 73,
                type: 'bar',
                zoom: {
                      enabled: false
                    },
                foreColor: '#4e4e4e',
                toolbar: {
                      show: false
                    },
            sparkline: {
              enabled: true
          },
          dropShadow: {
                  enabled: true,
                  opacity: 0.1,
                  blur: 3,
                  left: -4,
                  top: 22,
                }
            },
            plotOptions: {
                bar: {
            columnWidth: '20%',
              //endingShape: 'rounded',
                }
            },
            stroke: {
                width: 0,   
                curve: 'smooth',
            },
      dataLabels: {
                enabled: false
            },
            series: [{
                name: 'Bounce Rate',
                data: [47, 45, 74, 14, 56, 74, 14, 11, 7, 39, 82],
            }],
            yaxis: [{
          y: 0,
          offsetX: 0,
          offsetY: 0,
          padding: {
            left: 0,
            right: 0
          }
        }],
            tooltip: {
                theme: 'dark',
                x: {
                    show: false
                },
                y: {
                    title: {
                        formatter: function() {
                            return ''
                        }
                    }
                }
            },
            fill: {
                type: 'gradient',
                gradient: {
                shade: 'light',
                gradientToColors: ['#009efd'],
                shadeIntensity: 1,
                type: 'vertical',
                opacityFrom: 1,
                opacityTo: 1,
                stops: [0, 100]
          }
            },
            colors: ["#2af598"],
            grid:{
                show: false,
                borderColor: 'rgba(66, 59, 116, 0.15)',
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 150,
            height: 70,
                    }
                }
            }]
        }

       var chart = new ApexCharts(
            document.querySelector("#bounce-rate"),
            options
        );
        
        chart.render();



    // chart 13
    

    var options = {
            chart: {
                height: 310,
                type: 'bar',
           toolbar: {
                     show: false
                }
            },
            plotOptions: {
                bar: {
            columnWidth: '50%',
              endingShape: 'rounded',
                    dataLabels: {
                        position: 'top', // top, center, bottom
                    },
                }
            },
            dataLabels: {
                enabled: true,
                formatter: function(val) {
                  return parseInt(val);
                },
                offsetY: -20,
                style: {
                    fontSize: '14px',
                    colors: ["#304758"]
                }
            },
            stroke: {
              width: 0
              },
            series: [{
                name: 'Applications',
                data: [2.3, 3.1, 4.0, 10.1, 4.0, 3.6, 3.2]
            }],
            xaxis: {
                categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
                position: 'bottom',
                labels: {
                    offsetY: 0,
                },
                axisBorder: {
                    show: true
                },
                axisTicks: {
                    show: true
                }
            },
              tooltip: {
                    enabled: true,
                    theme: 'dark',
             },
            grid:{
                show: true,
                borderColor: 'rgba(66, 59, 116, 0.15)',
            }, 
            fill: {
                type: 'gradient',
                gradient: {
                    shade: 'dark',
                    gradientToColors: [ '#08a50e'],
                    shadeIntensity: 1,
                    type: 'vertical',
                    inverseColors: false,
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [0, 100, 100, 100]
                },
            },
            colors: ["#cddc35"], 
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
            title: {
                text: 'Monthly Application Submitions, 2018',
                floating: true,
                offsetY: 0,
                align: 'center',
                style: {
                fontSize: '15px',
                    color: '#444'
                }
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        height: 310
                    },
                    legend: {
                        position: 'bottom'
                    },
              title: {
                text: 'Monthly Application Submitions, 2018',
                floating: true,
                offsetY: 0,
                align: 'center',
                style: {
                  fontSize: '13px',
                  color: '#444'
                }
              }
                    }
                }]
        }

        var chart = new ApexCharts(
            document.querySelector("#submitted-application"),
            options
        );

        chart.render();




  // chart 14

var options = {
            chart: {
                height: 225,
                type: 'area',
                zoom: {
                      enabled: false
                    },
             foreColor: '#4e4e4e',
             toolbar: {
                  show: false
                },
          sparkline:{
              enabled:false,
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
                width: 0, 
                curve: 'smooth'
            },
            series: [{
                name: 'New Users',
                data: [15, 26, 20, 33, 27, 43, 17, 26, 19]
            },{
                name: 'Returning Users',
                data: [33, 21, 42, 19, 32, 25, 36, 29, 49]
            }],

            xaxis: {
                type: 'month',
                categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep"],                
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
                    gradientToColors: [ '#e100ff', '#00c8ff'],
                    shadeIntensity: 1,
                    type: 'vertical',
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [0, 80, 100]
                },
            },
            colors: ['#ff6258', '#0072ff'],
            legend: {
                show: !0,
                position: "top",
                horizontalAlign: "left",
                offsetX: -20,
                fontSize: "12px",
                markers: {
                  radius: 50,
                  width: 10,
                  height: 10
                }
              },
            grid:{
                show: true,
                borderColor: 'rgba(66, 59, 116, 0.12)',
            },
            tooltip: {
                theme: 'dark',
                x: {
                    format: 'dd/MM/yy HH:mm',
                },

            },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        height: 300
                    },
                    legend: {
                        offsetX: -20,
                        fontSize: "12px", 
                    }
                }
            }]
        }

        var chart = new ApexCharts(
            document.querySelector("#users-status"),
            options
        );

        chart.render();          











    });