		<!-- START PAGE-CONTENT -->
		<section class="page-content">
			<div class="container">
	            <div class="row">
					<div class="col-md-12">
						<ul class="page-menu">
							<li><a href="index.html">Home</a></li>
							<li class="active"><a href="#">Shopping Cart</a></li>
						</ul>
					</div>
				</div>
				<div class="row">
					<?php require_once 'sidebar.php'; ?>
					<div class="col-md-9 col-xs-12">
						<!-- Start Shopping-Cart -->
						<div class="shopping-cart">
							<div class="row">
								<div class="col-md-12">
									<?php if(!empty($data)){ ?>
									<div class="cart-title">
										<h2 class="entry-title">Кошик</h2>
									</div>
									<!-- Start Table -->
									<div class="table-responsive">
										<table class="table table-bordered">
											<thead>
												<tr>
													<td class="text-center">зображення</td>
													<td class="text-left">Назва</td>
													<td class="text-left">Кількість</td>
													<td class="text-right">Ціна</td>
													<td class="text-right">Разом</td>
												</tr>
											</thead>
											<tbody>
												<?php $total=0; foreach ($data['products'] as $product):
													$sum=$product->getPrice() * $data['counts'][(int) $product->getId()];
													$total+=$sum;
												?>
												<tr class="prodIn<?=$product->getId(); ?>">
													<td class="text-center">
														<a href="http://localhost/product/details/<?=$product->getId(); ?>"><img src="http://localhost/app/images/<?=$product->getImages(); ?>" width="125px"></a>
													</td>
													<td class="text-left">
														<a href="http://localhost/product/details/<?=$product->getId(); ?>"><?=$product->getName(); ?></a>
													</td>
													<td class="text-left">
														<div class="btn-block cart-put">
															<input id="countToUpdate<?=$product->getId(); ?>" class="form-control" type="number" min ="1" value="<?= $data['counts'][(int) $product->getId()]; ?>" />
															<div class="input-group-btn cart-buttons">
																<button class="btn btn-primary" onclick="updateCart('<?=$product->getId(); ?>')" title="Update">
																	<i class="fa fa-refresh"></i>
																</button>
																<button class="btn btn-danger" data-toggle="tooltip" title="Remove" onclick="removeFromCart('<?=$product->getId(); ?>')">
																	<i class="fa fa-times-circle"></i>
																</button>
															</div>
														</div>
													</td>
													<td class="text-right">₴ <?=$product->getPrice(); ?></td>
													<td class="text-right">₴ <?=$sum; ?></td>
												</tr>
											<?php endforeach; ?>
											</tbody>
										</table>
									</div>
									<!-- End Table -->
									<h3 class="title-group-3 gfont-1">What would you like to do next?</h3>
									<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
									<!-- Accordion start -->
									<div class="accordion-cart">
										<div class="panel-group" id="accordion">
											<!-- Start Coupon -->
											<div class="panel panel_default">
												<div class="panel-heading">
													<h4 class="panel-title">
														<a class="accordion-trigger" data-toggle="collapse" data-parent="#accordion" href="#coupon">Use Coupon Code<i class="fa fa-caret-down"></i> </a>
													</h4>
												</div>
												<div id="coupon" class="collapse in">
													<div class="panel-body">
														<div class="col-sm-2">
															<p>Enter your coupon here</p>
														</div>
														<div class="input-group">
															<input class="form-control" type="text" placeholder="Enter your coupon here" />
															<button type="submit" class="btn btn-primary">Apply Coupon</button>
														</div>
													</div>
												</div>
											</div>
											<!-- End Coupon -->
											<!-- Start Voucher -->
											<div class="panel panel_default">
												<div class="panel-heading">
													<h4 class="panel-title">
														<a class="accordion-trigger collapsed" data-toggle="collapse" data-parent="#accordion" href="#voucher">Use Gift Voucher <i class="fa fa-caret-down"></i> </a>
													</h4>
												</div>
												<div id="voucher" class="collapse">
													<div class="panel-body">
														<div class="col-sm-2">
															<p>Enter your gift voucher code here</p>
														</div>
														<div class="input-group">
															<input class="form-control" type="text" placeholder="Enter your gift voucher code here" />
															<button type="submit" class="btn btn-primary">Apply Voucher</button>
														</div>
													</div>
												</div>
											</div>
											<!-- Start Voucher -->
											<!-- Start Shipping -->
											<div class="panel panel_default">
												<div class="panel-heading">
													<h4 class="panel-title">
														<a class="accordion-trigger collapsed" data-toggle="collapse" data-parent="#accordion" href="#shipping">Estimate Shipping & Taxes <i class="fa fa-caret-down"></i> </a>
													</h4>
												</div>
												<div id="shipping" class="collapse">
													<div class="panel-body">
														<div class="col-sm-12">
															<p>Enter your destination to get a shipping estimate.</p>
														</div>
														<div class="form-horizontal">
															<div class="form-group">
																<label class="col-sm-2 control-label"><sup>*</sup>Country</label>
																<div class="col-sm-10">
																	<select class="form-control">
																		<option> --- Please Select --- </option>
																		<option> Bangladesh </option>
																		<option> United States </option>
																		<option> United Kingdom </option>
																		<option> Canada </option>
																		<option> Malaysia </option>
																		<option> United Arab Emirates </option>
																	</select>
																</div>
															</div>
															<div class="form-group">
																<label class="col-sm-2 control-label"><sup>*</sup>Region / State</label>
																<div class="col-sm-10">
																	<select class="form-control">
																		<option> --- Please Select --- </option>
																		<option> Aberdeen </option>
																		<option> Bedfordshire </option>
																		<option> Caerphilly </option>
																		<option> Denbighshire </option>
																		<option> East Ayrshire </option>
																		<option> Falkirk </option>
																	</select>
																</div>
															</div>
															<div class="form-group">
																<label class="col-sm-2 control-label"><sup>*</sup>Post Code</label>
																<div class="col-sm-10">
																	<input type="text" class="form-control" placeholder="Post Code" />
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<!-- Start Shipping -->
										</div>
									</div>
									<!-- Accordion end -->
									<div class="row">
										<div class="col-sm-4 col-sm-offset-8">
											<table class="table table-bordered">
												<tbody>
													<tr>
														<td class="text-right">
															<strong>Sub-Total:</strong>
														</td>
														<td class="text-right">₴ <?=$total; ?></td>
													</tr>
													<tr>
														<td class="text-right">
															<strong>Total:</strong>
														</td>
														<td class="text-right">₴ <?=$total; ?></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									<div class="shopping-checkout">
										<a href="http://localhost/products/see/0/1" class="btn btn-default pull-left">За покупками</a>
										<a href="#" class="btn btn-primary pull-right">Оформити замовлення</a>
									</div>
									<?php } else echo '<h2>Ваш кошик порожній</h2>'; ?>
								</div>
							</div>
						</div>
						<!-- End Shopping-Cart -->
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
								<a href="#"><i class="fa fa-facebook fb"></i></a>
								<a href="#"><i class="fa fa-google-plus gp"></i></a>
								<a href="#"><i class="fa fa-twitter tt"></i></a>
								<a href="#"><i class="fa fa-youtube yt"></i></a>
								<a href="#"><i class="fa fa-linkedin li"></i></a>
								<a href="#"><i class="fa fa-rss rs"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>	
			<!-- END SUBSCRIBE-AREA -->
		</section>
		<!-- END PAGE-CONTENT -->