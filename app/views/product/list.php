<!-- START PAGE-CONTENT -->
<section class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="page-menu">
                    <li><a href="index.html">Home</a></li>
                    <li class="active"><a href="#">Special Offers</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <?php require_once 'app/views/sidebar.php'; ?>
            <div class="col-md-9">
                <!-- START PRODUCT-BANNER -->
                <div class="product-banner">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="banner">
                                <a href="#"><img src="img/banner/12.jpg" alt="Product Banner"></a>
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
                                    <h3 class="title-group-3 gfont-1">cameras & photography</h3>
                                </div>
                            </div>
                            <div class="product-filter">
                                <ul role="tablist">
                                    <li role="presentation" class="list active">
                                        <a href="#display-1-1" role="tab" data-toggle="tab"></a>
                                    </li>
                                    <li role="presentation" class="grid ">
                                        <a href="#display-1-2" role="tab" data-toggle="tab"></a>
                                    </li>
                                </ul>
                                <div class="sort">
                                    <label>Sort By:</label>
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
                                    <label>Show:</label>
                                    <select>
                                        <option value="#">8</option>
                                        <option value="#">16)</option>
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
                                    <!-- Product -->
                                    <div role="tabpanel" class="tab-pane fade in active" id="display-1-1">
                                        <div class="row">
                                            <div class="listview">
                                                <?php foreach ($data['products'] as $product): ?>
                                                    <!-- Start Single-Product -->
                                                    <div class="single-product">
                                                        <div class="col-md-3 col-sm-4 col-xs-12">
                                                            <div class="label_new">
                                                                <span class="new">new</span>
                                                            </div>
                                                            <div class="sale-off">
                                                                <span class="sale-percent">-55%</span>
                                                            </div>
                                                            <div class="product-img">
                                                                <a href="#">
                                                                    <img class="primary-img"
                                                                         src="http://localhost/app/images/<?= $product->getImages(); ?>"
                                                                         alt="Product">
                                                                    <img class="secondary-img"
                                                                         src="img/product/mediam/10bg.jpg"
                                                                         alt="Product">
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9 col-sm-8 col-xs-12">
                                                            <div class="product-description">
                                                                <h5>
                                                                    <a href="http://localhost/product/details/<?= $product->getId(); ?>"><?= $product->getName(); ?></a>
                                                                </h5>
                                                                <div class="price-box">
                                                                    <span class="price"><?= $product->getPrice(); ?></span>
                                                                    <!--                                                                <span class="old-price">$110.00</span>-->
                                                                </div>
                                                                <span class="rating">
																		<i class="fa fa-star"></i>
																		<i class="fa fa-star"></i>
																		<i class="fa fa-star"></i>
																		<i class="fa fa-star"></i>
																		<i class="fa fa-star-o"></i>
																	</span>
                                                                <p class="description"><?= mb_strimwidth($product->getdescription(), 0, 200, "..."); ?></p>
                                                                <div class="product-action">
                                                                    <div class="button-group">
                                                                        <div class="product-button">
                                                                            <button><i class="fa fa-shopping-cart"></i>
                                                                                Add
                                                                                to Cart
                                                                            </button>
                                                                        </div>
                                                                        <div class="product-button-2">
                                                                            <a href="#" data-toggle="tooltip"
                                                                               title="Wishlist"><i
                                                                                        class="fa fa-heart-o"></i></a>
                                                                            <a href="#" data-toggle="tooltip"
                                                                               title="Compare"><i
                                                                                        class="fa fa-signal"></i></a>
                                                                            <a href="#" class="modal-view"
                                                                               data-toggle="modal"
                                                                               data-target="#productModal"
                                                                               title="Quickview"><i
                                                                                        class="fa fa-search-plus"></i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Single-Product -->
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                        <!-- Start Pagination Area -->
                                        <div class="pagination-area">
                                            <div class="row">
                                                <div class="col-xs-5">
                                                    <div class="pagination">
                                                        <ul>
                                                            <li class="active"><a href="#">1</a></li>
                                                            <li><a href="#">2</a></li>
                                                            <li><a href="#">></a></li>
                                                            <li><a href="#">>|</a></li>
                                                        </ul>
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
                                    <!-- End Product -->
                                    <!-- Start Product-->
                                    <div role="tabpanel" class="tab-pane fade" id="display-1-2">
                                        <div class="row">
                                            <!-- Start Single-Product -->
                                            <div class="col-md-3 col-sm-4 col-xs-12">
                                                <div class="single-product">
                                                    <div class="label_new">
                                                        <span class="new">new</span>
                                                    </div>
                                                    <div class="sale-off">
                                                        <span class="sale-percent">-55%</span>
                                                    </div>
                                                    <div class="product-img">
                                                        <a href="#">
                                                            <img class="primary-img" src="img/product/mediam/12.jpg"
                                                                 alt="Product">
                                                            <img class="secondary-img" src="img/product/mediam/12bg.jpg"
                                                                 alt="Product">
                                                        </a>
                                                    </div>
                                                    <div class="product-description">
                                                        <h5><a href="#">Trid Palm</a></h5>
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
                                                    <div class="product-action">
                                                        <div class="button-group">
                                                            <div class="product-button">
                                                                <button><i class="fa fa-shopping-cart"></i> Add to Cart
                                                                </button>
                                                            </div>
                                                            <div class="product-button-2">
                                                                <a href="#" data-toggle="tooltip" title="Wishlist"><i
                                                                            class="fa fa-heart-o"></i></a>
                                                                <a href="#" data-toggle="tooltip" title="Compare"><i
                                                                            class="fa fa-signal"></i></a>
                                                                <a href="#" class="modal-view" data-toggle="modal"
                                                                   data-target="#productModal"><i
                                                                            class="fa fa-search-plus"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single-Product -->
                                            <!-- Start Single-Product -->
                                            <div class="col-md-3 col-sm-4 col-xs-12">
                                                <div class="single-product">
                                                    <div class="label_new">
                                                        <span class="new">new</span>
                                                    </div>
                                                    <div class="product-img">
                                                        <a href="#">
                                                            <img class="primary-img" src="img/product/mediam/12bg.jpg"
                                                                 alt="Product">
                                                            <img class="secondary-img" src="img/product/mediam/12.jpg"
                                                                 alt="Product">
                                                        </a>
                                                    </div>
                                                    <div class="product-description">
                                                        <h5><a href="#">Established Fact</a></h5>
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
                                                        <div class="product-action">
                                                            <div class="button-group">
                                                                <div class="product-button">
                                                                    <button><i class="fa fa-shopping-cart"></i> Add to
                                                                        Cart
                                                                    </button>
                                                                </div>
                                                                <div class="product-button-2">
                                                                    <a href="#" data-toggle="tooltip"
                                                                       title="Wishlist"><i
                                                                                class="fa fa-heart-o"></i></a>
                                                                    <a href="#" data-toggle="tooltip" title="Compare"><i
                                                                                class="fa fa-signal"></i></a>
                                                                    <a href="#" class="modal-view" data-toggle="modal"
                                                                       data-target="#productModal" title="Quickview"><i
                                                                                class="fa fa-search-plus"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single-Product -->
                                            <!-- Start Single-Product -->
                                            <div class="col-md-3 col-sm-4 col-xs-12">
                                                <div class="single-product">
                                                    <div class="product-img">
                                                        <a href="#">
                                                            <img class="primary-img" src="img/product/mediam/2.jpg"
                                                                 alt="Product">
                                                            <img class="secondary-img" src="img/product/mediam/2bg.jpg"
                                                                 alt="Product">
                                                        </a>
                                                    </div>
                                                    <div class="product-description">
                                                        <h5><a href="#">Various Versions</a></h5>
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
                                                        <div class="product-action">
                                                            <div class="button-group">
                                                                <div class="product-button">
                                                                    <button><i class="fa fa-shopping-cart"></i> Add to
                                                                        Cart
                                                                    </button>
                                                                </div>
                                                                <div class="product-button-2">
                                                                    <a href="#" data-toggle="tooltip"
                                                                       title="Wishlist"><i
                                                                                class="fa fa-heart-o"></i></a>
                                                                    <a href="#" data-toggle="tooltip" title="Compare"><i
                                                                                class="fa fa-signal"></i></a>
                                                                    <a href="#" class="modal-view" data-toggle="modal"
                                                                       data-target="#productModal" title="Quickview"><i
                                                                                class="fa fa-search-plus"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single-Product -->
                                            <!-- Start Single-Product -->
                                            <div class="col-md-3 col-sm-4 col-xs-12">
                                                <div class="single-product">
                                                    <div class="product-img">
                                                        <a href="#">
                                                            <img class="primary-img" src="img/product/mediam/2bg.jpg"
                                                                 alt="Product">
                                                            <img class="secondary-img" src="img/product/mediam/2.jpg"
                                                                 alt="Product">
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
                                                        <div class="product-action">
                                                            <div class="button-group">
                                                                <div class="product-button">
                                                                    <button><i class="fa fa-shopping-cart"></i> Add to
                                                                        Cart
                                                                    </button>
                                                                </div>
                                                                <div class="product-button-2">
                                                                    <a href="#" data-toggle="tooltip"
                                                                       title="Wishlist"><i
                                                                                class="fa fa-heart-o"></i></a>
                                                                    <a href="#" data-toggle="tooltip" title="Compare"><i
                                                                                class="fa fa-signal"></i></a>
                                                                    <a href="#" class="modal-view" data-toggle="modal"
                                                                       data-target="#productModal" title="Quickview"><i
                                                                                class="fa fa-search-plus"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single-Product -->
                                            <!-- Start Single-Product -->
                                            <div class="col-md-3 col-sm-4 col-xs-12">
                                                <div class="single-product">
                                                    <div class="sale-off">
                                                        <span class="sale-percent">-20%</span>
                                                    </div>
                                                    <div class="product-img">
                                                        <a href="#">
                                                            <img class="primary-img" src="img/product/mediam/5.jpg"
                                                                 alt="Product">
                                                            <img class="secondary-img" src="img/product/mediam/3bg.jpg"
                                                                 alt="Product">
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
                                                        <div class="product-action">
                                                            <div class="button-group">
                                                                <div class="product-button">
                                                                    <button><i class="fa fa-shopping-cart"></i> Add to
                                                                        Cart
                                                                    </button>
                                                                </div>
                                                                <div class="product-button-2">
                                                                    <a href="#" data-toggle="tooltip"
                                                                       title="Wishlist"><i
                                                                                class="fa fa-heart-o"></i></a>
                                                                    <a href="#" data-toggle="tooltip" title="Compare"><i
                                                                                class="fa fa-signal"></i></a>
                                                                    <a href="#" class="modal-view" data-toggle="modal"
                                                                       data-target="#productModal" title="Quickview"><i
                                                                                class="fa fa-search-plus"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single-Product -->
                                            <!-- Start Single-Product -->
                                            <div class="col-md-3 col-sm-4 col-xs-12">
                                                <div class="single-product">
                                                    <div class="sale-off">
                                                        <span class="sale-percent">-25%</span>
                                                    </div>
                                                    <div class="product-img">
                                                        <a href="#">
                                                            <img class="primary-img" src="img/product/mediam/6.jpg"
                                                                 alt="Product">
                                                            <img class="secondary-img" src="img/product/mediam/4bg.jpg"
                                                                 alt="Product">
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
                                                        <div class="product-action">
                                                            <div class="button-group">
                                                                <div class="product-button">
                                                                    <button><i class="fa fa-shopping-cart"></i> Add to
                                                                        Cart
                                                                    </button>
                                                                </div>
                                                                <div class="product-button-2">
                                                                    <a href="#" data-toggle="tooltip"
                                                                       title="Wishlist"><i
                                                                                class="fa fa-heart-o"></i></a>
                                                                    <a href="#" data-toggle="tooltip" title="Compare"><i
                                                                                class="fa fa-signal"></i></a>
                                                                    <a href="#" class="modal-view" data-toggle="modal"
                                                                       data-target="#productModal" title="Quickview"><i
                                                                                class="fa fa-search-plus"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single-Product -->
                                            <!-- Start Single-Product -->
                                            <div class="col-md-3 col-sm-4 col-xs-12">
                                                <div class="single-product">
                                                    <div class="sale-off">
                                                        <span class="sale-percent">-25%</span>
                                                    </div>
                                                    <div class="product-img">
                                                        <a href="#">
                                                            <img class="primary-img" src="img/product/mediam/5.jpg"
                                                                 alt="Product">
                                                            <img class="secondary-img" src="img/product/mediam/4bg.jpg"
                                                                 alt="Product">
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
                                                        <div class="product-action">
                                                            <div class="button-group">
                                                                <div class="product-button">
                                                                    <button><i class="fa fa-shopping-cart"></i> Add to
                                                                        Cart
                                                                    </button>
                                                                </div>
                                                                <div class="product-button-2">
                                                                    <a href="#" data-toggle="tooltip"
                                                                       title="Wishlist"><i
                                                                                class="fa fa-heart-o"></i></a>
                                                                    <a href="#" data-toggle="tooltip" title="Compare"><i
                                                                                class="fa fa-signal"></i></a>
                                                                    <a href="#" class="modal-view" data-toggle="modal"
                                                                       data-target="#productModal" title="Quickview"><i
                                                                                class="fa fa-search-plus"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single-Product -->
                                            <!-- Start Single-Product -->
                                            <div class="col-md-3 col-sm-4 col-xs-12">
                                                <div class="single-product">
                                                    <div class="label_new">
                                                        <span class="new">new</span>
                                                    </div>
                                                    <div class="sale-off">
                                                        <span class="sale-percent">-55%</span>
                                                    </div>
                                                    <div class="product-img">
                                                        <a href="#">
                                                            <img class="primary-img" src="img/product/mediam/12.jpg"
                                                                 alt="Product">
                                                            <img class="secondary-img" src="img/product/mediam/12bg.jpg"
                                                                 alt="Product">
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
                                                    <div class="product-action">
                                                        <div class="button-group">
                                                            <div class="product-button">
                                                                <button><i class="fa fa-shopping-cart"></i> Add to Cart
                                                                </button>
                                                            </div>
                                                            <div class="product-button-2">
                                                                <a href="#" data-toggle="tooltip" title="Wishlist"><i
                                                                            class="fa fa-heart-o"></i></a>
                                                                <a href="#" data-toggle="tooltip" title="Compare"><i
                                                                            class="fa fa-signal"></i></a>
                                                                <a href="#" class="modal-view" data-toggle="modal"
                                                                   data-target="#productModal"><i
                                                                            class="fa fa-search-plus"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single-Product -->
                                            <!-- Start Single-Product -->
                                            <div class="col-md-3 col-sm-4 col-xs-12">
                                                <div class="single-product">
                                                    <div class="label_new">
                                                        <span class="new">new</span>
                                                    </div>
                                                    <div class="product-img">
                                                        <a href="#">
                                                            <img class="primary-img" src="img/product/mediam/12bg.jpg"
                                                                 alt="Product">
                                                            <img class="secondary-img" src="img/product/mediam/12.jpg"
                                                                 alt="Product">
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
                                                        <div class="product-action">
                                                            <div class="button-group">
                                                                <div class="product-button">
                                                                    <button><i class="fa fa-shopping-cart"></i> Add to
                                                                        Cart
                                                                    </button>
                                                                </div>
                                                                <div class="product-button-2">
                                                                    <a href="#" data-toggle="tooltip"
                                                                       title="Wishlist"><i
                                                                                class="fa fa-heart-o"></i></a>
                                                                    <a href="#" data-toggle="tooltip" title="Compare"><i
                                                                                class="fa fa-signal"></i></a>
                                                                    <a href="#" class="modal-view" data-toggle="modal"
                                                                       data-target="#productModal" title="Quickview"><i
                                                                                class="fa fa-search-plus"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single-Product -->
                                            <!-- Start Single-Product -->
                                            <div class="col-md-3 col-sm-4 col-xs-12">
                                                <div class="single-product">
                                                    <div class="product-img">
                                                        <a href="#">
                                                            <img class="primary-img" src="img/product/mediam/2.jpg"
                                                                 alt="Product">
                                                            <img class="secondary-img" src="img/product/mediam/2bg.jpg"
                                                                 alt="Product">
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
                                                        <div class="product-action">
                                                            <div class="button-group">
                                                                <div class="product-button">
                                                                    <button><i class="fa fa-shopping-cart"></i> Add to
                                                                        Cart
                                                                    </button>
                                                                </div>
                                                                <div class="product-button-2">
                                                                    <a href="#" data-toggle="tooltip"
                                                                       title="Wishlist"><i
                                                                                class="fa fa-heart-o"></i></a>
                                                                    <a href="#" data-toggle="tooltip" title="Compare"><i
                                                                                class="fa fa-signal"></i></a>
                                                                    <a href="#" class="modal-view" data-toggle="modal"
                                                                       data-target="#productModal" title="Quickview"><i
                                                                                class="fa fa-search-plus"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single-Product -->
                                            <!-- Start Single-Product -->
                                            <div class="col-md-3 col-sm-4 col-xs-12">
                                                <div class="single-product">
                                                    <div class="product-img">
                                                        <a href="#">
                                                            <img class="primary-img" src="img/product/mediam/2bg.jpg"
                                                                 alt="Product">
                                                            <img class="secondary-img" src="img/product/mediam/2.jpg"
                                                                 alt="Product">
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
                                                        <div class="product-action">
                                                            <div class="button-group">
                                                                <div class="product-button">
                                                                    <button><i class="fa fa-shopping-cart"></i> Add to
                                                                        Cart
                                                                    </button>
                                                                </div>
                                                                <div class="product-button-2">
                                                                    <a href="#" data-toggle="tooltip"
                                                                       title="Wishlist"><i
                                                                                class="fa fa-heart-o"></i></a>
                                                                    <a href="#" data-toggle="tooltip" title="Compare"><i
                                                                                class="fa fa-signal"></i></a>
                                                                    <a href="#" class="modal-view" data-toggle="modal"
                                                                       data-target="#productModal" title="Quickview"><i
                                                                                class="fa fa-search-plus"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single-Product -->
                                            <!-- Start Single-Product -->
                                            <div class="col-md-3 col-sm-4 col-xs-12">
                                                <div class="single-product">
                                                    <div class="sale-off">
                                                        <span class="sale-percent">-20%</span>
                                                    </div>
                                                    <div class="product-img">
                                                        <a href="#">
                                                            <img class="primary-img" src="img/product/mediam/5.jpg"
                                                                 alt="Product">
                                                            <img class="secondary-img" src="img/product/mediam/3bg.jpg"
                                                                 alt="Product">
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
                                                        <div class="product-action">
                                                            <div class="button-group">
                                                                <div class="product-button">
                                                                    <button><i class="fa fa-shopping-cart"></i> Add to
                                                                        Cart
                                                                    </button>
                                                                </div>
                                                                <div class="product-button-2">
                                                                    <a href="#" data-toggle="tooltip"
                                                                       title="Wishlist"><i
                                                                                class="fa fa-heart-o"></i></a>
                                                                    <a href="#" data-toggle="tooltip" title="Compare"><i
                                                                                class="fa fa-signal"></i></a>
                                                                    <a href="#" class="modal-view" data-toggle="modal"
                                                                       data-target="#productModal" title="Quickview"><i
                                                                                class="fa fa-search-plus"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single-Product -->
                                            <!-- Start Single-Product -->
                                            <div class="col-md-3 col-sm-4 col-xs-12">
                                                <div class="single-product">
                                                    <div class="sale-off">
                                                        <span class="sale-percent">-25%</span>
                                                    </div>
                                                    <div class="product-img">
                                                        <a href="#">
                                                            <img class="primary-img" src="img/product/mediam/10bg.jpg"
                                                                 alt="Product">
                                                            <img class="secondary-img" src="img/product/mediam/13.jpg"
                                                                 alt="Product">
                                                        </a>
                                                    </div>
                                                    <div class="product-description">
                                                        <h5><a href="#">Various Versions</a></h5>
                                                        <div class="price-box">
                                                            <span class="price">$92.00</span>
                                                            <span class="old-price">$110.00</span>
                                                        </div>
                                                        <span class="rating">
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star-o"></i>
																</span>
                                                        <div class="product-action">
                                                            <div class="button-group">
                                                                <div class="product-button">
                                                                    <button><i class="fa fa-shopping-cart"></i> Add to
                                                                        Cart
                                                                    </button>
                                                                </div>
                                                                <div class="product-button-2">
                                                                    <a href="#" data-toggle="tooltip"
                                                                       title="Wishlist"><i
                                                                                class="fa fa-heart-o"></i></a>
                                                                    <a href="#" data-toggle="tooltip" title="Compare"><i
                                                                                class="fa fa-signal"></i></a>
                                                                    <a href="#" class="modal-view" data-toggle="modal"
                                                                       data-target="#productModal" title="Quickview"><i
                                                                                class="fa fa-search-plus"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single-Product -->
                                            <!-- Start Single-Product -->
                                            <div class="col-md-3 col-sm-4 col-xs-12">
                                                <div class="single-product">
                                                    <div class="sale-off">
                                                        <span class="sale-percent">-25%</span>
                                                    </div>
                                                    <div class="product-img">
                                                        <a href="#">
                                                            <img class="primary-img" src="img/product/mediam/13.jpg"
                                                                 alt="Product">
                                                            <img class="secondary-img" src="img/product/mediam/10bg.jpg"
                                                                 alt="Product">
                                                        </a>
                                                    </div>
                                                    <div class="product-description">
                                                        <h5><a href="#">Established Fact</a></h5>
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
                                                        <div class="product-action">
                                                            <div class="button-group">
                                                                <div class="product-button">
                                                                    <button><i class="fa fa-shopping-cart"></i> Add to
                                                                        Cart
                                                                    </button>
                                                                </div>
                                                                <div class="product-button-2">
                                                                    <a href="#" data-toggle="tooltip"
                                                                       title="Wishlist"><i
                                                                                class="fa fa-heart-o"></i></a>
                                                                    <a href="#" data-toggle="tooltip" title="Compare"><i
                                                                                class="fa fa-signal"></i></a>
                                                                    <a href="#" class="modal-view" data-toggle="modal"
                                                                       data-target="#productModal" title="Quickview"><i
                                                                                class="fa fa-search-plus"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single-Product -->
                                            <!-- Start Single-Product -->
                                            <div class="col-md-3 col-sm-4 col-xs-12">
                                                <div class="single-product">
                                                    <div class="sale-off">
                                                        <span class="sale-percent">-25%</span>
                                                    </div>
                                                    <div class="product-img">
                                                        <a href="#">
                                                            <img class="primary-img" src="img/product/mediam/11.jpg"
                                                                 alt="Product">
                                                            <img class="secondary-img" src="img/product/mediam/4bg.jpg"
                                                                 alt="Product">
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
                                                        <div class="product-action">
                                                            <div class="button-group">
                                                                <div class="product-button">
                                                                    <button><i class="fa fa-shopping-cart"></i> Add to
                                                                        Cart
                                                                    </button>
                                                                </div>
                                                                <div class="product-button-2">
                                                                    <a href="#" data-toggle="tooltip"
                                                                       title="Wishlist"><i
                                                                                class="fa fa-heart-o"></i></a>
                                                                    <a href="#" data-toggle="tooltip" title="Compare"><i
                                                                                class="fa fa-signal"></i></a>
                                                                    <a href="#" class="modal-view" data-toggle="modal"
                                                                       data-target="#productModal" title="Quickview"><i
                                                                                class="fa fa-search-plus"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single-Product -->
                                            <!-- Start Single-Product -->
                                            <div class="col-md-3 col-sm-4 col-xs-12">
                                                <div class="single-product">
                                                    <div class="sale-off">
                                                        <span class="sale-percent">-25%</span>
                                                    </div>
                                                    <div class="product-img">
                                                        <a href="#">
                                                            <img class="primary-img" src="img/product/mediam/10.jpg"
                                                                 alt="Product">
                                                            <img class="secondary-img" src="img/product/mediam/10bg.jpg"
                                                                 alt="Product">
                                                        </a>
                                                    </div>
                                                    <div class="product-description">
                                                        <h5><a href="#">Established Fact</a></h5>
                                                        <div class="price-box">
                                                            <span class="price">$92.00</span>
                                                            <span class="old-price">$110.00</span>
                                                        </div>
                                                        <span class="rating">
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star-o"></i>
																</span>
                                                        <div class="product-action">
                                                            <div class="button-group">
                                                                <div class="product-button">
                                                                    <button><i class="fa fa-shopping-cart"></i> Add to
                                                                        Cart
                                                                    </button>
                                                                </div>
                                                                <div class="product-button-2">
                                                                    <a href="#" data-toggle="tooltip"
                                                                       title="Wishlist"><i
                                                                                class="fa fa-heart-o"></i></a>
                                                                    <a href="#" data-toggle="tooltip" title="Compare"><i
                                                                                class="fa fa-signal"></i></a>
                                                                    <a href="#" class="modal-view" data-toggle="modal"
                                                                       data-target="#productModal" title="Quickview"><i
                                                                                class="fa fa-search-plus"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single-Product -->
                                        </div>
                                        <!-- Start Pagination Area -->
                                        <div class="pagination-area">
                                            <div class="row">
                                                <div class="col-xs-5">
                                                    <div class="pagination">
                                                        <ul>
                                                            <li class="active"><a href="#">1</a></li>
                                                            <li><a href="#">2</a></li>
                                                            <li><a href="#">></a></li>
                                                            <li><a href="#">>|</a></li>
                                                        </ul>
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
    <div class="brand-logo-area carosel-navigation">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="area-title">
                        <h3 class="title-group border-red gfont-1">Brand Logo</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="active-brand-logo">
                    <div class="col-md-2">
                        <div class="single-brand-logo">
                            <a href="#"><img src="img/brand/1.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="single-brand-logo">
                            <a href="#"><img src="img/brand/2.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="single-brand-logo">
                            <a href="#"><img src="img/brand/3.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="single-brand-logo">
                            <a href="#"><img src="img/brand/4.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="single-brand-logo">
                            <a href="#"><img src="img/brand/5.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="single-brand-logo">
                            <a href="#"><img src="img/brand/6.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="single-brand-logo">
                            <a href="#"><img src="img/brand/1.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="single-brand-logo">
                            <a href="#"><img src="img/brand/2.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="single-brand-logo">
                            <a href="#"><img src="img/brand/3.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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