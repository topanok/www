jQuery(document).ready(function(){
	inCart.onclick = function() {
		var countToCart=document.getElementById('countToCart').value;
		var url=window.location.href;
	    $.ajax({
	        type: "POST",
	        url: "http://localhost/cart/add",
	        dаta: {
	        	"url": url,
	        	"countToCart": countToCart
	        },
	        success: function(data){
	            //$(".cart-item").html(data); // при успешном получении ответа от сервера, заносим полученные данные в элемент с классом answer
	            console.log(data);
            },
	        error: function(data){
	            console.log(data); // выводим ошибку в консоль
            }
	    });
    };
});