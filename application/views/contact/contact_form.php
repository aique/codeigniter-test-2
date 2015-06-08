<div id="contact_form">

    <?php

        echo form_open('contact/send');
        echo form_label('Usuario', 'user');
        echo form_input(array('name' => 'user', 'id' => 'user'), '');
        echo '<br />';
        echo form_label('Mensaje', 'message');
        echo form_textarea(array('name' =>'message', 'id' => 'message', 'cols' => 30, 'rows' => 15), '');
        echo '<br />';
        echo form_submit(array('name' => 'submit', 'id' => 'submit'), 'Contactar');
        echo form_close();

    ?>

</div>