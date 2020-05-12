<?php 
	use App\Models\CategoryModelRepository;

	$catModel=new CategoryModelRepository;
	$objDb=$catModel->getObjDb($catModel->getTable());
	$categories= $catModel->getItems();
	$uri=trim($_SERVER['REQUEST_URI'],'/');
	$arOffUri=explode('/',$uri);
	$currentCategoryId=$arOffUri[count($arOffUri)-2];
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
	                                <h2>categories</h2>
	                            </div>
	                            <div class="category-menu-list">
	                                <ul>
	                                    <!-- Single menu start -->
	                                    			<?php foreach ($categories as $cat1):
	                                    				if ($cat1->getParent_id() == $currentCategoryId): ?>
	                                    <li class="arrow-plus">
	                                    	<a href="http://localhost/products/see/<?=$cat1->getId();?>/1"><?=$cat1->getName();?></a>
	                                       	<div class="cat-left-drop-menu">
														<?php foreach ($categories as $cat2):
	                                       					if($cat2->getParent_id()==$cat1->getId()): ?>
	                                       		<div class="cat-left-drop-menu-left">
	                                       			<a class="menu-item-heading" href="http://localhost/products/see/<?=$cat2->getId();?>/1"><?=$cat2->getName();?></a>
	                                       			<ul>
	                                       					<?php foreach($categories as $cat3):
		                                       					if($cat3->getParent_id()==$cat2->getId()): ?>
		                                       			<li>
		                                       				<a href="http://localhost/products/see/<?=$cat3->getId();?>/1"><?=$cat3->getName();?></a>
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
							<h4><a class="accordion-trigger" data-toggle="collapse" href="../../../#divone">Color</a></h4>
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
							<h4><a class="accordion-trigger" data-toggle="collapse" href="../../../#div2">manufacture</a></h4>
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
							<h4><a class="accordion-trigger" data-toggle="collapse" href="../../../#div3">Size</a></h4>
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
					</div>