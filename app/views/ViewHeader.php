<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Create New Customer Account | Malias</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- favicon
		============================================ -->		
        <link rel="shortcut icon" type="image/x-icon" href="../../../img/favicon.ico">
		
		<!-- Google Fonts
		============================================ -->		
       <link href='https://fonts.googleapis.com/css?family=Raleway:400,600' rel='stylesheet' type='text/css'>
       <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>
	   
		<!-- Bootstrap CSS
		============================================ -->		
        <link rel="stylesheet" href="../../../css/bootstrap.min.css">
		<!-- Font awesome CSS
		============================================ -->
        <link rel="stylesheet" href="../../../css/font-awesome.min.css">
		<!-- owl.carousel CSS
		============================================ -->
        <link rel="stylesheet" href="../../../css/owl.carousel.css">
        <link rel="stylesheet" href="../../../css/owl.theme.css">
        <link rel="stylesheet" href="../../../css/owl.transitions.css">
		<!-- nivo slider CSS
		============================================ -->
		<link rel="stylesheet" href="../../../css/nivo-slider.css" type="text/css" />
		<!-- meanmenu CSS
		============================================ -->
        <link rel="stylesheet" href="../../../css/meanmenu.min.css">
		<!-- jquery-ui CSS
		============================================ -->
        <link rel="stylesheet" href="../../../css/jquery-ui.css">
		<!-- animate CSS
		============================================ -->
        <link rel="stylesheet" href="../../../css/animate.css">
		<!-- main CSS
		============================================ -->
        <link rel="stylesheet" href="../../../css/main.css">
		<!-- style CSS
		============================================ -->
        <link rel="stylesheet" href="../../../css/style.css">
		<!-- responsive CSS
		============================================ -->
        <link rel="stylesheet" href="../../../css/responsive.css">
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
								<!-- Start Language -->
								<ul class="language">
									<li><a href="#"><img class="right-5" src="../../../img/flags/gb.png" alt="#">English<i class="fa fa-caret-down left-5"></i></a>
										<ul>
											<li><a href="#"><img class="right-5" src="../../../img/flags/fr.png" alt="#">French</a></li>
											<li><a href="#"><img class="right-5" src="../../../img/flags/gb.png" alt="#">English</a></li>
										</ul>
									</li>
								</ul>
								<!-- End Language -->
								<!-- Start Currency -->
								<ul class="currency">
									<li><a href="#"><strong>$</strong> USD<i class="fa fa-caret-down left-5"></i></a>
										<ul>
											<li><a href="#">$ EUR</a></li>
											<li><a href="#">$ GBP</a></li>
											<li><a href="#">$ USD</a></li>
										</ul>
									</li>
								</ul>
								<!-- End Currency -->
								<p class="welcome-msg">Раді Вам <?php if(isset($_SESSION['login'])) echo $_SESSION['login']; ?>!</p>
							</div>
							<!-- Start Top-Link -->
							<div class="top-link">
								<ul class="link">
									<li><a href="my-account.html"><i class="fa fa-user"></i>Аккаунт</a></li>
									<li><a href="wishlist.html"><i class="fa fa-heart"></i>Обране</a></li>
									<li><a href="http://localhost/user/logout"><i class="fa fa-share"></i>Оформити замовлення</a></li>
									<li><a href="http://localhost/user/login"><i class="fa fa-unlock-alt"></i>Реєстрація</a></li>
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
										<p>On order over $199</p>
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
								<a href="index.html" title="Malias"><img src="../../../../../../../../../img/logo.png" alt="Malias"></a>
							</div>
						</div>
						<div class="col-md-9 col-sm-12">
		                    <div class="quick-access">
		                    	<div class="search-by-category">
		                    		<div class="search-container">
			                    		<select>
			                    			<option class="all-cate">All Categories</option>
											<optgroup  class="cate-item-head" label="Cameras & Photography">
												<option class="cate-item-title">Handbags</option>
												<option class="c-item">Blouses And Shirts</option>
												<option class="c-item">Clouthes</option>
											</optgroup>
											<optgroup  class="cate-item-head" label="Laptop & Computer">
												<option class="cate-item-title">Apple</option>
												<option class="c-item">Dell</option>
												<option class="c-item">Hp</option>
												<option class="c-item">Sony</option>
											</optgroup>
											<optgroup  class="cate-item-head" label="Electronic">
												<option class="c-item">Mobile</option>
												<option class="c-item">Speaker</option>
												<option class="c-item">Headphone</option>
											</optgroup>
			                    		</select>
		                    		</div>
		                    		<div class="header-search">
		                    			<form action="#">
			                    			<input type="text" placeholder="Search">
			                    			<button type="submit"><i class="fa fa-search"></i></button>
		                    			</form>
		                    		</div>
		                    	</div>
		                    	<div class="top-cart">
		                    		<ul>
		                    			<li>
			                    			<a href="cart.html">
			                    				<span class="cart-icon"><i class="fa fa-shopping-cart"></i></span>
			                    				<span class="cart-total">
			                    					<span class="cart-title">shopping cart</span>
				                    				<span class="cart-item"></span>
				                    				<span class="top-cart-price">$365.00</span>
			                    				</span>
			                    			</a>
											<div class="mini-cart-content">
												<div class="cart-img-details">
													<div class="cart-img-photo">
														<a href="#"><img src="../../../../../../img/product/total-cart.jpg" alt="#"></a>
													</div>
													<div class="cart-img-content">
														<a href="#"><h4>Prod Aldults</h4></a>
														<span>
															<strong class="text-right">1 x</strong>
															<strong class="cart-price text-right">$180.00</strong>
														</span>
													</div>
													<div class="pro-del">
														<a href="#"><i class="fa fa-times"></i></a>
													</div>
												</div>
												<div class="clear"></div>
												<div class="cart-img-details">
													<div class="cart-img-photo">
														<a href="#"><img src="../../../../../../img/product/total-cart2.jpg" alt="#"></a>
													</div>
													<div class="cart-img-content">
														<a href="#"><h4>Fact Prone</h4></a>
														<span>
															<strong class="text-right">1 x</strong>
															<strong class="cart-price text-right">$185.00</strong>
														</span>
													</div>
													<div class="pro-del">
														<a href="#"><i class="fa fa-times"></i></a>
													</div>
												</div>
												<div class="cart-inner-bottom">
													<span class="total">
														Total:
														<span class="amount">$550.00</span>
													</span>
													<span class="cart-button-top">
														<a href="cart.html">View Cart</a>
														<a href="checkout.html">Checkout</a>
													</span>
												</div>
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
										<li><a href="index.html">Home</a>
											<ul>
												<li><a href="index.html">Home Versions 1</a></li>
												<li><a href="index-2.html">Home Versions 2</a></li>
											</ul>
										</li>
										<li><a href="about.html">About Us</a></li>
										<li class="hot"><a href="shop.html">Bestseller Products</a></li>
										<li class="new"><a href="shop-list.html">New Products</a></li>
										<li><a href="shop.html">Special Products</a></li>
										<li><a href="#">Pages</a>
											<ul>
												<li><a href="cart.html">Cart</a></li>
												<li><a href="checkout.html">Checkout</a></li>
												<li><a href="account.html">Create Account</a></li>
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