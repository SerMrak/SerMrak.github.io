$(document).ready(function() {
    // при нажатии на ссылку вызываем функцию
    $('.document-link').click(function(event) {
      event.preventDefault(); // отменяем стандартное поведение ссылки
      var url = $(this).attr('href'); // получаем URL документа
      $.ajax({
        url: 'views.php?url=' + encodeURIComponent(url), // отправляем запрос на сервер
        type: 'GET',
        dataType: 'json',
        success: function(response) {
          // обновляем счетчик просмотров
          $('#views-count').text(response.views);
          // переходим по ссылке на документ
          window.location.href = url;
        },
        error: function(xhr, status, error) {
          console.log('Error: ' + error);
        }
      });
    });
  });
  