<!DOCTYPE html>
<html>
<head>
    <link type="text/css" href="<?php echo base_url(); ?> assets/css/style.css" rel="stylesheet">

</head>
<body>
<div id="container" style="padding-left: 30px;">
    <h1  style="text-align: center; font-size: 74px; color: black; margin: 50px;">Manifestations</h1>
    <a href="<?php echo base_url().'Manifestations/'; ?>">Toutes les manifestations</a><br><br>
    <h3  style="margin-bottom: 30px; color: black;"><?php echo $pagination; ?></h3>

        <?php
        foreach ($page as $uneManif) { ?>
    <div class="manif">

        <h2 style="color: black; font-size: 40px; margin: 20px;"><?php echo mb_strtoupper($uneManif->manif_intitule); ?></h2>

        <p> <?php echo $uneManif->manif_description; ?></p><br> <br>
            <img src="<?php echo base_url() ?>assets/photos/<?php echo $uneManif->manif_photo; ?>" alt="<?php echo $uneManif->manif_intitule; ?>" style="margin-bottom: 20px;" />
            <br>
           
        <br/>
            Prix : <?php echo $uneManif->manif_prix_place; ?> &euro; / <?php echo $uneManif->manif_prix_place*1.1; ?> $

        <br>

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
                        "url": "<?php echo base_url().'Manifestations/DataGraph/' .$uneManif->manif_id; ?>",
                        "datatype": "json",
                        "async": false
                    }
                ).responseText

                var data = new google.visualization.DataTable(recupdata)

                var options = {
                    "title": "Provenance des spectateurs",
                    "is3D": true

                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart<?php echo $uneManif->manif_id; ?>'));

                chart.draw(data, options);
            }
        </script>

<br>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $uneManif->manif_id; ?>">
            Statistiques
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal<?php echo $uneManif->manif_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Statistiques</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="piechart<?php echo $uneManif->manif_id; ?>"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>




    </div>
            <hr/>
    <?php } ?>

</div>
</body>
</html>


