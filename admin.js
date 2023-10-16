$(function() {
    $('#add-kindergarten-form').on('submit', function(e) {
        e.preventDefault();
        
        $.ajax({
            type: 'POST',
            url: 'add_kindergarten.php',
            data: $(this).serialize(),
            success: function(response) {
                var jsonResponse = JSON.parse(response);
                if (jsonResponse.success) {
                    $('#message').html('<p>Садик успешно добавлен.</p>');
                } else {
                    $('#message').html('<p>Ошибка: ' + jsonResponse.error + '</p>');
                }
            },
            error: function() {
                $('#message').html('<p>Ошибка при обработке запроса.</p>');
            }
        });
    });
});
