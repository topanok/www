<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Best Shop</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- favicon
		============================================ -->		
        <link rel="shortcut icon" type="image/x-icon" href="/img/favicon.ico">
		
		<!-- Google Fonts
		============================================ -->		
       <link href='https://fonts.googleapis.com/css?family=Raleway:400,600' rel='stylesheet' type='text/css'>
       <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>
	   
		<!-- Bootstrap CSS
		============================================ -->		
        <link rel="stylesheet" href="/css/bootstrap.min.css">
		<!-- Font awesome CSS
		============================================ -->
        <link rel="stylesheet" href="/css/font-awesome.min.css">
		<!-- owl.carousel CSS
		============================================ -->
        <link rel="stylesheet" href="/css/owl.carousel.css">
        <link rel="stylesheet" href="/css/owl.theme.css">
        <link rel="stylesheet" href="/css/owl.transitions.css">
		<!-- nivo slider CSS
		============================================ -->
		<link rel="stylesheet" href="/css/nivo-slider.css" type="text/css" />
		<!-- meanmenu CSS
		============================================ -->
        <link rel="stylesheet" href="/css/meanmenu.min.css">
		<!-- jquery-ui CSS
		============================================ -->
        <link rel="stylesheet" href="/css/jquery-ui.css">
		<!-- animate CSS
		============================================ -->
        <link rel="stylesheet" href="/css/animate.css">
		<!-- main CSS
		============================================ -->
        <link rel="stylesheet" href="/css/main.css">
		<!-- style CSS
		============================================ -->
        <link rel="stylesheet" href="/css/style.css">
		<!-- responsive CSS
		============================================ -->
        <link rel="stylesheet" href="/css/responsive.css">
    </head>
    <body>

        <!-- Add your site or application content here -->

		<!-- HEADER-AREA START -->
		<header class="header-area">
			<!-- HEADER-TOP START -->
			<div class="header-top hidden-xs">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="top-menu">
								<p class="welcome-msg">Раді Вам <strong><?php if($_SESSION['login']!=$_SERVER['REMOTE_ADDR']) echo $_SESSION['login']; ?>!</strong></p>
							</div>
							<!-- Start Top-Link -->
							<div class="top-link">
								<ul class="link">
									<?php if(isset($_SESSION['auth']) && $_SESSION['auth']==false): ?>
									<li><a href="/user/login"><i class="fa fa-key fa-fw"></i>Вхід</a></li>
									<li><a href="/user/register"><i class="fa fa-unlock-alt"></i>Реєстрація</a></li>
									<?php endif; ?>
									<li><a href="/user/account"><i class="fa fa-user"></i>Аккаунт</a></li>
									<li><a href="wishlist.html"><i class="fa fa-heart"></i>Обране</a></li>
									<li><a href="/checkout/order"><i class="fa fa-share"></i>Оформити замовлення</a></li>
									<?php if(isset($_SESSION['auth']) && $_SESSION['auth']==true): ?>
									<li><a href="/user/logout"><i class="fa fa-sign-out"></i>Вихід</a></li>
								<?php endif; ?>
								</ul>
							</div>
							<!-- End Top-Link -->
						</div>
					</div>
				</div>
			</div>
			<!-- HEADER-TOP END -->
			<!-- HEADER-MIDDLE START -->
			<div class="header-middle">
				<div class="container">
					<!-- Start Support-Client -->
					<div class="support-client hidden-xs">
						<div class="row">
							<!-- Start Single-Support -->
							<div class="col-md-3 hidden-sm">
								<div class="single-support">
									<div class="support-content">
										<i class="fa fa-clock-o"></i>
										<div class="support-text">
											<h1 class="zero gfont-1">working time</h1>
											<p>Mon- Sun: 8.00 - 18.00</p>
										</div>
									</div>
								</div>
							</div>
							<!-- End Single-Support -->
							<!-- Start Single-Support -->
							<div class="col-md-3 col-sm-4">
								<div class="single-support">
									<i class="fa fa-truck"></i>
									<div class="support-text">
										<h1 class="zero gfont-1">Free shipping</h1>
										<p>On order over ₴1500</p>
									</div>
								</div>
							</div>
							<!-- End Single-Support -->
							<!-- Start Single-Support -->
							<div class="col-md-3 col-sm-4">
								<div class="single-support">
									<i class="fa fa-money"></i>
									<div class="support-text">
										<h1 class="zero gfont-1">Money back 100%</h1>
										<p>Within 30 Days after delivery</p>
									</div>
								</div>
							</div>
							<!-- End Single-Support -->
							<!-- Start Single-Support -->
							<div class="col-md-3 col-sm-4">
								<div class="single-support">
									<i class="fa fa-phone-square"></i>
									<div class="support-text">
										<h1 class="zero gfont-1">Phone: 0123456789</h1>
										<p>Order Online Now !</p>
									</div>
								</div>
							</div>
							<!-- End Single-Support -->
						</div>
					</div>
					<!-- End Support-Client -->
					<!-- Start logo & Search Box -->
					<div class="row">
						<div class="col-md-3 col-sm-12">
							<div class="logo">
								<a href="/products/see/0/1" title="Malias"><img src="/img/logo.png" alt="Malias"></a>
							</div>
						</div>
						<div class="col-md-9 col-sm-12">
							<?php //var_dump($data); ?>
		                    <div class="quick-access">
		                    	<div class="search-by-category">
		                    		<div class="search-container">
			                    		<select>
			                    			<option class="all-cate">Всі категорії</option>
			                    			<?php foreach ($data['categories'] as $cat): 
			                    				if($cat->getParent_id()==0): ?>
											<optgroup  class="cate-item-head" label="<?=$cat->getName();?>">
												<?php foreach ($data['categories'] as $subCat): 
													if($subCat->getParent_id()==$cat->getId()): ?>
												<option class="c-item"><?=$subCat->getName();?></option>
												<?php endif; endforeach; ?>
											</optgroup>
											<?php endif; endforeach; ?>
			                    		</select>
		                    		</div>
		                    		<div class="header-search">
		                    			<form action="#">
			                    			<input type="text" placeholder="Пошук">
			                    			<button type="submit"><i class="fa fa-search"></i></button>
		                    			</form>
		                    		</div>
		                    	</div>
		                    	<div class="top-cart">
		                    		<ul>
		                    			<li>
			                    			<a href="/cart/see" onmousemove="seeMiniCart()">
			                    				<span class="cart-icon"><i class="fa fa-shopping-cart"></i></span>
			                    				<span class="cart-total">
			                    					<span class="cart-title">Кошик</span>
				                    				<span class="cart-item"></span>
				                    				<span class="top-cart-price">₴ <?=$data['totalSum'];?></span>
			                    				</span>
			                    			</a>
											<div class="mini-cart-content">
												
											</div>
		                    			</li>
		                    		</ul>
		                    	</div>
		                    </div>
		                </div>
					</div>
					<!-- End logo & Search Box -->
				</div> 
			</div>
			<!-- HEADER-MIDDLE END -->
			<!-- START MAINMENU-AREA -->
			<div class="mainmenu-area shop-page">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="mainmenu">
								<nav>
									<ul>
										<li><a href="index.html">Головна</a></li>
										<li><a href="about.html">Про нас</a></li>
										<li class="hot"><a href="shop.html">Популярні продукти</a></li>
										<li class="new"><a href="shop-list.html">Новинки</a></li>
										<li><a href="shop.html">Акційні</a></li>
										<li><a href="#">Сторінки</a>
											<ul>
												<li><a href="/cart/see">Кошик</a></li>
												<li><a href="/checkout/order">Оформити замовлення</a></li>
												<li><a href="/user/register">Реєстрація</a></li>
												<li><a href="/user/account">Мій аккаунт</a></li>
												<li><a href="shop.html">Популярні</a></li>
												<li><a href="shop-list.html">Новинки</a></li>
												<li><a href="shop.html">Акційні</a></li>
												<li><a href="wishlist.html">Вибране</a></li>
											</ul>
										</li>
										<li><a href="contact.html">Зворотній зв'зок</a></li>
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN-MENU-AREA -->
			<!-- Start Mobile-menu -->
			<div class="mobile-menu-area no-margin hidden-md hidden-lg">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<nav id="mobile-menu">
								<ul>
									<li><a href="index.html">Home</a>
										<ul>
											<li><a href="index.html">Home Page 1</a></li>
											<li><a href="index-2.html">Home Page 2</a></li>
										</ul>
									</li>
									<li><a href="about.html">About Us</a></li>
									<li><a href="shop.html">Bestseller Products</a></li>
									<li><a href="shop-list.html">New Products</a></li>
									<li><a href="#">Pages</a>
										<ul>
											<li><a href="cart.html">Cart</a></li>
											<li><a href="checkout.html">Checkout</a></li>
											<li><a href="account.html">Create Account</a></li>
											<li><a href="login.html">Login</a></li>
											<li><a href="my-account.html">My Account</a></li>
											<li><a href="product-details.html">Product details</a></li>
											<li><a href="shop.html">Shop Grid View</a></li>
											<li><a href="shop-list.html">Shop List View</a></li>
											<li><a href="wishlist.html">Wish List</a></li>
										</ul>
									</li>
									<li><a href="contact.html">Contact Us</a></li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
			<!-- End Mobile-menu -->
		</header>
		<!-- HEADER AREA END -->