<html>
<head>


    <?php foreach ($css_files as $file): ?>
        <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>">

    <?php endforeach; ?>
</head>
<body>

<?php echo $output ?>

<?php foreach ($js_files as $file): ?>
    <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>

</body>
</html>