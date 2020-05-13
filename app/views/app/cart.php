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
<?php require_once 'banner.php'; ?>
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
												<?php foreach ($data['products'] as $product):
													$sum=$product->getPrice() * $data['counts'][(int) $product->getId()];
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
									<h3 class="title-group-3 gfont-1">Що б ви хотіли зробити далі?</h3>
									<p>Виберіть, чи у вас є купон на знижку або подарунковий сертифікат, які ви хочете використати.</p>
									<!-- Accordion start -->
									<div class="accordion-cart">
										<div class="panel-group" id="accordion">
											<!-- Start Coupon -->
											<div class="panel panel_default">
												<div class="panel-heading">
													<h4 class="panel-title">
														<a class="accordion-trigger" data-toggle="collapse" data-parent="#accordion" href="#coupon">Використати купон<i class="fa fa-caret-down"></i> </a>
													</h4>
												</div>
												<div id="coupon" class="collapse in">
													<div class="panel-body">
														<div class="col-sm-2">
															<p>Введіть номер купону сюди</p>
														</div>
														<div class="input-group">
															<input class="form-control" type="text" placeholder="Введіть номер купону сюди" />
															<button type="submit" class="btn btn-primary">Використати купон</button>
														</div>
													</div>
												</div>
											</div>
											<!-- End Coupon -->
											<!-- Start Voucher -->
											<div class="panel panel_default">
												<div class="panel-heading">
													<h4 class="panel-title">
														<a class="accordion-trigger collapsed" data-toggle="collapse" data-parent="#accordion" href="#voucher">Використати сертифікат <i class="fa fa-caret-down"></i> </a>
													</h4>
												</div>
												<div id="voucher" class="collapse">
													<div class="panel-body">
														<div class="col-sm-2">
															<p>Введіть номер сертифікату сюди</p>
														</div>
														<div class="input-group">
															<input class="form-control" type="text" placeholder="Введіть номер сертифікату сюди" />
															<button type="submit" class="btn btn-primary">Використати сертифікат</button>
														</div>
													</div>
												</div>
											</div>
											<!-- And Voucher -->
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
														<td class="text-right">₴ <?=$data['totalSum']; ?></td>
													</tr>
													<tr>
														<td class="text-right">
															<strong>Total:</strong>
														</td>
														<td class="text-right">₴ <?=$data['totalSum']; ?></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									<div class="shopping-checkout">
										<a href="/products/see/0/1" class="btn btn-default pull-left">За покупками</a>
										<a href="/checkout/see" id="checkout" class="btn btn-primary pull-right">Оформити замовлення</a>
									</div>
									<?php } else echo '<h2>Ваш кошик порожній</h2>'; ?>
								</div>
							</div>
						</div>
						<!-- End Shopping-Cart -->
					</div>
				</div>
			</div>
<?php require_once 'brandLogo.php'; ?>
<?php require_once 'subscribeArea.php'; ?>
		</section>
		<!-- END PAGE-CONTENT -->