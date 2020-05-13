<?php 
	use App\Models\CategoryModelRepository;

	$catModel=new CategoryModelRepository;
	$objDb=$catModel->getObjDb($catModel->getTable());
	$categories= $catModel->getItems();
	$uri=trim($_SERVER['REQUEST_URI'],'/');
	$arOffUri=explode('/',$uri);
	$currentCategoryId=$arOffUri[count($arOffUri)-2];
	if(count($arOffUri) != 4){
		$currentCategoryId=0;
	}
	foreach($categories as $category){
		if ($category->getId() == $currentCategoryId){
			$_SESSION['currentCategoryName']=$category->getName();
		}
	}
?>
					<div class="col-md-3">
						<!-- CATEGORY-MENU-LIST START -->
	                    <div class="left-category-menu hidden-sm hidden-xs">
	                        <div class="left-product-cat">
	                            <div class="category-heading">
	                                <h2>Категорії</h2>
	                            </div>
	                            <div class="category-menu-list">
	                                <ul>
	                                    <!-- Single menu start -->
	                                    			<?php foreach ($categories as $cat1):
	                                    				if ($cat1->getParent_id() == $currentCategoryId): ?>
	                                    <li class="arrow-plus">
	                                    	<a href="/products/see/<?=$cat1->getId();?>/1"><?=$cat1->getName();?></a>
	                                       	<div class="cat-left-drop-menu">
														<?php foreach ($categories as $cat2):
	                                       					if($cat2->getParent_id()==$cat1->getId()): ?>
	                                       		<div class="cat-left-drop-menu-left">
	                                       			<a class="menu-item-heading" href="/products/see/<?=$cat2->getId();?>/1"><?=$cat2->getName();?></a>
	                                       			<ul>
	                                       					<?php foreach($categories as $cat3):
		                                       					if($cat3->getParent_id()==$cat2->getId()): ?>
		                                       			<li>
		                                       				<a href="/products/see/<?=$cat3->getId();?>/1"><?=$cat3->getName();?></a>
		                                       			</li>
		                                       				<?php endif; endforeach;?>
	                                       			</ul>
	                                       		</div>
	                                      				<?php endif; endforeach;?>
	                                       	</div>
		                                    </li>
		                                    		<?php endif; endforeach;?>
	                                    </li>
	                                </ul>
	                            </div>
	                        </div>
	                    </div>
						<!-- END CATEGORY-MENU-LIST -->
						<!-- shop-filter start -->
						<div class="shop-filter">
							<div class="area-title">
								<h3 class="title-group gfont-1">Filters Products</h3>
							</div>
							<h4 class="shop-price-title">Price</h4>
							<div class="info_widget">
								<div class="price_filter">
									<div id="slider-range"></div>
									<div class="price_slider_amount">
										<input type="text" id="amount" name="price"  placeholder="Add Your Price" />
										<input type="submit"  value="Filter"/>  
									</div>
								</div>
							</div>
						</div>
						<!-- shop-filter start -->
						<!-- filter-by start -->
						<div class="accordion_one">
							<h4><a class="accordion-trigger" data-toggle="collapse" href="#divone">Color</a></h4>
							<div id="divone" class="collapse in">
								<div class="filter-menu">
									<ul>
										<li><a href="#">Black (2)</a></li>
										<li><a href="#">Blue (2)</a></li>
										<li><a href="#">Brown (3)</a></li>
										<li><a href="#">Green (3)</a></li>
										<li><a href="#">Orange (2)</a></li>
										<li><a href="#">Pink (2)</a></li>
										<li><a href="#">Red (11)</a></li>
										<li><a href="#">Yellow (3)</a></li>
									</ul>
								</div>
							</div>
							<h4><a class="accordion-trigger" data-toggle="collapse" href="#div2">manufacture</a></h4>
							<div id="div2" class="collapse in">
								<div class="filter-menu">
									<ul>
										<li><a href="#">Chanel (2)</a></li>
										<li><a href="#">Christian Dior (2)</a></li>
										<li><a href="#">Ermenegildo (2)</a></li>
										<li><a href="#">Ferragamo (1)</a></li>
										<li><a href="#">Hermes (2)</a></li>
										<li><a href="#">Louis Vuitton (3)</a></li>
										<li><a href="#">Prada (1)</a></li>
									</ul>
								</div>
							</div>
							<h4><a class="accordion-trigger" data-toggle="collapse" href="#div3">Size</a></h4>
							<div id="div3" class="collapse in">
								<div class="filter-menu">
									<ul>
										<li><a href="#">L (1)</a></li>
										<li><a href="#">M (5)</a></li>
										<li><a href="#">S (7)</a></li>
										<li><a href="#">XL (5)</a></li>
										<li><a href="#">XXL (6)</a></li>
									</ul>
								</div>
							</div>
						</div>
						<!-- filter-by end -->
						<!-- START SMALL-PRODUCT-AREA -->
						<div class="small-product-area carosel-navigation hidden-sm hidden-xs">
							<div class="row">
								<div class="col-md-12">
									<div class="area-title">
										<h3 class="title-group gfont-1">Bestseller</h3>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="active-bestseller sidebar">
									<div class="col-xs-12">
										<!-- Start Single-Product -->
										<div class="single-product">
											<div class="product-img">
												<a href="#">
													<img class="primary-img" src="/img/product/small/1.jpg" alt="Product">
												</a>
											</div>
											<div class="product-description">
												<h5><a href="#">Various Versions</a></h5>
												<div class="price-box">
													<span class="price">$99.00</span>
													<span class="old-price">$110.00</span>
												</div>
												<span class="rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</span>
											</div>
										</div>
										<!-- End Single-Product -->
										<!-- Start Single-Product -->
										<div class="single-product">
											<div class="product-img">
												<a href="#">
													<img class="primary-img" src="/img/product/small/2.jpg" alt="Product">
												</a>
											</div>
											<div class="product-description">
												<h5><a href="#">Established Fact</a></h5>
												<div class="price-box">
													<span class="price">$90.00</span>
													<span class="old-price">$110.00</span>
												</div>
												<span class="rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</span>
											</div>
										</div>
										<!-- End Single-Product -->
										<!-- Start Single-Product -->
										<div class="single-product">
											<div class="product-img">
												<a href="#">
													<img class="primary-img" src="/img/product/small/3.jpg" alt="Product">
												</a>
											</div>
											<div class="product-description">
												<h5><a href="#">Trid Palm</a></h5>
												<div class="price-box">
													<span class="price">$99.00</span>
													<span class="old-price">$110.00</span>
												</div>
												<span class="rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</span>
											</div>
										</div>
										<!-- End Single-Product -->
										<!-- Start Single-Product -->
										<div class="single-product">
											<div class="product-img">
												<a href="#">
													<img class="primary-img" src="/img/product/small/4.jpg" alt="Product">
												</a>
											</div>
											<div class="product-description">
												<h5><a href="#">Established Fact</a></h5>
												<div class="price-box">
													<span class="price">$90.00</span>
													<span class="old-price">$110.00</span>
												</div>
												<span class="rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</span>
											</div>
										</div>
										<!-- End Single-Product -->
									</div>
									<div class="col-xs-12">
										<!-- Start Single-Product -->
										<div class="single-product">
											<div class="product-img">
												<a href="#">
													<img class="primary-img" src="/img/product/small/5.jpg" alt="Product">
												</a>
											</div>
											<div class="product-description">
												<h5><a href="#">Various Versions</a></h5>
												<div class="price-box">
													<span class="price">$99.00</span>
													<span class="old-price">$110.00</span>
												</div>
												<span class="rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</span>
											</div>
										</div>
										<!-- End Single-Product -->
										<!-- Start Single-Product -->
										<div class="single-product">
											<div class="product-img">
												<a href="#">
													<img class="primary-img" src="/img/product/small/6.jpg" alt="Product">
												</a>
											</div>
											<div class="product-description">
												<h5><a href="#">Established Fact</a></h5>
												<div class="price-box">
													<span class="price">$90.00</span>
													<span class="old-price">$110.00</span>
												</div>
												<span class="rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</span>
											</div>
										</div>
										<!-- End Single-Product -->
										<!-- Start Single-Product -->
										<div class="single-product">
											<div class="product-img">
												<a href="#">
													<img class="primary-img" src="/img/product/small/7.jpg" alt="Product">
												</a>
											</div>
											<div class="product-description">
												<h5><a href="#">Trid Palm</a></h5>
												<div class="price-box">
													<span class="price">$99.00</span>
													<span class="old-price">$110.00</span>
												</div>
												<span class="rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</span>
											</div>
										</div>
										<!-- End Single-Product -->
										<!-- Start Single-Product -->
										<div class="single-product">
											<div class="product-img">
												<a href="#">
													<img class="primary-img" src="/img/product/small/8.jpg" alt="Product">
												</a>
											</div>
											<div class="product-description">
												<h5><a href="#">Established Fact</a></h5>
												<div class="price-box">
													<span class="price">$90.00</span>
													<span class="old-price">$110.00</span>
												</div>
												<span class="rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</span>
											</div>
										</div>
										<!-- End Single-Product -->
									</div>
								</div>
							</div>
						</div>
						<!-- END SMALL-PRODUCT-AREA -->
					</div>