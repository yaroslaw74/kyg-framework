import ApexCharts from "apexcharts";
import { DirName } from "../../../../../../modules/Charts/Resources/assets/js/functions/DirName.js";

(() => {
    const OPTIONS_ELEMENT = document.getElementById("area-basic");
    const OPTIONS_ELEMENT_DATA = JSON.parse(OPTIONS_ELEMENT.dataset.options);
    const OPTIONS = {
        series: [
            {
                name: OPTIONS_ELEMENT_DATA.series.name,
                data: OPTIONS_ELEMENT_DATA.series.data
            }
        ],
        chart: {
            type: "area",
            height: 320,
            zoom: {
                enabled: false
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: "straight"
        },
        subtitle: {
            text: OPTIONS_ELEMENT_DATA.subtitle.text,
            align: DirName()
        },
        grid: {
            borderColor: "#f2f5f7"
        },
        labels: OPTIONS_ELEMENT_DATA.labels,
        title: {
            text: OPTIONS_ELEMENT_DATA.title.text,
            align: DirName(),
            style: {
                fontSize: "13px",
                fontWeight: "bold",
                color: "#8c9097"
            }
        },
        colors: ["#0162e8"],
        xaxis: {
            type: "datetime",
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
            opposite: true,
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
        legend: {
            horizontalAlign: DirName()
        }
    };
    const CHART = new ApexCharts(document.querySelector("#area-basic"), OPTIONS);
    CHART.render();
})();
