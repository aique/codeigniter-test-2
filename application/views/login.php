<html>

    <head>

        <meta charset="utf-8">

        <link rel="stylesheet" type="text/css" href="/css/form.css" media="screen" />

    </head>

    <body>

        <h1>Login</h1>

        <div id="site_form">

            <?php echo validation_errors('<p class="error">'); ?> <!-- muestra los errores dentro de párrafos con una clase 'error' para poder dar estilos -->

            <?php echo form_open('login'); ?>

            <p>
                <label for="login_name">Nombre</label>
                <input type="text" name="login_name" id="login_name" value="<?php echo $name; ?>">
            </p>

            <p>
                <label for="login_pass">Password</label>
                <input type="password" name="login_pass" id="login_pass">
            </p>

            <p><?php echo form_submit('submit', 'Login'); ?></p>

            <?php echo form_close(); ?>

        </div>

    </body>

</html>