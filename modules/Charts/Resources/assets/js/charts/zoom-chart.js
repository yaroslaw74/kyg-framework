import ApexCharts from "apexcharts";

(() => {
    const ELEMENT = document.getElementById("zoom-chart");
    const CHART_OPTIONS = JSON.parse(ELEMENT.dataset.chartOptions);

    /* zoomable time series */
    const OPTIONS = {
        series: [
            {
                name: CHART_OPTIONS.series.name,
                data: CHART_OPTIONS.series.data
            }
        ],
        chart: {
            type: "area",
            stacked: false,
            height: 320,
            zoom: {
                type: "x",
                enabled: true,
                autoScaleYaxis: true
            },
            toolbar: {
                autoSelected: "zoom"
            }
        },
        dataLabels: {
            enabled: false
        },
        markers: {
            size: 0
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
                shadeIntensity: 1,
                inverseColors: false,
                opacityFrom: 0.5,
                opacityTo: 0,
                stops: [0, 90, 100]
            }
        },
        grid: {
            borderColor: "#f2f5f7"
        },
        colors: ["#0162e8"],
        xaxis: {
            type: "datetime",
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
            title: {
                text: CHART_OPTIONS.yaxis.title,
                fontSize: "13px",
                fontWeight: "bold",
                style: {
                    color: "#8c9097"
                }
            }
        },
        tooltip: {
            shared: false,
            y: {
                formatter: (val) => (val / CHART_OPTIONS.dec).toFixed(0)
            }
        }
    };

    const CHART = new ApexCharts(ELEMENT, OPTIONS);
    CHART.render();
})();
