import ApexCharts from "apexcharts";

(() => {
    const ELEMENT = document.getElementById("gradient-chart");
    const CHART_OPTIONS = JSON.parse(ELEMENT.dataset.chartOptions);

    /* gradient chart */
    const OPTIONS = {
        series: [
            {
                name: CHART_OPTIONS.series.name,
                data: CHART_OPTIONS.series.data
            }
        ],
        chart: {
            height: 320,
            type: "line"
        },
        forecastDataPoints: {
            count: CHART_OPTIONS.forecastDataPoints
        },
        stroke: {
            width: 3,
            curve: "smooth"
        },
        xaxis: {
            type: "datetime",
            categories: CHART_OPTIONS.xaxis.categories,
            tickAmount: 10,
            title: {
                text: CHART_OPTIONS.xaxis.title,
                fontSize: "13px",
                fontWeight: "bold",
                style: {
                    color: "#8c9097"
                }
            },
            labels: {
                formatter: (_value, timestamp, opts) => opts.dateFormatter(new Date(timestamp), "dd MMM"),
                style: {
                    colors: "#8c9097",
                    fontSize: "11px",
                    fontWeight: 600,
                    cssClass: "apexcharts-xaxis-label"
                }
            }
        },
        grid: {
            borderColor: "#f2f5f7"
        },
        title: {
            text: CHART_OPTIONS.title.text,
            align: CHART_OPTIONS.title.align,
            style: {
                fontSize: "13px",
                fontWeight: "bold",
                color: "#8c9097"
            }
        },
        fill: {
            type: "gradient",
            gradient: {
                shade: "dark",
                gradientToColors: ["#0162e8"],
                shadeIntensity: 1,
                type: "horizontal",
                opacityFrom: 1,
                opacityTo: 1,
                stops: [0, 100, 100, 100]
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
                formatter: (val) => (val / CHART_OPTIONS.dec).toFixed(0),
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
        }
    };

    const CHART = new ApexCharts(ELEMENT, OPTIONS);
    CHART.render();
})();
