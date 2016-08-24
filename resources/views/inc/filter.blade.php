<?php
$locs = func::build_countries();
$cats = func::categories('all');
$subs = func::categories('all');
?>
<style>
    .irs-bars {
    position: relative;
    top: 25px;
    width: 100%;
    display: block;
}
</style>
<div class="filter-block">
    <a role="button" data-toggle="collapse" href="#filter-drop" aria-expanded="false" class="btn btn-primary">Filter</a>
    <div id="filter-drop" class="collapse">
        <form action="{{$_SERVER['REQUEST_URI']}}" method="get" class="filter-form">
            {{ csrf_field() }}
            <input type="hidden" id="filters" name="filters" value="on" />
            @if(isset($_GET['search']))
                <input type="hidden" id="search" name="search" value="{{ $_GET['search'] }}" />
            @endif
            <div class="form-row">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="select-hold">
                            <strong class="form-title">Item Location</strong>
                            <select id="location" name="location">
                                <option>Location</option>
                                @if(!empty($locs))
                                    @foreach($locs as $loc)
                                        <option value="{{$loc['val']}}"{{ isset($filters['location']) && !empty($filters['location']) ? func::selected($filters['location'], $loc['val']) : '' }}>{{$loc['label']}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="select-hold">
                            <strong class="form-title">Category</strong>
                            <select id="category" name="category">
                                <option>Category</option>
                                <option value="real-estates">Real Estates</option>
                                <option value="jewellery-watches">Watches & Jewelry</option>
                                <option value="motors">Motors</option>
                                <option value="handbags-accessories">Handbags & Accessories</option>
                                <option value="experiences">Experiences</option>
                                <option value="collectibles-furnitures">Collectibles & Furnitures</option>
                                <option value="yachts">Yachts</option>
                                <option value="aircrafts">Aircrafts</option>
                                <option value="art-antiques">Art & Antiques</option>
                                <option value="fine-wines-spirits">Fine Wines & Spirits</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="select-hold">
                            <strong class="form-title">Sub category</strong>
                            <select id="sub_category" name="sub_category">
                                <option>Select a Category first</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="select-hold">
                            <strong class="form-title">Condition</strong>
                            <select id="condition" >
                                <option>Condition</option>
                                <option value="NEW">New</option>
                                <option value="PRE-OWNED">Pre-Owned</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row add">
                <div class="row">
                    <div class="col-sm-4">
                        <strong class="form-title">Price Range</strong>
                        <label class="checkbox flat">
                            <input id="use_price" name="use_price" type="checkbox" checked="checked">
                            <span class="check-input"></span>
                            <span class="check-text">Include price of request</span>
                        </label>
                    </div>
                    <div class="col-sm-8 ">
                        <div class="ion-range">
                            <span class="irs-bars"></span>
                            <input type="text" id="range" value="{{ isset($filters['range']) && !empty($filters['range']) ? $filters['range'] : '' }}" name="range" />
                        </div>
                        <br/>
                        <div class="inputrange row">
                            <div class="col-xs-12">
                                <div class="form-inline">
                                    <div class="input-group" style="display:inline-block;">
                                        <input type="number" class="form-control" style="color:#555;" id="startrange" placeholder="$ 1">                
                                    </div>
                                    <strong>-</strong>
                                    <div class="input-group" style="display:inline-block;">
                                        <input type="number" class=" form-control" style="color:#555;" id="endrange" placeholder="$ 1,000,000,000">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <strong class="form-title">Sort By</strong>
                <ul class="radio-list">
                    <li>
                        <label class="radio">
                            <input type="radio" name="sort-radio" value="latest"{{ (isset($filters['sort']) && !empty($filters['sort'])) && ($filters['sort'] == 'latest') ? ' checked="checked"' : '' }} />
                            <span class="text">Latest</span>
                        </label>
                    </li>
                    <li>
                        <label class="radio">
                            <input type="radio" name="sort-radio" value="priceDown"{{ (isset($filters['sort']) && !empty($filters['sort'])) && ($filters['sort'] == 'priceDown') ? ' checked="checked"' : '' }} />
                            <span class="text">Ascending Price</span>
                        </label>
                    </li>
                    <li>
                        <label class="radio">
                            <input type="radio" name="sort-radio" value="priceUp"{{ (isset($filters['sort']) && !empty($filters['sort'])) && ($filters['sort'] == 'priceUp') ? ' checked="checked"' : '' }} />
                            <span class="text">Descending Price</span>
                        </label>
                    </li>
                </ul>
            </div>
            <div class="form-row button-wrap">
                <a data-toggle="collapse" href="#filter-drop" class="btn cancel">Cancel</a>
                <button type="submit" class="btn btn-primary">Apply Filters</button>
            </div>
        </form>
    </div>
</div>
