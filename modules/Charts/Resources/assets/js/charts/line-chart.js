import ApexCharts from "apexcharts";

(() => {
    const ELEMENT = document.getElementById("line-chart");
    const CHART_OPTIONS = JSON.parse(ELEMENT.dataset.chartOptions);

    /* basic line chart */
    const OPTIONS = {
        series: [
            {
                name: CHART_OPTIONS.series.name,
                data: CHART_OPTIONS.series.data
            }
        ],
        chart: {
            height: 320,
            type: "line",
            zoom: {
                enabled: false
            }
        },
        colors: ["#0162e8"],
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: "straight",
            width: 3
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
        }
    };

    const CHART = new ApexCharts(ELEMENT, OPTIONS);
    CHART.render();
})();
