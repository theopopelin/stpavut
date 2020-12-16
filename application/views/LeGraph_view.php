<html>
<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var recupdata=$.ajax(
                {
                    "url": "<?php echo base_url().'Manifestations/DataGraph/' .$manif; ?>",
                    "datatype": "json",
                    "async": false
                }
            ).responseText

            var data = new google.visualization.DataTable(recupdata)

            var options = {
                "title": "Provenance des spectateurs",
                "is3D": true

            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>
</head>
<body>
<div id="piechart" style="width: 900px; height: 500px;"></div>
</body>
</html>