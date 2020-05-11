//jQuery(document).ready(function(){
	function inCart(prodId) {
		if(document.getElementById('countToCart')){ 
			var countToCart=document.getElementById('countToCart').value;
		}
		else{
			var countToCart=1;
		}
	    $.ajax({
	        type: "POST",
	        url: "http://localhost/cart/add",
	        data: {
	        	"countToCart": countToCart,
	        	"id": prodId
	        },
	        success: function(data){
	            //$(".cart-item").html(data);
	            //console.log(data);
            },
	        error: function(data){
	            console.log(data);
            }
	    });
    }
    function updateCart(prodId){
		var countToCart=document.getElementById('countToUpdate' + prodId).value;
	    $.ajax({
	        type: "POST",
	        url: "http://localhost/cart/add",
	        data: {
	        	"countToCart": countToCart,
	        	"id": prodId
	        },
	        success: function(data){
	        	window.location.reload();
            },
	        error: function(data){
	            console.log(data);
            }
	    });
    }
    function removeFromCart(prodId){
	    $.ajax({
	        type: "POST",
	        url: "http://localhost/cart/remove",
	        data: {
	        	"id": prodId
	        },
	        success: function(data){
	            window.location.reload();
	        },
	        error: function(data){
	            console.log(data);
            }
	    });
    }
//});