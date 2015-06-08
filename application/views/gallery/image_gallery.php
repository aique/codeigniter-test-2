<div id="image_gallery">

    <ul>

        <?php foreach($images as $image): ?>

            <li><img src="<?php echo $image['thumb']; ?>" /></li>

        <?php endforeach; ?>

    </ul>

</div>