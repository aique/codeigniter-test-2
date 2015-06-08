<html>

    <head>

        <meta charset="utf-8">

        <link rel="stylesheet" type="text/css" href="/css/form.css" media="screen" />

        <title>Editando <?php echo $user->getName(); ?></title>

    </head>

    <body>

        <h1>Editando <?php echo $user->getName(); ?></h1>

        <div id="site_form">

            <?php echo validation_errors('<p class="error">'); ?> <!-- muestra los errores dentro de párrafos con una clase 'error' para poder dar estilos -->

            <?php echo form_open('user/edit/'.$user->getId()); ?>

            <p>
                <label for="email">Email</label>
                <input type="text" name="email" id="email" value="<?php echo $user->getEmail(); ?>">
            </p>

            <p>
                <label for="description">Descripción</label>
                <textarea name="description" id="description"><?php echo $user->getDescription(); ?></textarea>
            </p>

            <p><?php echo form_submit('submit', 'Editar'); ?></p>

            <?php echo form_close(); ?>

        </div>

    </body>

</html>