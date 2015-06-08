<html>

    <head>

        <meta charset="utf-8">

        <title><?php echo $user->getName(); ?></title>

    </head>

    <body>

        <h1><?php echo $user->getName(); ?></h1>

        <p><?php echo $user->getEmail(); ?></p>

        <div><?php echo $user->getDescription(); ?></div>


        <p><a href="/user/edit/<?php echo $user->getId(); ?>">Editar</a> | <a href="/user/all">Volver</a></p>

    </body>

</html>