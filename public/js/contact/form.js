function initContactForm()
{
    $('#submit').on('click', function(ev)
    {
        ev.preventDefault();

        var formData =
        {
            name:  $(this).find('#name').val(),
            message: $(this).find('#message').val(),
            ajax: 1 // indicamos que se está llamando al controlador mediante ajax
        }

        $.ajax
        ({
            url: '/contact/submit',
            type: 'post',
            data: formData,
            success: function(msg)
            {
                if(msg.result == 'success')
                {
                    alert('bien');
                }
                else
                {
                    alert('mal');
                }
            }
        })
    })
}