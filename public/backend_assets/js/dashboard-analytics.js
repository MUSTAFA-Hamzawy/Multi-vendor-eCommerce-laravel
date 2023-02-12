$(function() {
	"use strict";
	var e = {
		series: [{
			name: "Sessions",
			data: [14, 3, 10, 9, 29, 19, 22, 9, 12, 7, 19, 5]
		}],
		chart: {
			foreColor: "#9ba7b2",
			height: 310,
			type: "area",
			zoom: {
				enabled: !1
			},
			toolbar: {
				show: !0
			},
			dropShadow: {
				enabled: !0,
				top: 3,
				left: 14,
				blur: 4,
				opacity: .1
			}
		},
		stroke: {
			width: 5,
			curve: "smooth"
		},
		xaxis: {
			type: "datetime",
			categories: ["1/11/2000", "2/11/2000", "3/11/2000", "4/11/2000", "5/11/2000", "6/11/2000", "7/11/2000", "8/11/2000", "9/11/2000", "10/11/2000", "11/11/2000", "12/11/2000"]
		},
		title: {
			text: "Sessions",
			align: "left",
			style: {
				fontSize: "16px",
				color: "#666"
			}
		},
		fill: {
			type: "gradient",
			gradient: {
				shade: "light",
				gradientToColors: ["#0d6efd"],
				shadeIntensity: 1,
				type: "vertical",
				opacityFrom: .7,
				opacityTo: .2,
				stops: [0, 100, 100, 100]
			}
		},
		markers: {
			size: 5,
			colors: ["#0d6efd"],
			strokeColors: "#fff",
			strokeWidth: 2,
			hover: {
				size: 7
			}
		},
		dataLabels: {
			enabled: !1
		},
		colors: ["#0d6efd"],
		yaxis: {
			title: {
				text: "Sessions"
			}
		}
	};
	new ApexCharts(document.querySelector("#chart1"), e).render();
	e = {
		series: [{
			name: "Total Users",
			data: [240, 160, 671, 414, 555, 257, 901, 613, 727, 414, 555, 257]
		}],
		chart: {
			type: "bar",
			height: 65,
			toolbar: {
				show: !1
			},
			zoom: {
				enabled: !1
			},
			dropShadow: {
				enabled: !0,
				top: 3,
				left: 14,
				blur: 4,
				opacity: .12,
				color: "#17a00e"
			},
			sparkline: {
				enabled: !0
			}
		},
		markers: {
			size: 0,
			colors: ["#17a00e"],
			strokeColors: "#fff",
			strokeWidth: 2,
			hover: {
				size: 7
			}
		},
		plotOptions: {
			bar: {
				horizontal: !1,
				columnWidth: "45%",
				endingShape: "rounded"
			}
		},
		dataLabels: {
			enabled: !1
		},
		stroke: {
			show: !0,
			width: 0,
			curve: "smooth"
		},
		colors: ["#17a00e"],
		xaxis: {
			categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
		},
		fill: {
			opacity: 1
		},
		tooltip: {
			theme: "dark",
			fixed: {
				enabled: !1
			},
			x: {
				show: !1
			},
			y: {
				title: {
					formatter: function(e) {
						return ""
					}
				}
			},
			marker: {
				show: !1
			}
		}
	};
	new ApexCharts(document.querySelector("#chart2"), e).render();
	e = {
		series: [{
			name: "Page Views",
			data: [240, 160, 671, 414, 555, 257, 901, 613, 727, 414, 555, 257]
		}],
		chart: {
			type: "bar",
			height: 65,
			toolbar: {
				show: !1
			},
			zoom: {
				enabled: !1
			},
			dropShadow: {
				enabled: !0,
				top: 3,
				left: 14,
				blur: 4,
				opacity: .12,
				color: "#f41127"
			},
			sparkline: {
				enabled: !0
			}
		},
		markers: {
			size: 0,
			colors: ["#f41127"],
			strokeColors: "#fff",
			strokeWidth: 2,
			hover: {
				size: 7
			}
		},
		plotOptions: {
			bar: {
				horizontal: !1,
				columnWidth: "45%",
				endingShape: "rounded"
			}
		},
		dataLabels: {
			enabled: !1
		},
		stroke: {
			show: !0,
			width: 0,
			curve: "smooth"
		},
		colors: ["#f41127"],
		xaxis: {
			categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
		},
		fill: {
			opacity: 1
		},
		tooltip: {
			theme: "dark",
			fixed: {
				enabled: !1
			},
			x: {
				show: !1
			},
			y: {
				title: {
					formatter: function(e) {
						return ""
					}
				}
			},
			marker: {
				show: !1
			}
		}
	};
	new ApexCharts(document.querySelector("#chart3"), e).render();
	e = {
		series: [{
			name: "Avg. Session Duration",
			data: [240, 160, 671, 414, 555, 257, 901, 613, 727, 414, 555, 257]
		}],
		chart: {
			type: "bar",
			height: 65,
			toolbar: {
				show: !1
			},
			zoom: {
				enabled: !1
			},
			dropShadow: {
				enabled: !0,
				top: 3,
				left: 14,
				blur: 4,
				opacity: .12,
				color: "#0d6efd"
			},
			sparkline: {
				enabled: !0
			}
		},
		markers: {
			size: 0,
			colors: ["#0d6efd"],
			strokeColors: "#fff",
			strokeWidth: 2,
			hover: {
				size: 7
			}
		},
		plotOptions: {
			bar: {
				horizontal: !1,
				columnWidth: "45%",
				endingShape: "rounded"
			}
		},
		dataLabels: {
			enabled: !1
		},
		stroke: {
			show: !0,
			width: 0,
			curve: "smooth"
		},
		colors: ["#0d6efd"],
		xaxis: {
			categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
		},
		fill: {
			opacity: 1
		},
		tooltip: {
			theme: "dark",
			fixed: {
				enabled: !1
			},
			x: {
				show: !1
			},
			y: {
				title: {
					formatter: function(e) {
						return ""
					}
				}
			},
			marker: {
				show: !1
			}
		}
	};
	new ApexCharts(document.querySelector("#chart4"), e).render();
	e = {
		series: [{
			name: "Bounce Rate",
			data: [240, 160, 671, 414, 555, 257, 901, 613, 727, 414, 555, 257]
		}],
		chart: {
			type: "bar",
			height: 65,
			toolbar: {
				show: !1
			},
			zoom: {
				enabled: !1
			},
			dropShadow: {
				enabled: !0,
				top: 3,
				left: 14,
				blur: 4,
				opacity: .12,
				color: "#ffb207"
			},
			sparkline: {
				enabled: !0
			}
		},
		markers: {
			size: 0,
			colors: ["#ffb207"],
			strokeColors: "#fff",
			strokeWidth: 2,
			hover: {
				size: 7
			}
		},
		plotOptions: {
			bar: {
				horizontal: !1,
				columnWidth: "45%",
				endingShape: "rounded"
			}
		},
		dataLabels: {
			enabled: !1
		},
		stroke: {
			show: !0,
			width: 0,
			curve: "smooth"
		},
		colors: ["#ffb207"],
		xaxis: {
			categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
		},
		fill: {
			opacity: 1
		},
		tooltip: {
			theme: "dark",
			fixed: {
				enabled: !1
			},
			x: {
				show: !1
			},
			y: {
				title: {
					formatter: function(e) {
						return ""
					}
				}
			},
			marker: {
				show: !1
			}
		}
	};
	new ApexCharts(document.querySelector("#chart5"), e).render(), Highcharts.chart("chart6", {
		chart: {
			height: 350,
			type: "column",
			styledMode: !0
		},
		credits: {
			enabled: !1
		},
		title: {
			text: "Traffic Sources Status. January, 2020"
		},
		accessibility: {
			announceNewData: {
				enabled: !0
			}
		},
		xAxis: {
			type: "category"
		},
		yAxis: {
			title: {
				text: "Total percent market share"
			}
		},
		legend: {
			enabled: !1
		},
		plotOptions: {
			series: {
				borderWidth: 0,
				dataLabels: {
					enabled: !0,
					format: "{point.y:.1f}%"
				}
			}
		},
		tooltip: {
			headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
			pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
		},
		series: [{
			name: "Traffic Sources",
			colorByPoint: !0,
			data: [{
				name: "Organic Search",
				y: 62.74,
				drilldown: "Organic Search"
			}, {
				name: "Direct",
				y: 40.57,
				drilldown: "Direct"
			}, {
				name: "Referral",
				y: 25.23,
				drilldown: "Referral"
			}, {
				name: "Others",
				y: 10.58,
				drilldown: "Others"
			}]
		}],
		drilldown: {
			series: [{
				name: "Chrome",
				id: "Chrome",
				data: [
					["v65.0", .1],
					["v64.0", 1.3],
					["v63.0", 53.02],
					["v62.0", 1.4],
					["v61.0", .88],
					["v60.0", .56],
					["v59.0", .45],
					["v58.0", .49],
					["v57.0", .32],
					["v56.0", .29],
					["v55.0", .79],
					["v54.0", .18],
					["v51.0", .13],
					["v49.0", 2.16],
					["v48.0", .13],
					["v47.0", .11],
					["v43.0", .17],
					["v29.0", .26]
				]
			}, {
				name: "Firefox",
				id: "Firefox",
				data: [
					["v58.0", 1.02],
					["v57.0", 7.36],
					["v56.0", .35],
					["v55.0", .11],
					["v54.0", .1],
					["v52.0", .95],
					["v51.0", .15],
					["v50.0", .1],
					["v48.0", .31],
					["v47.0", .12]
				]
			}, {
				name: "Internet Explorer",
				id: "Internet Explorer",
				data: [
					["v11.0", 6.2],
					["v10.0", .29],
					["v9.0", .27],
					["v8.0", .47]
				]
			}, {
				name: "Safari",
				id: "Safari",
				data: [
					["v11.0", 3.39],
					["v10.1", .96],
					["v10.0", .36],
					["v9.1", .54],
					["v9.0", .13],
					["v5.1", .2]
				]
			}, {
				name: "Edge",
				id: "Edge",
				data: [
					["v16", 2.6],
					["v15", .92],
					["v14", .4],
					["v13", .1]
				]
			}, {
				name: "Opera",
				id: "Opera",
				data: [
					["v50.0", .96],
					["v49.0", .82],
					["v12.1", .14]
				]
			}]
		}
	}), Highcharts.chart("chart7", {
		chart: {
			height: 350,
			plotBackgroundColor: null,
			plotBorderWidth: null,
			plotShadow: !1,
			type: "pie",
			styledMode: !0
		},
		credits: {
			enabled: !1
		},
		title: {
			text: "Sessions Device"
		},
		subtitle: {
			text: "Ratio of devices use by users"
		},
		tooltip: {
			pointFormat: "{series.name}: <b>{point.percentage:.1f}%</b>"
		},
		accessibility: {
			point: {
				valueSuffix: "%"
			}
		},
		plotOptions: {
			pie: {
				allowPointSelect: !0,
				cursor: "pointer",
				innerSize: 120,
				dataLabels: {
					enabled: !0,
					format: "<b>{point.name}</b>: {point.percentage:.1f} %"
				},
				showInLegend: !0
			}
		},
		series: [{
			name: "Users",
			colorByPoint: !0,
			data: [{
				name: "Desktop",
				y: 56
			}, {
				name: "Mobile",
				y: 30
			}, {
				name: "Tablet",
				y: 14
			}]
		}],
		responsive: {
			rules: [{
				condition: {
					maxWidth: 500
				},
				chartOptions: {
					plotOptions: {
						pie: {
							innerSize: 140,
							dataLabels: {
								enabled: !1
							}
						}
					}
				}
			}]
		}
	}), Highcharts.chart("chart8", {
		chart: {
			type: "bar",
			styledMode: !0
		},
		credits: {
			enabled: !1
		},
		exporting: {
			buttons: {
				contextButton: {
					enabled: !1
				}
			}
		},
		title: {
			text: "Visitor by Gender"
		},
		xAxis: {
			categories: ["Jan", "Feb", "Mar", "Apr", "May"]
		},
		yAxis: {
			min: 0,
			title: {
				text: "Visitor by Genders",
				style: {
					display: "none"
				}
			}
		},
		legend: {
			reversed: !1
		},
		plotOptions: {
			series: {
				stacking: "normal"
			}
		},
		series: [{
			name: "Male",
			data: [5, 3, 4, 7, 2]
		}, {
			name: "Female",
			data: [2, 2, 3, 2, 1]
		}, {
			name: "Others",
			data: [3, 4, 4, 2, 5]
		}]
	});
	e = {
		series: [42, 47, 52, 58, 65],
		chart: {
			height: 340,
			type: "polarArea"
		},
		labels: ["Chrome", "Firefox", "Edge", "Opera", "Safari"],
		fill: {
			opacity: 1
		},
		stroke: {
			width: 1,
			colors: void 0
		},
		colors: ["#17a00e", "#0dcaf0", "#f41127", "#ffc107", "#0d6efd"],
		yaxis: {
			show: !1
		},
		dataLabels: {
			enabled: !1
		},
		legend: {
			show: !1,
			position: "bottom"
		},
		plotOptions: {
			polarArea: {
				rings: {
					strokeWidth: 0
				}
			}
		}
	};
	new ApexCharts(document.querySelector("#chart9"), e).render(), jQuery("#geographic-map").vectorMap({
		map: "world_mill_en",
		backgroundColor: "transparent",
		borderColor: "#818181",
		borderOpacity: .25,
		borderWidth: 1,
		zoomOnScroll: !1,
		color: "#009efb",
		regionStyle: {
			initial: {
				fill: "#6c757d"
			}
		},
		markerStyle: {
			initial: {
				r: 9,
				fill: "#fff",
				"fill-opacity": 1,
				stroke: "#000",
				"stroke-width": 5,
				"stroke-opacity": .4
			}
		},
		enableZoom: !0,
		hoverColor: "#009efb",
		markers: [{
			latLng: [21, 78],
			name: "I Love My India"
		}],
		series: {
			regions: [{
				values: {
					IN: "#0d6efd",
					US: "#15b70a",
					RU: "#f41127",
					AU: "#ffb207"
				}
			}]
		},
		hoverOpacity: null,
		normalizeFunction: "linear",
		scaleColors: ["#b6d6ff", "#005ace"],
		selectedColor: "#c9dfaf",
		selectedRegions: [],
		showTooltip: !0,
		onRegionClick: function(e, t, o) {
			var r = 'You clicked "' + o + '" which has the code: ' + t.toUpperCase();
			alert(r)
		}
	})
});