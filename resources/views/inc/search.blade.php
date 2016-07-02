<div class="search-wrapper">
    <form method="get" role="search" action="/search" class="category-search">
        {{ csrf_field() }}
        <input type="hidden" name="action" value="search" />
        <div class="input-group">
            <input id="search_query" type="text" name="search" class="form-control search-tracker" placeholder="{{ isset($search) && !empty($search) ? $search : 'Search by category, item, location...'}}">
            <div class="input-group-addon">
                <input type="submit" class="btn btn-primary" value="Search">
            </div>
        </div>
    </form>
    <div class="suggested-results">
        <div class="inner-wrapper">
            <div class="search-term">Search for"<strong></strong>"</div>
            <div class="suggestions-wrap">
                <div id="search-left" class="row">
                    <div class="col-sm-7">

                        <div class="row-header">
                            <a href="javascript:void(0);" class="pull-right" title="View More">More</a>
                            <div class="category-label"><span>Men's Fashion</span><span>Accessories</span></div>
                        </div>
                        <ul class="results-found">
                            <li>
                                <a href="javascript:void(0);" title="Link Title Here">
                                    <img src="/assets/images/item03.jpg" width="304" height="304" alt="Image">
                                    Vintage Carties Rotonde de Cartier W1556220
                                    <span class="price">$99,999 USD</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" title="Link Title Here">
                                    <img src="/assets/images/item04.jpg" width="304" height="304" alt="Image">
                                    Vintage Carties Rotonde de Cartier W1556220
                                    <span class="price">$99,999 USD</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" title="Link Title Here">
                                    <img src="/assets/images/item05.jpg" width="304" height="304" alt="Image">
                                    Vintage Carties Rotonde de Cartier W1556220
                                    <span class="price">$99,999 USD</span>
                                </a>
                            </li>
                        </ul>

                        <div class="row-header">
                            <a href="javascript:void(0);" class="pull-right" title="View More">More</a>
                            <div class="category-label"><span>Women's Fashion</span><span>Accessories</span></div>
                        </div>
                        <ul class="results-found">
                            <li>
                                <a href="javascript:void(0);" title="Link Title Here">
                                    <img src="/assets/images/item06.jpg" width="304" height="304" alt="Image">
                                    Vintage Carties Rotonde de Cartier W1556220
                                    <span class="price">$99,999 USD</span>
                                </a>
                            </li>
                        </ul>

                        <div class="row-header">
                            <a href="javascript:void(0);" class="pull-right" title="View More">More</a>
                            <div class="category-label"><span>Jewellery &amp; Watches</span><span>Accessories</span></div>
                        </div>
                        <ul class="results-found">
                            <li>
                                <a href="javascript:void(0);" title="Link Title Here">
                                    <img src="/assets/images/item-03.jpg" width="304" height="304" alt="Image">
                                    Vintage Carties Rotonde de Cartier W1556220
                                    <span class="price">$99,999 USD</span>
                                </a>
                            </li>
                        </ul>

                    </div>
                    <div class="col-sm-5 hidden-xs">

                        <div class="row-header">
                            <a href="javascript:void(0);" class="pull-right" title="View More">More</a>
                            <div class="category-label"><span>Recomended Sellers</span></div>
                        </div>
                        <ul class="results-found recommended">
                            <li>
                                <a href="javascript:void(0);" title="Link Title Here">
                                <img src="/assets/images/item03.jpg" width="304" height="304" alt="Image">
                                Quantum Computer Services Company Ltd.
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" title="Link Title Here">
                                <img src="/assets/images/item04.jpg" width="304" height="304" alt="Image">
                                Research in Motion Technologies, Australia.
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" title="Link Title Here">
                                <img src="/assets/images/item05.jpg" width="304" height="304" alt="Image">
                                Starbucks Coffee, Tea and Spice, Canada.
                                </a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
