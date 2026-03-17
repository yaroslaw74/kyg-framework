import ApexCharts from "apexcharts";

(() => {
    const ELEMENT = document.getElementById("line-chart");
    const CHART_OPTIONS = JSON.parse(ELEMENT.dataset.chartOptions);

    /* missing/null values chart */
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
            },
            animations: {
                enabled: false
            }
        },
        grid: {
            borderColor: "#f2f5f7"
        },
        stroke: {
            width: [3, 3, 2],
            curve: "straight"
        },
        colors: ["#0162e8", "#00b9ff", "#fbbc0b"],
        labels: CHART_OPTIONS.labels,
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
