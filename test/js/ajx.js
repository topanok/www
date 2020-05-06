$(document).on("click", "#send", function(){
        var param = $(".email").val();
        $.ajax({
            type: 'POST', // метод отправки
            url: 'http://localhost/cart/add', // путь к обработчику
            dаta: {
                "param1": "Просто текст",
                "param2": param // переменная со значением из поля с классом email
            },
            dataType: 'text',
            success: function(data){
                $(".form_result").html(data); // при успешном получении ответа от сервера, заносим полученные данные в элемент с классом answer
            },
            error: function(data){
                console.log(data); // выводим ошибку в консоль
            }
        });
        return false;
    })