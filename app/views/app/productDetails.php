		<!-- START PAGE-CONTENT -->
		<section class="page-content">
			<div class="container">
	            <div class="row">
					<div class="col-md-12">
						<ul class="page-menu">
							<li><a href="index.html">Home</a></li>
							<li><a href="#">Тут має бути категорія</a></li>
							<li class="active"><a href=""><?=$data['product']['name']; ?></a></li>
						</ul>
					</div>
				</div>
				<div class="row">
					<?php require_once 'sidebar.php'; ?>
					<div class="col-md-9 col-sm-12 col-xs-12">
						<!-- Start Toch-Prond-Area -->
						<div class="toch-prond-area">
							<div class="row">
								<div class="col-md-5 col-sm-5 col-xs-12">
									<div class="clear"></div>
									<div class="tab-content">
										<!-- Product = display-1-1 -->
										<div role="tabpanel" class="tab-pane fade in active" id="display-1">
											<div class="row">
												<div class="col-xs-12">
													<div class="toch-photo">
														<a href="#"><img src="http://localhost/app/images/<?=$data['product']['images']; ?>" data-imagezoom="true" alt="#" /></a>
													</div>
												</div>
											</div>
										</div>
										<!-- End Product = display-1-1 -->
										<!-- Start Product = display-1-2 -->
										<div role="tabpanel" class="tab-pane fade" id="display-2">
											<div class="row">
												<div class="col-xs-12">
													<div class="toch-photo">
														<a href="#"><img src="http://localhost/img/toch/2.jpg" data-imagezoom="true" alt="#" /></a>
													</div>
												</div>
											</div>
										</div>
										<!-- End Product = display-1-2 -->
										<!-- Start Product = di3play-1-3 -->
										<div role="tabpanel" class="tab-pane fade" id="display-3">
											<div class="row">
												<div class="col-xs-12">
													<div class="toch-photo">
														<a href="#"><img src="http://localhost/img/toch/3.jpg" data-imagezoom="true" alt="#" /></a>
													</div>
												</div>
											</div>
										</div>
										<!-- End Product = display-1-3 -->
										<!-- Start Product = di3play-1-4 -->
										<div role="tabpanel" class="tab-pane fade" id="display-4">
											<div class="row">
												<div class="col-xs-12">
													<div class="toch-photo">
														<a href="#"><img src="http://localhost/img/toch/4.jpg" data-imagezoom="true" alt="#" /></a>
													</div>
												</div>
											</div>
										</div>
										<!-- End Product = display-1-4 -->
									</div>
									<!-- Start Toch-prond-Menu -->
									<div class="toch-prond-menu">
										<ul role="tablist">
											<li role="presentation" class=" active"><a href="#display-1" role="tab" data-toggle="tab"><img src="http://localhost/app/images/<?=$data['product']['images']; ?>" alt="#" /></a></li>
											<li role="presentation"><a href="#display-2" role="tab" data-toggle="tab"><img src="http://localhost/img/toch/2.jpg" alt="#" /></a></li>
											<li role="presentation"><a href="#display-3"  role="tab" data-toggle="tab"><img src="http://localhost/img/toch/3.jpg" alt="#" /></a></li>
											<li role="presentation"><a href="#display-4"  role="tab" data-toggle="tab"><img src="http://localhost/img/toch/4.jpg" alt="#" /></a></li>
										</ul>
									</div>
									<!-- End Toch-prond-Menu -->
								</div>
								<div class="col-md-7 col-sm-7 col-xs-12">
									<h2 class="title-product"><?=$data['product']['name']; ?></h2>
									<div class="about-toch-prond">
										<p>
											<span class="rating">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
											</span>
											<a href="#">1 відгуків</a>
											/
											<a href="#">Написати відгук</a>
										</p>
										<hr />
										<p class="short-description"><?=mb_strimwidth($data['product']['description'], 0, 200, "..."); ?></p>
										<hr />
										<span class="current-price"><?=$data['product']['price'].' Грн'; ?></span>
										<span class="item-stock">Наявність: <span class="text-stock"><?=$data['product']['count']; ?></span></span>
									</div>
									<div class="about-product">
										
									</div>
									<div class="product-quantity">
										<span>Qty</span>
										<input id="countToCart" type="number" min="1" value="1"/>
										<button type="submit" class="toch-button toch-add-cart" onclick="inCart('<?=$data['product']['id']; ?>')">В кошик</button>
										<button type="submit" class="toch-button toch-wishlist">В список бажань</button>
									</div>
								</div>
							</div>
							<!-- Start Toch-Box -->
							<div class="toch-box">
								<div class="row">
									<div class="col-xs-12">
										<!-- Start Toch-Menu -->
										<div class="toch-menu">
											<ul role="tablist">
												<li role="presentation" class=" active"><a href="#description" role="tab" data-toggle="tab">Опис</a></li>
												<li role="presentation"><a href="#reviews" role="tab" data-toggle="tab">Відгуки (1)</a></li>
											</ul>
										</div>
										<!-- End Toch-Menu -->
										<div class="tab-content toch-description-review">
											<!-- Start display-description -->
											<div role="tabpanel" class="tab-pane fade in active" id="description">
												<div class="row">
													<div class="col-xs-12">
														<div class="toch-description">
															<p><?=$data['product']['description'].'<p><h5>Характеристики:</h5>'.$data['product']['properties'].'</p>'; ?>
															</p>
														</div>
													</div>
												</div>
											</div>
											<!-- End display-description -->
											<!-- Start display-reviews -->
											<div role="tabpanel" class="tab-pane fade" id="reviews">
												<div class="row">
													<div class="col-xs-12">
														<div class="toch-reviews">
															<div class="toch-table">
																<table class="table table-striped table-bordered">
																	<tbody>
																		<tr>
																			<td><strong>plaza theme</strong></td>
																			<td class="text-right"><strong>16/02/2016</strong></td>
																		</tr>
																		<tr>
																			<td colspan="2">
																				<p>It is part of Australia's network of offshore processing centres for irregular migrants who arrive by boat, and also houses New Zealanders facing deportation from Australia.</p>
																				<span><i class="fa fa-star"></i></span>
																				<span><i class="fa fa-star"></i></span>
																				<span><i class="fa fa-star"></i></span>
																				<span><i class="fa fa-star"></i></span>
																				<span><i class="fa fa-star-o"></i></span>
																			</td>
																		</tr>
																	</tbody>
																</table>
															</div>
															<div class="toch-review-title">
																<h2>Write a review</h2>
															</div>
															<div class="review-message">
																<div class="col-xs-12">
																	<p><sup>*</sup>Your Name <br>
																		<input type="text" class="form-control" />
																	</p>
																	<p><sup>*</sup>Your Name <br>
																		<textarea class="form-control"></textarea>
																	</p>
																</div>
																<div class="help-block">
																	<span class="note">Note:</span>
																	 HTML is not translated!
																</div>
																<div class="get-rating">
																	<span><sup>*</sup>Rating </span>
																	Bad
																	<input type="radio" value="1" name="rating" />
																	<input type="radio" value="2" name="rating" />
																	<input type="radio" value="3" name="rating" />
																	<input type="radio" value="4" name="rating" />
																	<input type="radio" value="5" name="rating" />
																	Good
																</div>
																<div class="buttons clearfix">
																	<button class="btn btn-primary pull-right">Continue</button>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<!-- End Product = display-reviews -->
										</div>
									</div>
								</div>
							</div>
							<!-- End Toch-Box -->
							<!-- START PRODUCT-AREA -->
							<div class="product-area">
								<div class="row">
									<div class="col-xs-12 col-md-12">
										<!-- Start Product-Menu -->
										<div class="product-menu">
											<div class="product-title">
												<h3 class="title-group-2 gfont-1">Related Products</h3>
											</div>
										</div>
									</div>
								</div>
								<!-- End Product-Menu -->
								<div class="clear"></div>
								<!-- Start Product -->
								<div class="product carosel-navigation">
									<div class="row">
										<div class="active-product-carosel">
											<!-- Start Single-Product -->
											<div class="col-xs-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="primary-img" src="http://localhost/img/product/mediam/3bg.jpg" alt="Product">
														</a>
													</div>
													<div class="product-description">
														<h5><a href="#">Various Versions</a></h5>
														<div class="price-box">
															<span class="price">$80.00</span>
														</div>
													</div>											
												</div>
											</div>
											<!-- End Single-Product -->
											<!-- Start Single-Product -->
											<div class="col-xs-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="primary-img" src="http://localhost/img/product/mediam/11.jpg" alt="Product">
														</a>
													</div>
													<div class="product-description">
														<h5><a href="#">Trid Palm</a></h5>
														<div class="price-box">
															<span class="price">$79.00</span>
														</div>
													</div>											
												</div>
											</div>
											<!-- End Single-Product -->
											<!-- Start Single-Product -->
											<div class="col-xs-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="primary-img" src="http://localhost/img/product/mediam/1.jpg" alt="Product">
														</a>
													</div>
													<div class="product-description">
														<h5><a href="#">Established Fact</a></h5>
														<div class="price-box">
															<span class="price">$75.00</span>
														</div>
													</div>											
												</div>
											</div>
											<!-- End Single-Product -->
											<!-- Start Single-Product -->
											<div class="col-xs-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="primary-img" src="http://localhost/img/product/mediam/2.jpg" alt="Product">
														</a>
													</div>
													<div class="product-description">
														<h5><a href="#">Trid Palm</a></h5>
														<div class="price-box">
															<span class="price">$95.00</span>
														</div>
													</div>											
												</div>
											</div>
											<!-- End Single-Product -->
											<!-- Start Single-Product -->
											<div class="col-xs-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="primary-img" src="http://localhost/img/product/mediam/13.jpg" alt="Product">
														</a>
													</div>
													<div class="product-description">
														<h5><a href="#">Established Fact</a></h5>
														<div class="price-box">
															<span class="price">$82.00</span>
														</div>
													</div>											
												</div>
											</div>
											<!-- End Single-Product -->
											<!-- Start Single-Product -->
											<div class="col-xs-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="primary-img" src="http://localhost/img/product/mediam/10.jpg" alt="Product">
														</a>
													</div>
													<div class="product-description">
														<h5><a href="#">Trid Palm</a></h5>
														<div class="price-box">
															<span class="price">$99.00</span>
														</div>
													</div>											
												</div>
											</div>
											<!-- End Single-Product -->
											<!-- Start Single-Product -->
											<div class="col-xs-12">
												<div class="single-product">
													<div class="product-img">
														<a href="#">
															<img class="primary-img" src="http://localhost/img/product/mediam/10bg.jpg" alt="Product">
														</a>
													</div>
													<div class="product-description">
														<h5><a href="#">Various Versions</a></h5>
														<div class="price-box">
															<span class="price">$95.00</span>
														</div>
													</div>											
												</div>
											</div>
											<!-- End Single-Product -->
										</div>
									</div>

								</div>
								<!-- End Product -->
							</div>
							<!-- END PRODUCT-AREA -->
						</div>
						<!-- End Toch-Prond-Area -->
					</div>
				</div>
			</div>
			<!-- START BRAND-LOGO-AREA -->
			<?php require_once 'BrandLogo.php'; ?>
			<!-- END BRAND-LOGO-AREA -->
		</section>
		<!-- END PAGE-CONTENT -->