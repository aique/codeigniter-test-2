<html>

    <head>

        <meta charset="utf-8">

        <link rel="stylesheet" type="text/css" href="/css/form.css" media="screen" />

    </head>

    <body>

        <h1>Gallery</h1>

        <?php include('image_gallery.php'); ?>

        <?php if(isset($error)) { echo $error; } ?>

        <div id="contact_form">

            <?php

                echo form_open_multipart('gallery/index');
                echo form_upload('file');
                echo '<br />';
                echo form_submit(array('name' => 'submit', 'id' => 'submit'), 'Subir');
                echo form_close();

            ?>

        </div>

        <footer>



        </footer>

    </body>

</html>