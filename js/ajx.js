jQuery(document).ready(function(){
	inCart.onclick = function() {
		var countToCart=document.getElementById('countToCart').value;
		var url=window.location.href;
	    $.ajax({
	        type: "POST",
	        url: "http://localhost/cart/add",
	        data: {
	        	"countToCart": countToCart,
	        	"url": url
	        },
	        /*success: function(data){
	            $(".cart-item").html(data); //Те , що повернув сервер, розміщуєм в елемент з класом cart-item
	            console.log(data);
            },*/
	        error: function(data){
	            console.log(data);
            }
	    });
    };
});