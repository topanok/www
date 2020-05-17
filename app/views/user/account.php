		<!-- START PAGE-CONTENT -->
		<section class="page-content">
			<div class="container">
	            <div class="row">
					<div class="col-md-12">
						<ul class="page-menu">
							<li><a href="index.html">Home</a></li>
							<li class="active"><a href="my-account.html">My Account</a></li>
						</ul>
					</div>
				</div>
				<div class="row">
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/app/views/app/sidebar.php'; ?>
					<div class="col-md-9">
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/app/views/app/banner.php'; ?>
						<!-- entry-header-area start -->
						<div class="entry-header-area">
							<div class="row">
								<div class="col-md-12">
									<div class="entry-header">
										<h2 class="entry-title">Мій аккаунт</h2>
									</div>
								</div>
							</div>
						</div>
						<!-- entry-header-area end -->
						<!-- Start checkout-area -->
						<div class="checkout-area">
							<div class="row">
								<div class="col-md-12">
									<!-- Accordion start -->
									<div class="panel-group" id="accordion">
										<!-- Start My-First-Address -->
										<div class="panel panel_default">
											<div class="panel-heading">
												<h4 class="panel-title">
													<a class="accordion-trigger" data-toggle="collapse" data-parent="#accordion" href="#payment-address">Персональні дані <i class="fa fa-caret-down"></i> </a>
												</h4>
											</div>
											<div id="payment-address" class="collapse">
												<div class="panel-body">
													<div class="row">
														<div class="col-md-6 col-xs-12">
															<fieldset id="account">
																<legend>Мої персональні дані</legend>
																<div class="form-group">
																	<label><sup>*</sup>Ім'я</label>
																	<input type="text" class="form-control" placeholder="Ім'я" name="firstname" />
																</div>
																<div class="form-group">
																	<label><sup>*</sup>Фамілія</label>
																	<input type="text" class="form-control" placeholder="Фамілія" name="lastname" />
																</div>
																<div class="form-group">
																	<label><sup>*</sup>Логін</label>
																	<input type="text" class="form-control" placeholder="Логін" name="lastname" />
																</div>
																<div class="form-group">
																	<label><sup>*</sup>E-mail</label>
																	<input type="email" class="form-control" placeholder="E-mail" name="email" />
																</div>
																<div class="form-group">
																	<label><sup>*</sup>Телефон</label>
																	<input type="text" class="form-control" placeholder="Телефон" name="telephone" />
																</div>
																<div class="form-group">
																	<label>Дата народження</label>
																	<div class="row">
																		<div class="col-xs-4">
																			<select class="form-control">
																				<?php for($i=1; $i<=31; $i++){ ?>
																				<option><?=$i; ?></option>
																				<?php } ?>
																			</select>                 
																		</div>
																		<div class="col-xs-4">
																			<select class="form-control">
																				<option>Січень</option>
																				<option>Лютий</option>
																				<option>Березень</option>
																				<option>Квітень</option>
																				<option>Травень</option>
																				<option>Червень</option>
																				<option>Липень</option>
																				<option>Серпень</option>
																				<option>Вересень</option>
																				<option>Жовтень</option>
																				<option>Листопад</option>
																				<option>Грудень</option>
																			</select>                 
																		</div>
																		<div class="col-xs-4">
																			<select class="form-control">
																				<?php for($i=1940; $i<=date('Y'); $i++){ ?>
																				<option><?=$i; ?></option>
																				<?php } ?>
																			</select>                 
																		</div>
																	</div>          
																</div>		
															</fieldset>
															<fieldset>
																<legend>Додаткова інформація</legend>
																<textarea class="form-control"  rows="6"></textarea>
															</fieldset>
														</div>
														<div class="col-md-6 col-xs-12">
															<fieldset id="address">
																<legend>Адреса</legend>
																<div class="form-group">
																	<label><sup>*</sup>Адреса</label>
																	<input type="text" class="form-control" placeholder="Адреса" name="Address" />
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
																	<input type="checkbox" name="newsletter" checked />
																	 Отримувати новини від Best Shop
																</label>
															</div>
															<div class="buttons clearfix">
																<div class="pull-right">
																	Я прочитав і погоджуюсь з 
																	<a href="#"><b>політикою конфіденційності</b></a>
																	<input type="checkbox" name="agree" />
																	<input type="button" class="btn btn-primary" value="Зберегти" />
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!-- End My-First-Address -->
										<!-- Start Order History And Details -->
										<div class="panel panel_default">
											<div class="panel-heading">
												<h4 class="panel-title">
													<a class="accordion-trigger collapsed" data-toggle="collapse" data-parent="#accordion" href="#checkout-confirm">Історія замовленнь<i class="fa fa-caret-down"></i> </a>
												</h4>
											</div>
											<div id="checkout-confirm" class="collapse">
												<div class="panel-body">
													<!-- Start Table -->
													<div class="table-responsive">
														<table class="table table-bordered">
															<thead>
																<tr>
																	<td class="text-left">№ Замовлення</td>
																	<td class="text-left">Дата замовлення</td>
																	<td class="text-left">Статус</td>
																	<td class="text-left">Сума</td>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td class="text-left">
																		<a href="/user/order">123421</a>
																	</td>
																	<td class="text-left">
																		01.08.19
																	</td>
																	<td class="text-left">Виконаний</td>
																	<td class="text-left">₴ 1999.50</td>
																</tr>
															</tbody>
															<tfoot>
																<tr>
																	<td class="text-right" colspan="3">
																		<strong>Загальна сума:</strong>
																	</td>
																	<td class="text-right">₴ 1999.50</td>
																</tr>
															</tfoot>
														</table>
													</div>
													<!-- End Table -->
												</div>
											</div>
										</div>
										<!-- End Order History And Details -->
										<!-- Start My Wish List -->
										<div class="panel panel_default">
											<div class="panel-heading">
												<h4 class="panel-title">
													<a class="accordion-trigger collapsed" data-toggle="collapse" data-parent="#accordion" href="#payment-method">Обране<i class="fa fa-caret-down"></i> </a>
												</h4>
											</div>
											<div id="payment-method" class="collapse">
												<div class="panel-body">
													<div class="table-responsive">
														<table class="table table-bordered table-hover">
															<thead>
																<tr>
																	<td class="text-center">Зображення</td>
																	<td class="text-left">Назва</td>
																	<td class="text-right">Наявність</td>
																	<td class="text-right">Ціна</td>
																	<td class="text-right">Дія</td>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td class="text-center">
																		<a href="#"><img src="/img/product/cart/3.jpg" alt="#" /></a>
																	</td>
																	<td class="text-left">
																		<a href="#">Prod Aldults</a>
																	</td>
																	<td class="text-right">In Stock</td>
																	<td class="text-right">
																		<div class="price-box">
																			<span class="price">$100.00</span>
																		</div>
																	</td>
																	<td class="text-right">
																		<button class="btn btn-primary" data-toggle="tooltip" title="Add to Cart" type="button">
																			<i class="fa fa-shopping-cart"></i>
																		</button>
																		<a href="#" class="btn btn-danger" data-toggle="tooltip" title="Remove">
																			<i class="fa fa-times"></i>
																		</a>
																	</td>
																</tr>
																<tr>
																	<td class="text-center">
																		<a href="#"><img src="/img/product/cart/4.jpg" alt="#" /></a>
																	</td>
																	<td class="text-left">
																		<a href="#">Prod Aldults</a>
																	</td>
																	<td class="text-right">In Stock</td>
																	<td class="text-right">
																		<div class="price-box">
																			<span class="price">$45.00</span>
																			<span class="old-price">$100.00</span>
																		</div>
																	</td>
																	<td class="text-right">
																		<button class="btn btn-primary" data-toggle="tooltip" title="Add to Cart" type="button">
																			<i class="fa fa-shopping-cart"></i>
																		</button>
																		<a href="#" class="btn btn-danger" data-toggle="tooltip" title="Remove">
																			<i class="fa fa-times"></i>
																		</a>
																	</td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
										<!-- End My Wish List -->
									</div>
									<!-- Accordion end -->
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/app/views/app/smallProductArea.php'; ?>
								</div>
							</div>
						</div>
						<!-- End Shopping-Cart -->

						<!-- My-Account-Area start -->
						<div class="my-account-area">
							<div class="row">
								<div class="col-md-6">

								</div>
							</div>
						</div>
						<!-- My-Account-Area end -->
					</div>
				</div>
			</div>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/app/views/app/brandLogo.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/app/views/app/subscribeArea.php'; ?>
		</section>
		<!-- END PAGE-CONTENT -->
		