<?php
	use App\Models\ReviewsModelRepository;

	$objRev=new ReviewsModelRepository;
	$reviews=$objRev->getItemsByParam('status' , 0);
?>
<div class="col-md-3">
	<!-- CATEGORY-MENU-LIST START -->
    <div class="left-category-menu hidden-sm hidden-xs">
	    <div class="left-product-cat">
	        <div class="category-heading">
	            <h2>Навігація</h2>
	        </div>
	        <div class="category-menu-list">
	            <ul>
	                <li><a href="http://localhost/user/see/1">Користувачі</a></li>
	                <li><a href="http://localhost/category/see/1">Категорії</a></li>
	                <li><a href="http://localhost/product/see/1">Продукти</a></li>
	                <li><a href="http://localhost/reviews/see/1">Відгуки  <strong>(<?=count($reviews);?>)</strong></a></li>
	                <li><a href="http://localhost/order/see/1">Замовлення  (<strong>0</strong>)</a></li>
	            </ul>
	        </div>
	    </div>
	</div>
	<!-- END CATEGORY-MENU-LIST -->
</div>