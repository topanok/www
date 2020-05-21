//$(document).ready(function(){
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
	            $(".top-cart-price").html(data);
	            console.log(data);
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
	        	"id": prodId,
	        	"update": 1
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
	        url: "http://localhost/cart/remove/" + prodId,
	        success: function(data){
	            window.location.reload();
	        },
	        error: function(data){
	            console.log(data);
            }
	    });
    }
    function seeMiniCart(){
    	$.ajax({
	        type: "POST",
	        url: "http://localhost/cart/seemini",
	        success: function(data){
	            $(".mini-cart-content").html(data);
	            console.log(data);
	        },
	        error: function(data){
	            console.log(data);
            }
	    });
    }
    function checkoutRadio(radio){
    	var value = radio.value;
    	if(value == 'register'){
		    window.location.href='http://localhost/user/register';
    	}
    }
    function checkName(){
    	let name=document.getElementById('user-name').value;
    	name=name.replace(/<[^>]+>/g,'');
    	if(name.length<2){
    		$(".error-name").html('<pre style="background-color: pink">Введіть не менше 2-х символів!</pre>');
    	}
    	else{
    		$(".error-name").remove();
    	}
    }
    function checkReview(){
    	let review=document.getElementById('user-review').value;
	    	review=review.replace(/<[^>]+>/g,'');
    		if(review.length<20){
    			$(".error-review").html('<pre style="background-color: pink">Введіть не менше 20-ти символів!</pre>');
    		}
    		else{
    			$(".error-review").remove();
    		}
    }
    function addReview(prodId){
    	let name=document.getElementById('user-name').value;
    	name=name.replace(/<[^>]+>/g,'');
    	if(name.length<2){
    		$(".error-name").html('<pre style="background-color: pink">Введіть не менше 2-х символів!</pre>');
    	}
    	else{
	    	let review=document.getElementById('user-review').value;
	    	review=review.replace(/<[^>]+>/g,'');
    		if(review.length<20){
    			$(".error-review").html('<pre style="background-color: pink">Введіть не менше 20-ти символів!</pre>');
    		}
    		else{
	    		let radio=document.getElementsByName('rating');
	    		for(let i=0; i<radio.length; i++){
	    			if(radio[i]['checked']==true){
	    				var rating=radio[i].value;
	    			}
	    		}
	    		if(typeof rating == 'undefined'){
	    			$(".error-rating").html('<pre style="background-color: pink">Поставте оцінку!</pre>');
	    		}
	    		else{
		    		$.ajax({
			    	    type: "POST",
					    url: "http://localhost/product/savereview",
			    		data: {
			        		"product_id": prodId,
			        		"user_name": name,
			        		"review": review,
			        		"rating": rating
			        	},
			        	success: function(data){
			        	    $(".review-message").remove();
			       		    $(".sucess-mesage").html(data);
			    		},
			    		error: function(data){
			    		    console.log(data);
		        		}
			    	});
		    	}
   			}
   		}
    }
    function goTo(writeReview){
    	$('#li-presentation-description').removeClass();
    	$('#li-presentation-reviews').attr( 'class', 'active' );
    	$('#description').attr( 'class', 'tab-pane fade' );
    	$('#reviews').attr( 'class', 'tab-pane fade in active' );
    	if(writeReview=='true'){
    		$('#write-review').removeAttr('hidden');
    	}
        $('html, body').animate({ 
    		scrollTop: $('#mini-div').offset().top 
  		}, 'slow');
    }
//});