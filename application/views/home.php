<html>

    <head>

        <meta charset="utf-8">

    </head>

    <body>

        <h1>Home</h1>

        <?php foreach($titles as $title): ?>

            <p><?php echo $title->title;?></p>

        <?php endforeach; ?>

    </body>

</html>