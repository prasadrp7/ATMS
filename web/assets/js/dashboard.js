$(document).ready(function() {
	var gdata = ($.parseJSON(graph_json));
	gdata = gdata.data;
    var offset = 0;
    plot();

    function plot() {
        var sin = [],
        	xticks = [];
        for (i in gdata) {
        	sin.push([i, parseInt(gdata[i].y)]);
        	xticks.push([i, gdata[i].x])
        }

        var options = {
            series: {
                lines: {
                    show: true
                },
                points: {
                    show: true
                }
            },
            grid: {
                hoverable: true //IMPORTANT! this is needed for tooltip to work
            },
            xaxis: {
            	ticks: xticks
            },
            yaxis: {
            	tickSize: 1
            }
        };

        var plotObj = $.plot($("#flot-line-chart"), [{
                data: sin,
                label: "Number of Users"
            }],
            options);
    }
});

