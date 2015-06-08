<html>

    <head>

        <meta charset="utf-8">

        <title>Listado de usuarios</title>

    </head>

    <body>

        <h1>Listado de usuarios</h1>

        <ul>

            <?php foreach($users as $user): ?>

                <li>
                    <?php echo $user->getName(); ?> | <a href="/user/detail/<?php echo $user->getId(); ?>">detalle</a> | <a href="/user/delete/<?php echo $user->getId(); ?>">eliminar</a>
                </li>

            <?php endforeach; ?>

        </ul>

        <?php echo $this->pagination->create_links(); ?></php>

        <p><a href="/user/create">Nuevo usuario</a></p>

    </body>

</html>