<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Revenue Chart</title>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Mabill', 'Total Revenue'],
                <?php
                foreach ($list_tkdt as $thongke) {
                    echo "['" . $thongke['mabill'] . "', " . $thongke['totalrevenue'] . "],";
                }
                ?>
            ]);

            var options = {
                title: 'Doanh thu gần đây',
                titleTextStyle: {
                    fontSize: 48,
                    bold: true,
                    fontName: 'Arial',
                    color: '#333'
                },
                hAxis: {
                    title: 'Mã đơn hàng'
                },
                vAxis: {
                    title: 'Tổng doanh thu'
                },
                legend: 'none'
            };

            var chart = new google.visualization.ColumnChart(document.getElementById('revenue_chart'));

            chart.draw(data, options);
        }
    </script>
</head>

<body>
    <!-- Chart will be drawn here -->
    <div id="revenue_chart" style="width: 900px; height: 600px; margin-top:100px;margin-left:400px;"></div>
</body>

</html>