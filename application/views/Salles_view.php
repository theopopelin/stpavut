<!DOCTYPE html>
<html>
<head>

</head>
<body>
<div id="container">
    <h1>Liste des Salles</h1>
    <?php
    foreach ($toutes as $uneSalle) { ?>
        <div class="manif">

            <h2><?php echo $uneSalle->salle_nom; ?></h2>

            <p><?php echo $uneSalle->salle_tarif; ?> € |
                <?php echo $uneSalle->salle_surface; ?> m2
                <?php echo $uneSalle->salle_places; ?> places // Ratio surface/nb de palces :
                <?php echo round($uneSalle->salle_surface/$uneSalle->salle_places, 2) ; ?>

            </p>

        </div>
    <?php } ?>

</div>
</body>
</html>