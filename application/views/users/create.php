<html>

    <head>

        <meta charset="utf-8">

        <link rel="stylesheet" type="text/css" href="/css/form.css" media="screen" />

        <title>Nuevo usuario</title>

    </head>

    <body>

        <h1>Nuevo usuario</h1>

        <div id="site_form">

            <?php echo validation_errors('<p class="error">'); ?> <!-- muestra los errores dentro de párrafos con una clase 'error' para poder dar estilos -->

            <?php echo form_open('user/create'); ?>

            <p>
                <label for="name">Nombre</label>
                <input type="text" name="name" id="name">
            </p>

            <p>
                <label for="email">Email</label>
                <input type="text" name="email" id="email"">
            </p>

            <p>
                <label for="description">Descripción</label>
                <textarea name="description" id="description"></textarea>
            </p>

            <p><?php echo form_submit('submit', 'Crear'); ?></p>

            <?php echo form_close(); ?>

        </div>

    </body>

</html>