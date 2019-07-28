<?php
$active_menu = 'dashboard';
require('views/admin/rightSide.php');

$order_stat = $data['order_stat'];
$keys = array_keys($order_stat);
//echo $keys[0];
$values = array_values($order_stat);
$values = implode(',', $values);
//print_r($values);
?>
<script src="public/highcharts/highcharts.js"></script>
<script src="public/highcharts/exporting.js"></script>
<style>
    .leftSide {
        width: 1020px;
        float: left;
        background: #fff;
    }

    .menuContent {
        padding: 20px;
        width: 96%;
    }

    #container {
        min-width: 310px;
        height: 400px;
        margin: 0 auto;
        max-width: 800px;
    }

    #container * {
        direction: ltr;
        font-family: sans;
    }
</style>
<div class="leftSide sans font_gray">
    <div class="menuContent">
        <h2 class="font_gray">
            داشبورد
        </h2>
        <hr>
        <div id="container"></div>
    </div>
</div>
<script>
    Highcharts.chart('container', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'آمار فروش در هفت روز گذشته'
        },
        subtitle: {
            text: 'فروشگاه اینترنتی پژوابوک'
        },
        xAxis: {
            categories: [<?php foreach ($keys as $key) {
                echo "'$key',";
            } ?>]
        },
        yAxis: {
            title: {
                text: 'تعداد سفارش'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0,
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },
        series: [{
            name: 'تعداد فروش',
            data: [<?= $values ?>]
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });
</script>

