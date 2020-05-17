		<!-- START PAGE-CONTENT -->
		<section class="page-content">
			<div class="container">
	            <div class="row">
					<div class="col-md-12">
						<ul class="page-menu">
							<li><a href="index.html">Home</a></li>
							<li><a href="cart.html">Shopping Cart</a></li>
							<li class="active"><a href="checkout.html">Checkout</a></li>
						</ul>
					</div>
				</div>
				<div class="row">
					<!-- SIDEBAR START -->
					<?php require_once 'sidebar.php'; ?>
					<!-- SIDEBAR END -->
					<div class="col-md-9">
						<!-- START PRODUCT-BANNER -->
						<?php require_once 'banner.php'; ?>
						<!-- END PRODUCT-BANNER -->
						<!-- Start checkout-area -->
						<div class="checkout-area">
							<div class="row">
								<div class="col-md-12">
									<div class="cart-title">
										<h2 class="entry-title">Деталі замовлення</h2>
									</div>
									<!-- Accordion start -->
									<div class="panel-group" id="accordion">
										<!-- Start 1 Checkout-options -->
										<div class="panel panel_default">
											<div class="panel-heading">
												<h4 class="panel-title">
													<a class="accordion-trigger" data-toggle="collapse" data-parent="#accordion" href="#checkout-options">Крок 1: Варіанти оформлення замовлення  <i class="fa fa-caret-down"></i> </a>
												</h4>
											</div>
											<div id="checkout-options" class="collapse in">
												<div class="panel-body">

													<?php var_dump($data); if(!$_SESSION['auth']){ ?>
													<div class="row">
														<div class="col-md-6 col-xs-12">
															<div class="checkout-collapse">
																<h3 class="title-group-3 gfont-1">Новий покупець</h3>
																<div class="radio">
																	<label>
																		<input type="radio" value="register" name="account" checked/>
																		Створити аккаунт
																	</label>
																</div>
																<div class="radio">
																	<label>
																		<input type="radio" value="guest" name="account"/>
																		Продовжити як Гість
																	</label>
																</div>
																<p>Створивши обліковий запис, ви зможете здійснювати покупки швидше, бути в курсі статусу замовлення та стежити за раніше зробленими замовленнями.</p>
																<input type="submit" class="btn btn-primary" value="Продовжити"/>
															</div>
														</div>
														<div class="col-md-6 col-xs-12">
															<div class="checkout-collapse">
																<h3 class="title-group-3 gfont-1">Зареєстрований покупець</h3>
																<div class="form-group">
																	<label>E-mail</label>
																	<input type="email" class="form-control" name="email" />
																</div>
																<div class="form-group">
																	<label>Пароль</label>
																	<input type="password" class="form-control" />
																	<a href="#">Забули пароль?</a>
																</div>
																<input type="submit" class="btn btn-primary" value="Ввійти"/>
															</div>
														</div>
													</div>
													<?php } else echo 'Перейдіть до кроку 2'; ?>
												</div>
											</div>
										</div>
										<!-- End Checkout-options -->
										<!-- Start 2 Payment-Address -->
										<div class="panel panel_default">
											<div class="panel-heading">
												<h4 class="panel-title">
													<a class="accordion-trigger  collapsed" data-toggle="collapse" data-parent="#accordion" href="#payment-address">Крок 2: Аккаунт і дані для доставки <i class="fa fa-caret-down"></i> </a>
												</h4>
											</div>
											<div id="payment-address" class="collapse">
												<div class="panel-body">
													<div class="row">
														<div class="col-md-6 col-xs-12">
															<fieldset id="account">
																<legend>Персональні дані</legend>
																<div class="form-group">
																	<label><sup>*</sup>Імя</label>
																	<input type="text" class="form-control" placeholder="Імя" name="firstname" />
																</div>
																<div class="form-group">
																	<label><sup>*</sup>Фамілія</label>
																	<input type="text" class="form-control" placeholder="Фамілія" name="lastname" />
																</div>
																<div class="form-group">
																	<label><sup>*</sup>E-mail</label>
																	<input type="email" class="form-control" placeholder="E-mail" name="email" />
																</div>
																<div class="form-group">
																	<label><sup>*</sup>Телефон</label>
																	<input type="text" class="form-control" placeholder="Телефон" name="telephone" />
																</di>
															</fieldset>
														</div>
														<div class="col-md-6 col-xs-12">
															<fieldset id="address">
																<legend>Адреса</legend>
																<div class="form-group">
																	<label><sup>*</sup>Адреса</label>
																	<input type="text" class="form-control" placeholder="Вулиця і номер будинку" name="Address_1" />
																</div>
																<div class="form-group">
																	<label><sup>*</sup>Населений пункт</label>
																	<input type="text" class="form-control" placeholder="Населений пункт" name="city" />
																</div>
																<div class="form-group">
																	<label><sup>*</sup>Область</label>
																	<select class="form-control">
																		<option> Вінницька </option>
																		<option> Волинська </option>
																		<option> Дніпропетровська </option>
																		<option> Донецька </option>
																		<option> Житомирська </option>
																		<option> Закарпатська </option>
																		<option> Запорізька </option>
																		<option> Івано-Франківська </option>
																		<option> Київська </option>
																		<option> Кіровоградська </option>
																		<option> Луганська </option>
																		<option> Львівська </option>
																		<option> Миколаївська </option>
																		<option> Одеська </option>
																		<option> Полтавська </option>
																		<option> Рівненська </option>
																		<option> Сумська </option>
																		<option> Тернопільська </option>
																		<option> Харківська </option>
																		<option> Херсонська </option>
																		<option> Хмельницька </option>
																		<option> Черкаська </option>
																		<option> Чернівецька </option>
																		<option> Чернігівська </option>
																		<option> АР Крим </option>
																	</select>
																</div>
															</fieldset>
														</div>
													</div>
													<div class="row">
														<div class="col-xs-12">
															<div class="checkbox">
																<label>
																	<input type="checkbox" name="newsletter" />
																	 Отримувати новини від Best Shop
																</label>
															</div>
															<div class="buttons clearfix">
																<div class="pull-right">
																	Я прочитав і погоджуюсь з  
																	<a href="#"><b>політикою конфіденційності</b></a>
																	<input type="checkbox" name="agree" />
																	<input type="button" class="btn btn-primary" value="Continue" />
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!-- End Payment-Address -->
										<!-- Start 3 shipping-Method -->
										<div class="panel panel_default">
											<div class="panel-heading">
												<h4 class="panel-title">
													<a class="accordion-trigger collapsed" data-toggle="collapse" data-parent="#accordion" href="#shipping-method">Крок 3: Спосіб доставки та оплати <i class="fa fa-caret-down"></i> </a>
												</h4>
											</div>
											<div id="shipping-method" class="collapse">
												<div class="panel-body">
													<div class="row">
														<div class="col-md-6 col-xs-12">
															<fieldset id="shpping">
																<legend>Компанія</legend>
																<div class="form-group">
																	<select class="form-control">
																		<option> Нова Пошта </option>
																		<option> Delivery </option>
																		<option> InTime </option>
																		<option> УкрПошта </option>
																		<
																	</select>
																</div>
															</fieldset>
														</div>
														<div class="col-md-6 col-xs-12">
															<fieldset id="payment">
																<legend>Спосіб оплати</legend>
																<div class="form-group">
																	<select class="form-control">
																		<option> Privat24 </option>
																		<option> Visa/MasterCard </option>
																		<option> Накладений платіж </option>
																	</select>
																</div>
															</fieldset>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!-- End shipping-Method -->
										<!-- Start 6 Checkout-Confirm -->
										<div class="panel panel_default">
											<div class="panel-heading">
												<h4 class="panel-title">
													<a class="accordion-trigger collapsed" data-toggle="collapse" data-parent="#accordion" href="#checkout-confirm">Крок 4: Підтвердити замовлення <i class="fa fa-caret-down"></i> </a>
												</h4>
											</div>
											<div id="checkout-confirm" class="collapse">
												<div class="panel-body">
													<div class="table-responsive">
														<table class="table table-bordered table-hover">
															<thead>
																<tr>
																	<td class="text-left">Product Name</td>
																	<td class="text-left">Quantity</td>
																	<td class="text-left">Unit Price</td>
																	<td class="text-left">Total</td>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td class="text-left">
																		<a href="#">More-Or-Less</a>
																	</td>
																	<td class="text-left">2</td>
																	<td class="text-left">$100.00</td>
																	<td class="text-left">$200.00</td>
																</tr>
																<tr>
																	<td class="text-left">
																		<a href="#">Aliquam Consequat</a>
																	</td>
																	<td class="text-left">2</td>
																	<td class="text-left">$45.00</td>
																	<td class="text-left">$90.00</td>
																</tr>
															</tbody>
															<tfoot>
																<tr>
																	<td class="text-right" colspan="3">
																		<strong>Sub-Total:</strong>
																	</td>
																	<td class="text-right">$290.00</td>
																</tr>
																<tr>
																	<td class="text-right" colspan="3">
																		<strong>Flat Shipping Rate:</strong>
																	</td>
																	<td class="text-right">$5.00</td>
																</tr>
																<tr>
																	<td class="text-right" colspan="3">
																		<strong>Flat Shipping Rate:</strong>
																	</td>
																	<td class="text-right">$5.00</td>
																</tr>
															</tfoot>
														</table>
													</div>
													<div class="buttons pull-right">
														<input type="button" class="btn btn-primary" value="Confirm Order" />
													</div>
												</div>
											</div>
										</div>
										<!-- End Checkout-Confirm -->
									</div>
									<!-- Accordion end -->
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
			<?php require_once 'subscribeArea.php'; ?>
			<!-- END SUBSCRIBE-AREA -->
		</section>
		<!-- END PAGE-CONTENT -->
		