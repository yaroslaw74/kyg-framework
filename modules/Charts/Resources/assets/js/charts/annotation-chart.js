import ApexCharts from "apexcharts";

(() => {
    const ELEMENT = document.getElementById("annotation-chart");
    const CHART_OPTIONS = JSON.parse(ELEMENT.dataset.chartOptions);

    /* line chart with annotations */
    const OPTIONS = {
        series: [
            {
                name: CHART_OPTIONS.series.name,
                data: CHART_OPTIONS.series.data
            }
        ],
        colors: ["#0162e8"],
        chart: {
            height: 320,
            type: "line",
            id: "areachart-2"
        },
        annotations: {
            yaxis: [
                {
                    y: CHART_OPTIONS.annotations.yaxis.line.data / CHART_OPTIONS.dec,
                    borderColor: "#00E396",
                    label: {
                        borderColor: "#00E396",
                        style: {
                            color: "#fff",
                            background: "#00E396"
                        },
                        text: CHART_OPTIONS.annotations.yaxis.line.text
                    }
                },
                {
                    y: CHART_OPTIONS.annotations.yaxis.span.botom / CHART_OPTIONS.dec,
                    y2: CHART_OPTIONS.annotations.yaxis.span.top / CHART_OPTIONS.dec,
                    borderColor: "#000",
                    fillColor: "#FEB019",
                    opacity: 0.2,
                    label: {
                        borderColor: "#333",
                        style: {
                            fontSize: "10px",
                            color: "#333",
                            background: "#FEB019"
                        },
                        text: CHART_OPTIONS.annotations.yaxis.span.text
                    }
                }
            ],
            xaxis: [
                {
                    x: CHART_OPTIONS.annotations.xaxis.line.data,
                    strokeDashArray: 0,
                    borderColor: "#ee335e",
                    label: {
                        borderColor: "#ee335e",
                        style: {
                            color: "#fff",
                            background: "#ee335e"
                        },
                        text: CHART_OPTIONS.annotations.xaxis.line.text
                    }
                },
                {
                    x: CHART_OPTIONS.annotations.xaxis.span.left,
                    x2: CHART_OPTIONS.annotations.xaxis.span.right,
                    fillColor: "#B3F7CA",
                    opacity: 0.4,
                    label: {
                        borderColor: "#B3F7CA",
                        style: {
                            fontSize: "10px",
                            color: "#fff",
                            background: "#00E396"
                        },
                        offsetY: -10,
                        text: CHART_OPTIONS.annotations.xaxis.span.text
                    }
                }
            ],
            points: [
                {
                    x: CHART_OPTIONS.annotations.points.label.x,
                    y: CHART_OPTIONS.annotations.points.label.y / CHART_OPTIONS.dec,
                    marker: {
                        size: 8,
                        fillColor: "#fff",
                        strokeColor: "red",
                        radius: 2,
                        cssClass: "apexcharts-custom-class"
                    },
                    label: {
                        borderColor: "#FF4560",
                        offsetY: 0,
                        style: {
                            color: "#fff",
                            background: "#FF4560"
                        },

                        text: CHART_OPTIONS.annotations.points.label.text
                    }
                },
                {
                    x: CHART_OPTIONS.annotations.points.image.x,
                    y: CHART_OPTIONS.annotations.points.image.y / CHART_OPTIONS.dec,
                    marker: {
                        size: 0
                    },
                    image: {
                        path: CHART_OPTIONS.annotations.points.image.path
                    }
                }
            ]
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: "straight"
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
        labels: CHART_OPTIONS.series.labels,
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
