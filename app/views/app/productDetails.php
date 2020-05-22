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
														<a href="#"><img src="/app/images/<?=$data['product']['images']; ?>" data-imagezoom="true" alt="#" /></a>
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
														<a href="#"><img src="/img/toch/2.jpg" data-imagezoom="true" alt="#" /></a>
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
														<a href="#"><img src="/img/toch/3.jpg" data-imagezoom="true" alt="#" /></a>
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
														<a href="#"><img src="/img/toch/4.jpg" data-imagezoom="true" alt="#" /></a>
													</div>
												</div>
											</div>
										</div>
										<!-- End Product = display-1-4 -->
									</div>
									<!-- Start Toch-prond-Menu -->
									<div class="toch-prond-menu">
										<ul role="tablist">
											<li role="presentation" class=" active"><a href="#display-1" role="tab" data-toggle="tab"><img src="/app/images/<?=$data['product']['images']; ?>" alt="#" /></a></li>
											<li role="presentation"><a href="#display-2" role="tab" data-toggle="tab"><img src="/img/toch/2.jpg" alt="#" /></a></li>
											<li role="presentation"><a href="#display-3"  role="tab" data-toggle="tab"><img src="/img/toch/3.jpg" alt="#" /></a></li>
											<li role="presentation"><a href="#display-4"  role="tab" data-toggle="tab"><img src="/img/toch/4.jpg" alt="#" /></a></li>
										</ul>
									</div>
									<!-- End Toch-prond-Menu -->
								</div>
								<div class="col-md-7 col-sm-7 col-xs-12">
									<h2 class="title-product"><?=$data['product']['name']; ?></h2>
									<div class="about-toch-prond">
										<p>
											<?php for($i=0; $i<$data['averageRating']; $i++){ ?>
											<span><i class="fa fa-star"></i></span>
											<?php } for($i=0; $i<5-$data['averageRating']; $i++){?>
											<span><i class="fa fa-star-o"></i></span>
											<?php } ?>
											<a href="#" onclick="goTo('mini-div', null);return false;">Відгуки <strong><?=$data['reviewsCount']; ?></strong></a>
											<?php if (!isset($data['reviewIsset'])): ?>
											/<a href="#" onclick="goTo('mini-div', goToForm);return false;">Залишити відгук</a>
											<?php endif; ?>
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
							<div id="mini-div" class="toch-box">
								<div class="row">
									<div class="col-xs-12">
										<!-- Start Toch-Menu -->
										<div class="toch-menu">
											<ul role="tablist">
												<li role="presentation" id="li-presentation-description" class="active" ><a href="#description" role="tab" data-toggle="tab">Опис</a></li>
												<li role="presentation" id="li-presentation-properties"><a href="#properties" role="tab" data-toggle="tab">Харак-ки</a></li>
												<li role="presentation" id="li-presentation-reviews"><a href="#reviews" role="tab" data-toggle="tab">Відгуки (<?=$data['reviewsCount']; ?>)</a></li>
											</ul>
										</div>
										<!-- End Toch-Menu -->
										<div id="content-reviews" class="tab-content toch-description-review">
											<!-- Start display-description -->
											<div role="tabpanel" class="tab-pane fade in active" id="description">
												<div class="row">
													<div class="col-xs-12">
														<div class="toch-description">
															<p>
																<h5>Опис:</h5>
															</p>
															<p>
																<?=$data['product']['description']; ?>
															</p>
														</div>
													</div>
												</div>
											</div>
											<!-- End display-description -->
											<!-- Start display-description -->
											<div role="tabpanel" class="tab-pane fade" id="properties">
												<div class="row">
													<div class="col-xs-12">
														<div class="toch-description">
															<p>
																<h5>Характеристики:</h5>
															</p>
															<p>
																<?=$data['product']['properties']; ?>
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
																	<?php foreach($data['reviews'] as $review): ?>
																	<tbody>
																		<tr>
																			<td><strong class="user-name"><?=$review['user_name'];?></strong></td>
																			<td class="text-right"><strong class="date-review"><?=$review['date']; ?></strong></td>
																		</tr>
																		<tr>
																			<td colspan="2" class="user-review-td">
																				<p><?=$review['review']; ?></p>
																				<?php for($i=0; $i<$review['rating']; $i++){ ?>
																				<span><i class="fa fa-star"></i></span>
																				<?php } for($i=0; $i<5-$review['rating']; $i++){?>
																				<span><i class="fa fa-star-o"></i></span>
																				<?php } ?>
																			</td>
																		</tr>
																	</tbody>
																	<?php endforeach; ?>
																</table>
															</div>
															<div id="write-review" class="review-message">
																<?php if (!isset($data['reviewIsset'])){ ?>
																<div class="toch-review-title">
																	<h2>Залишити відгук</h2>
																</div>
																<div class="col-xs-12">
																	<div class="enter-name">
																		<p><sup>*</sup>Ваше ім'я <br>
																		<input id="user-name" type="text" class="form-control" name="name" onchange="checkName()" placeholder="Мінімум 2 символи" value="<?php if(isset($data['userName'])) echo $data['userName']; ?>" />
																		</p>
																		<div class="error-name"></div>
																	</div>
																	<div class="enter-review">
																		<p><sup>*</sup>Ваш відгук <br>
																			<textarea id="user-review" class="form-control"  onchange="checkReview()" placeholder="Мінімум 20 символів" rows="5" name="review"></textarea>
																		</p>
																		<div class="error-review"></div>
																	</div>
																	</div>
																	<div class="help-block">
																		<span class="note">Увага:</span>
																		 HTML не підтримується!
																	</div>
																	<div class="get-rating">
																		<span><sup>*</sup>Оцінка </span>
																		погано
																		<input type="radio" value="1" name="rating" />
																		<input type="radio" value="2" name="rating" />
																		<input type="radio" value="3" name="rating" />
																		<input type="radio" value="4" name="rating" />
																		<input type="radio" value="5" name="rating" />
																		добре
																		<div class="error-rating"></div>
																	</div>
																	<div class="buttons clearfix">
																		<button class="btn btn-primary pull-right" onclick="addReview('<?=$data['product']['id'];?>')">Залишити відгук</button>
																	</div>
																	<?php } else echo '<div class="toch-review-title"><pre style="background-color: #E0F2F7">Ви залишали відгук до цього продукту :-)</pre></div>'; ?>
															</div>
															<div class="sucess-mesage"></div>
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
															<img class="primary-img" src="/img/product/mediam/3bg.jpg" alt="Product">
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
															<img class="primary-img" src="/img/product/mediam/11.jpg" alt="Product">
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
															<img class="primary-img" src="/img/product/mediam/1.jpg" alt="Product">
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
															<img class="primary-img" src="/img/product/mediam/2.jpg" alt="Product">
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
															<img class="primary-img" src="/img/product/mediam/13.jpg" alt="Product">
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
															<img class="primary-img" src="/img/product/mediam/10.jpg" alt="Product">
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
															<img class="primary-img" src="/img/product/mediam/10bg.jpg" alt="Product">
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
			<!-- START SUBSCRIBE-AREA -->
			<?php require_once 'subscribeArea.php'; ?>
			<!-- END SUBSCRIBE-AREA -->
		</section>
		<!-- END PAGE-CONTENT -->