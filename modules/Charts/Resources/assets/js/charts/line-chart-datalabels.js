import ApexCharts from "apexcharts";

(() => {
    const ELEMENT = document.getElementById("line-chart-datalabels");
    const CHART_OPTIONS = JSON.parse(ELEMENT.dataset.chartOptions);

    /* line with data labels */
    const OPTIONS = {
        series: [
            {
                name: CHART_OPTIONS.series.top.name,
                data: CHART_OPTIONS.series.top.data
            },
            {
                name: CHART_OPTIONS.series.botom.name,
                data: CHART_OPTIONS.series.botom.data
            }
        ],
        chart: {
            height: 320,
            type: "line",
            dropShadow: {
                enabled: true,
                color: "#000",
                top: 18,
                left: 7,
                blur: 10,
                opacity: 0.2
            },
            toolbar: {
                show: false
            }
        },
        colors: ["#0162e8", "#00b9ff"],
        dataLabels: {
            enabled: true
        },
        stroke: {
            curve: "smooth"
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
        grid: {
            borderColor: "#f2f5f7"
        },
        markers: {
            size: 1
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
                formatter: (val) => (val / CHART_OPTIONS.dec).toFixed(0),
                show: true,
                style: {
                    colors: "#8c9097",
                    fontSize: "11px",
                    fontWeight: 600,
                    cssClass: "apexcharts-yaxis-label"
                }
            },
            min: CHART_OPTIONS.yaxis.min / CHART_OPTIONS.dec,
            max: CHART_OPTIONS.yaxis.max / CHART_OPTIONS.dec
        },
        legend: {
            position: CHART_OPTIONS.legend.position,
            horizontalAlign: CHART_OPTIONS.legend.align,
            floating: true,
            offsetY: -25,
            offsetX: -5
        }
    };
    const CHART = new ApexCharts(ELEMENT, OPTIONS);
    CHART.render();
})();
