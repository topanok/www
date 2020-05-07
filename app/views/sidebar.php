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
                    <?php foreach ($data['categories'] as $category): ?>
                        <li class="arrow-plus">
                            <a href="#"><?=$category->getName()?></a>
                            <!--  MEGA MENU START -->
                            <div class="cat-left-drop-menu">
                                <div class="cat-left-drop-menu-left">
                                    <a class="menu-item-heading" href="#">Handbags</a>
                                    <ul>
                                        <li><a href="#">Blouses And Shirts</a></li>
                                        <li><a href="#">Clutches</a></li>
                                        <li><a href="#">Cross Body</a></li>
                                        <li><a href="#">Satchels</a></li>
                                        <li><a href="#">Sholuder</a></li>
                                        <li><a href="#">Toter</a></li>
                                    </ul>
                                </div>
                                <div class="cat-left-drop-menu-left">
                                    <a class="menu-item-heading" href="#">Tops</a>
                                    <ul>
                                        <li><a href="#">Evening</a></li>
                                        <li><a href="#">Long Sleeved</a></li>
                                        <li><a href="#">Short Sleeved</a></li>
                                        <li><a href="#">Sleeveless</a></li>
                                        <li><a href="#">T-Shirts</a></li>
                                        <li><a href="#">Tanks And Camis</a></li>
                                    </ul>
                                </div>
                                <div class="cat-left-drop-menu-left">
                                    <a class="menu-item-heading" href="#">Dresses</a>
                                    <ul>
                                        <li><a href="#">Belts</a></li>
                                        <li><a href="#">Cocktail</a></li>
                                        <li><a href="#">Day</a></li>
                                        <li><a href="#">Evening</a></li>
                                        <li><a href="#">Sundresses</a></li>
                                        <li><a href="#">Sweater</a></li>
                                    </ul>
                                </div>
                                <div class="cat-left-drop-menu-left">
                                    <a class="menu-item-heading" href="#">Accessories</a>
                                    <ul>
                                        <li><a href="#">Bras</a></li>
                                        <li><a href="#">Hair Accessories</a></li>
                                        <li><a href="#">Hats And Gloves</a></li>
                                        <li><a href="#">Lifestyle</a></li>
                                        <li><a href="#">Scarves</a></li>
                                        <li><a href="#">Small Leathers</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- MEGA MENU END -->
                        </li>
                    <?php endforeach; ?>
                    <!-- Single menu end -->
                    <!-- MENU ACCORDION END -->
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
                    <input type="text" id="amount" name="price" placeholder="Add Your Price"/>
                    <input type="submit" value="Filter"/>
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
                    <li><a href="#">Ermenegildo Zegna (2)</a></li>
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
</div>
