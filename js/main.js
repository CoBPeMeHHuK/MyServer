$(document).ready(function(){
    $('#submit').click(function(){
        $('#span').html("Отправка запроса");
        var name= $('#name').val();
        var phone=$('#phone').val();

        $.ajax({
            type:'post',
            url:'./include/callback.php',
            data:'name='+name+'&phone='+phone,
            dataType:'html',
            cache:false,
            beforeSend: function(){ // Функция вызывается перед отправкой запроса
                $('#span').html('Запрос отправлен. Ждите ответа.');
            },
            error: function(req, text, error){ // отслеживание ошибок во время выполнения ajax-запроса
                $('#span').html('Хьюстон, У нас проблемы! ' + text + ' | ' + error);
            },
            complete: function(){ // функция вызывается по окончании запроса
                $('#span').html('<p>Запрос полностью завершен!</p>');
                //  window.location.href="js/handler.php";
            },
            success:function(data){
              $('#span_result').html(data);

            }
        });

    })
});