<html>

    <head>

        <meta charset="utf-8">

    </head>

    <body>

        <div>

            Hola <?php echo $this->nativesession->get('user')->getName(); ?> | <a href="/logout">logout</a>

        </div>

        <h1>Private</h1>

        <p>Contenido super privado y mega secreto</p>

    </body>

</html>