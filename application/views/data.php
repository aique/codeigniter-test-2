<html>

    <head>

        <meta charset="utf-8">

    </head>

    <body>

        <h1>Home</h1>

        <form method="post" action="#">

            <select name="author">

                <option value="">Selecciona un autor</option>

                <?php foreach($authors as $author): ?>

                    <?php if($author == $currentAuthor): ?>

                        <option selected="selected" value="<?php echo $author; ?>"><?php echo $author; ?></option>

                    <?php else: ?>

                        <option value="<?php echo $author; ?>"><?php echo $author; ?></option>

                    <?php endif; ?>

                <?php endforeach; ?>

            </select>

            <input type="submit" value="Obtener posts">

        </form>

        <?php foreach($rows as $row): ?>

            <h2><?php echo $row->title; ?></h2>
            <div><?php echo $row->contents; ?></div>
            <p><?php echo $row->author; ?></p>

        <?php endforeach; ?>

    </body>

</html>