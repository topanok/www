		<!-- START PAGE-CONTENT -->
		<section class="page-content">
			<div class="container">
	            <div class="row">
					<div class="col-md-12">
						<ul class="page-menu">
							<li><a href="http://localhost/index.html">Home</a></li>
							<li class="active"><a href="http://localhost/#">Bestseller Product</a></li>
						</ul>
					</div>
				</div>
				<div class="row">
					<?php require_once 'sidebar.php'; ?>
					<div class="col-md-9 col-xs-12">
						<!-- START PRODUCT-BANNER -->
						<div class="product-banner">
							<div class="row">
								<div class="col-xs-12">
									<div class="banner">
										<a href="http://localhost/#"><img src="http://localhost/img/banner/12.jpg" alt="Product Banner"></a>
									</div>
								</div>
							</div>
						</div>
						<!-- END PRODUCT-BANNER -->
						<!-- START PRODUCT-AREA -->
						<div class="product-area">
							<div class="row">
								<div class="col-xs-12">
									<!-- Start Product-Menu -->
									<div class="product-menu">
										<div class="product-title">
											<h3 class="title-group-3 gfont-1">Тут має бути поточна категорія</h3>
										</div>
									</div>
									<div class="product-filter">
										<ul role="tablist">
											<li role="presentation" class="list">
												<a href="http://localhost/#display-1-1" role="tab" data-toggle="tab"></a>
											</li>
											<li role="presentation"  class="grid active">
												<a href="http://localhost/#display-1-2" role="tab" data-toggle="tab"></a>
											</li>
										</ul>
										<div class="sort">
											<label>Сортувати за:</label>
											<select>
												<option value="#">Default</option>
												<option value="#">Name (A - Z)</option>
												<option value="#">Name (Z - A)</option>
												<option value="#">Price (Low > High)</option>
												<option value="#">Rating (Highest)</option>
												<option value="#">Rating (Lowest)</option>
												<option value="#">Name (A - Z)</option>
												<option value="#">Model (Z - A))</option>
												<option value="#">Model (A - Z)</option>
											</select>
										</div>
										<div class="limit">
											<label>Показати:</label>
											<select>
												<option value="#">8</option>
												<option value="#">16</option>
												<option value="#">24</option>
												<option value="#">40</option>
												<option value="#">80</option>
												<option value="#">100</option>
											</select>
										</div>
									</div>
									
									<!-- End Product-Menu -->
									<div class="clear"></div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 col-md-12">		
									<!-- Start Product -->
									<div class="product">
										<div class="tab-content">
											<div role="tabpanel" class="tab-pane fade in  active" id="display-1-2">
												<?php 
													if(!empty($data['products'])){
														for($row = 0; $row < ceil($data['onPage']/4); $row++){
												?>
												<div class="row">
													<!-- Start Single-Product -->
													<?php
															$products=array_chunk($data['products'], 4);
															for($i=0; $i<count($products[$row]); $i++){
																$prod=$products[$row][$i];
													?>
													<div class="col-md-3 col-sm-4 col-xs-12">
														<div class="single-product">
															<div class="product-img">
																<a href="http://localhost/product/details/<?= $prod['id']; ?>">
																	<img class="primary-img" src="http://localhost/app/images/<?= $prod['images']; ?>" height="250px" alt="Product">
																</a>
															</div>
															<div class="product-description">
																<h5><a href="http://localhost/product/details/<?= $prod[$i]['id']; ?>"><?= $prod['name']; ?></a></h5>
																<div class="price-box">
																	<span class="price"><?= $prod['price'].' ГРН'; ?></span>
																	<span class="old-price">110.00 ГРН</span>
																</div>
																<div class="product-action">
																	<div class="button-group">
																		<div class="product-button">
																			<button onclick="inCart('<?=$prod['id']; ?>')"><i class="fa fa-shopping-cart"></i>В кошик</button>
																		</div>
																		<div class="product-button-2">
																			<a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
																			<a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-signal"></i></a>
																			<a href="#" class="modal-view" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="fa fa-search-plus"></i></a>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<?php } ?>
													<!-- End Single-Product -->
												</div>
												<?php } }else echo '<h3>В даній категорії немає продуктів ((</h3>'; ?>
												<!-- Start Pagination Area -->
												<div class="pagination-area">
													<div class="row">
														<div class="col-xs-5">
															<div class="pagination">
																<?= $data['pagin']; ?>
															</div>
														</div>
														<div class="col-xs-7">
															<div class="product-result">
																<span>Showing 1 to 16 of 19 (2 Pages)</span>
															</div>
														</div>
													</div>
												</div>
												<!-- End Pagination Area -->
											</div>
											<!-- End Product = TV -->
										</div>
									</div>
									<!-- End Product -->
								</div>
							</div>
						</div>
						<!-- END PRODUCT-AREA -->
					</div>
				</div>
			</div>
			<!-- START BRAND-LOGO-AREA -->
			<?php require_once 'brandLogo.php'; ?>
			<!-- END BRAND-LOGO-AREA -->
			<!-- START SUBSCRIBE-AREA -->
			<div class="subscribe-area">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-sm-7 col-xs-12">
							<label class="hidden-sm hidden-xs">Sign Up for Our Newsletter:</label>
							<div class="subscribe">
								<form action="#">
									<input type="text" placeholder="Enter Your E-mail">
									<button type="submit">Subscribe</button>
								</form>
							</div>
						</div>
						<div class="col-md-4 col-sm-5 col-xs-12">
							<div class="social-media">
								<a href="http://localhost/#"><i class="fa fa-facebook fb"></i></a>
								<a href="http://localhost/#"><i class="fa fa-google-plus gp"></i></a>
								<a href="http://localhost/#"><i class="fa fa-twitter tt"></i></a>
								<a href="http://localhost/#"><i class="fa fa-youtube yt"></i></a>
								<a href="http://localhost/#"><i class="fa fa-linkedin li"></i></a>
								<a href="http://localhost/#"><i class="fa fa-rss rs"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>	
			<!-- END SUBSCRIBE-AREA -->
		</section>
		<!-- END PAGE-CONTENT -->