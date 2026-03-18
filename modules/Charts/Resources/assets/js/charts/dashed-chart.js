import ApexCharts from "apexcharts";

(() => {
    const ELEMENT = document.getElementById("dashed-chart");
    const CHART_OPTIONS = JSON.parse(ELEMENT.dataset.chartOptions);

    /* dashed chart */
    const OPTIONS = {
        series: [
            {
                name: CHART_OPTIONS.series.one.name,
                data: CHART_OPTIONS.series.one.data
            },
            {
                name: CHART_OPTIONS.series.two.name,
                data: CHART_OPTIONS.series.two.data
            },
            {
                name: CHART_OPTIONS.series.three.name,
                data: CHART_OPTIONS.series.three.data
            }
        ],
        chart: {
            height: 320,
            type: "line",
            zoom: {
                enabled: false
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            width: [3, 4, 3],
            curve: "straight",
            dashArray: [0, 8, 5]
        },
        colors: ["#0162e8", "#00b9ff", "#fbbc0b"],
        title: {
            text: CHART_OPTIONS.title.text,
            align: CHART_OPTIONS.title.align,
            style: {
                fontSize: "13px",
                fontWeight: "bold",
                color: "#8c9097"
            }
        },
        legend: {
            tooltipHoverFormatter: (val, opts) => `${val} - ${opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex]}`
        },
        markers: {
            size: 0,
            hover: {
                sizeOffset: 6
            }
        },
        xaxis: {
            categories: CHART_OPTIONS.xaxis.categories,
            title: {
                text: CHART_OPTIONS.xaxis.title,
                fontSize: "13px",
                fontWeight: "bold",
                style: {
                    color: "#8c9097"
                }
            },
            labels: {
                show: true,
                style: {
                    colors: "#8c9097",
                    fontSize: "11px",
                    fontWeight: 600,
                    cssClass: "apexcharts-xaxis-label"
                }
            }
        },
        yaxis: {
            title: {
                text: CHART_OPTIONS.yaxis.title,
                fontSize: "13px",
                fontWeight: "bold",
                style: {
                    color: "#8c9097"
                }
            },
            labels: {
                show: true,
                style: {
                    colors: "#8c9097",
                    fontSize: "11px",
                    fontWeight: 600,
                    cssClass: "apexcharts-xaxis-label"
                }
            },
            min: CHART_OPTIONS.yaxis.min / CHART_OPTIONS.dec,
            max: CHART_OPTIONS.yaxis.max / CHART_OPTIONS.dec
        },
        tooltip: {
            y: [
                {
                    title: {
                        formatter: (val) => val + CHART_OPTIONS.tooltip.one
                    }
                },
                {
                    title: {
                        formatter: (val) => val + CHART_OPTIONS.tooltip.two
                    }
                },
                {
                    title: {
                        formatter: (val) => val + CHART_OPTIONS.tooltip.three
                    }
                }
            ]
        },
        grid: {
            borderColor: "#f1f1f1"
        }
    };
    const CHART = new ApexCharts(ELEMENT, OPTIONS);
    CHART.render();
})();
