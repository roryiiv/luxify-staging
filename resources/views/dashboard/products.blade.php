@extends('layouts.dashboard')

@section('head')
    <!-- PACE-->
    <link rel="stylesheet" type="text/css" href="/db/css/pace-theme-flash.css">
    <script type="text/javascript" src="/db/js/pace.min.js"></script>
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="/db/css/bootstrap.min.css">
    <!-- Fonts-->
    <link rel="stylesheet" type="text/css" href="/db/css/themify-icons.css">
    <!-- Malihu Scrollbar-->
    <link rel="stylesheet" type="text/css" href="/db/css/jquery.mCustomScrollbar.min.css">
    <!-- Animo.js-->
    <link rel="stylesheet" type="text/css" href="/db/css/animate-animo.min.css">
    <!-- Flag Icons-->
    <link rel="stylesheet" type="text/css" href="/db/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="/db/css/flag-icon.min.css">
    <!-- Bootstrap Progressbar-->
    <link rel="stylesheet" type="text/css" href="/db/css/bootstrap-progressbar-3.3.4.min.css">
    <!-- Bootstrap Date Range Picker-->
    <link rel="stylesheet" type="text/css" href="/db/css/daterangepicker.css">
    <!-- DataTables-->
    <link rel="stylesheet" type="text/css" href="/db/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/db/css/buttons.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/db/css/colReorder.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/db/css/responsive.bootstrap.min.css">
    <!-- Primary Style-->
    <link rel="stylesheet" type="text/css" href="/db/css/first-layout.css">
    <link rel="stylesheet" type="text/css" href="/db/css/bootstrap-markdown.min.css">
@endsection

@section('content')
    <div class="page-container">
            <div class="page-header clearfix">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="mt-0 mb-5">Product List</h4>
                        <ol class="breadcrumb mb-0">
                            <li><a href="">All your products</a></li>
                        </ol>
                    </div>
                    <div class="col-sm-6" style="display: none;">
                        <div class="btn-group mt-5">
                            <button type="button" class="btn btn-default btn-outline"><i class="flag-icon flag-icon-us mr-5"></i> English</button>
                            <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-default btn-outline dropdown-toggle"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                            <ul class="dropdown-menu dropdown-menu-right animated fadeInDown">
                                <li><a href="product-list.html#"><i class="flag-icon flag-icon-de mr-5"></i> German</a></li>
                                <li><a href="product-list.html#"><i class="flag-icon flag-icon-fr mr-5"></i> French</a></li>
                                <li><a href="product-list.html#"><i class="flag-icon flag-icon-es mr-5"></i> Spanish</a></li>
                                <li><a href="product-list.html#"><i class="flag-icon flag-icon-it mr-5"></i> Italian</a></li>
                                <li><a href="product-list.html#"><i class="flag-icon flag-icon-jp mr-5"></i> Japanese</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-content container-fluid">
                <div class="widget">
                    <div class="widget-heading">
                        <h3 class="widget-title">Product List</h3>
                    </div>
                    <div class="widget-body">
                        <form id="wishlist" name="wishlist" method="get" action="{{ $_SERVER['REQUEST_URI'] }}">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="txtProductName">Product Name</label>
                                        <input id="txtProductName" name="txtProductName" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="txtPrice">Price</label>
                                        <input id="txtPrice" name="txtPrice" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="startDate">Date</label>
                                        <input id="startDate" name="startDate" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="ddlStatus">Status</label>
                                        <select id="ddlStatus" name="status" class="form-control">
                                            <option value="">Choose</option>
                                            <option value="PENDING">Pending</option>
                                            <option value="APPROVED">Approved</option>
                                            <option value="SOLD">Sold</option>
                                            <option value="EXPIRED">Expired</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="category">Category</label>
                                        <select id="category" name="category" class="form-control">
                                        <option value="">Choose</option>
                                            <optgroup label="ESTATES">
                                                <option value="50"{{ isset($_GET['category']) && $_GET['category'] == 50 ? ' selected="selected"' : '' }}>Estates</option>
                                                <option value="69"{{ isset($_GET['category']) && $_GET['category'] == 69 ? ' selected="selected"' : '' }}>Castle/Manor</option>
                                                <option value="16"{{ isset($_GET['category']) && $_GET['category'] == 16 ? ' selected="selected"' : '' }}>Mountain</option>
                                                <option value="52"{{ isset($_GET['category']) && $_GET['category'] == 52 ? ' selected="selected"' : '' }}>Ocean</option>
                                                <option value="72"{{ isset($_GET['category']) && $_GET['category'] == 72 ? ' selected="selected"' : '' }}>Private Estate</option>
                                            </optgroup>
                                            <optgroup label="APARTMENT">
                                                <option value="126"{{ isset($_GET['category']) && $_GET['category'] == 126 ? ' selected="selected"' : '' }}>Apartment</option>
                                                <option value="51"{{ isset($_GET['category']) && $_GET['category'] == 51 ? ' selected="selected"' : '' }}>Loft</option>
                                                <option value="49"{{ isset($_GET['category']) && $_GET['category'] == 49 ? ' selected="selected"' : '' }}>Penthouse</option>
                                            </optgroup>
                                            <optgroup label="HOUSE">
                                                <option value="48"{{ isset($_GET['category']) && $_GET['category'] == 48 ? ' selected="selected"' : '' }}>House</option>
                                            </optgroup>
                                            <optgroup label="LAND">
                                                <option value="53"{{ isset($_GET['category']) && $_GET['category'] == 53 ? ' selected="selected"' : '' }}>Island</option>
                                                <option value="54"{{ isset($_GET['category']) && $_GET['category'] == 54 ? ' selected="selected"' : '' }}>Land</option>
                                            </optgroup>
                                            <optgroup label="OTHERS">
                                                <option value="47"{{ isset($_GET['category']) && $_GET['category'] == 47 ? ' selected="selected"' : '' }}>Holiday Villas</option>
                                                <option value="138"{{ isset($_GET['category']) && $_GET['category'] == 138 ? ' selected="selected"' : '' }}>Countryside</option>
                                                <option value="57"{{ isset($_GET['category']) && $_GET['category'] == 57 ? ' selected="selected"' : '' }}>Golf</option>
                                                <option value="56"{{ isset($_GET['category']) && $_GET['category'] == 56 ? ' selected="selected"' : '' }}>Mountain</option>
                                                <option value="127"{{ isset($_GET['category']) && $_GET['category'] == 127 ? ' selected="selected"' : '' }}>Sea</option>
                                                <option value="15"{{ isset($_GET['category']) && $_GET['category'] == 15 ? ' selected="selected"' : '' }}>Winery</option>
                                            </optgroup>
                                            <optgroup label="ANTIQUE JEWELRY">
                                                <option value="149"{{ isset($_GET['category']) && $_GET['category'] == 149 ? ' selected="selected"' : '' }}>Antique Jewellery</option>
                                            </optgroup>
                                            <optgroup label="JEWELRY">
                                                <option value="10"{{ isset($_GET['category']) && $_GET['category'] == 10 ? ' selected="selected"' : '' }}>Jewellery</option>
                                                <option value="110"{{ isset($_GET['category']) && $_GET['category'] == 110 ? ' selected="selected"' : '' }}>Bracelets</option>
                                                <option value="109"{{ isset($_GET['category']) && $_GET['category'] == 109 ? ' selected="selected"' : '' }}>Brooches</option>
                                                <option value="108"{{ isset($_GET['category']) && $_GET['category'] == 108 ? ' selected="selected"' : '' }}>Earrings</option>
                                                <option value="39"{{ isset($_GET['category']) && $_GET['category'] == 39 ? ' selected="selected"' : '' }}>Gemstones</option>
                                                <option value="107"{{ isset($_GET['category']) && $_GET['category'] == 107 ? ' selected="selected"' : '' }}>Necklaces</option>
                                                <option value="38"{{ isset($_GET['category']) && $_GET['category'] == 38 ? ' selected="selected"' : '' }}>Pendants</option>
                                                <option value="37"{{ isset($_GET['category']) && $_GET['category'] == 37 ? ' selected="selected"' : '' }}>Rings</option>
                                            </optgroup>
                                                <optgroup label="WATCH">
                                                <option value="36"{{ isset($_GET['category']) && $_GET['category'] == 36 ? ' selected="selected"' : '' }}>Watches</option>
                                                <option value="106"{{ isset($_GET['category']) && $_GET['category'] == 106 ? ' selected="selected"' : '' }}>Casual</option>
                                                <option value="105"{{ isset($_GET['category']) && $_GET['category'] == 105 ? ' selected="selected"' : '' }}>Diver</option>
                                                <option value="89"{{ isset($_GET['category']) && $_GET['category'] == 89 ? ' selected="selected"' : '' }}>Dress</option>
                                                <option value="34"{{ isset($_GET['category']) && $_GET['category'] == 34 ? ' selected="selected"' : '' }}>Fashion</option>
                                                <option value="33"{{ isset($_GET['category']) && $_GET['category'] == 33 ? ' selected="selected"' : '' }}>Luxury</option>
                                                <option value="31"{{ isset($_GET['category']) && $_GET['category'] == 31 ? ' selected="selected"' : '' }}>Sport</option>
                                            </optgroup>
                                            <optgroup label="CARS">
                                                <option value="2"{{ isset($_GET['category']) && $_GET['category'] == 2 ? ' selected="selected"' : '' }}>Motor and Yachts</option>
                                                <option value="11"{{ isset($_GET['category']) && $_GET['category'] == 11 ? ' selected="selected"' : '' }}>Cars</option>
                                                <option value="20"{{ isset($_GET['category']) && $_GET['category'] == 20 ? ' selected="selected"' : '' }}>Convertible</option>
                                                <option value="19"{{ isset($_GET['category']) && $_GET['category'] == 19 ? ' selected="selected"' : '' }}>Coupe</option>
                                                <option value="60"{{ isset($_GET['category']) && $_GET['category'] == 60 ? ' selected="selected"' : '' }}>Performance</option>
                                                <option value="55"{{ isset($_GET['category']) && $_GET['category'] == 55 ? ' selected="selected"' : '' }}>Sedan</option>
                                                <option value="18"{{ isset($_GET['category']) && $_GET['category'] == 18 ? ' selected="selected"' : '' }}>SUV</option>
                                            </optgroup>
                                            <optgroup label="CLASSIC">
                                                <option value="66"{{ isset($_GET['category']) && $_GET['category'] == 66 ? ' selected="selected"' : '' }}>Classic</option>
                                            </optgroup>
                                            <optgroup label="MOTORBIKE">
                                                <option value="17"{{ isset($_GET['category']) && $_GET['category'] == 17 ? ' selected="selected"' : '' }}>Motorbike</option>
                                            </optgroup>
                                            <optgroup label="ACCESSORIES MEN">
                                                <option value="92"{{ isset($_GET['category']) && $_GET['category'] == 92 ? ' selected="selected"' : '' }}>Boys</option>
                                                <option value="88"{{ isset($_GET['category']) && $_GET['category'] == 88 ? ' selected="selected"' : '' }}>Clothing</option>
                                            </optgroup>
                                            <optgroup label="ACCESSORIES WOMEN">
                                                <option value="124"{{ isset($_GET['category']) && $_GET['category'] == 124 ? ' selected="selected"' : '' }}>Accessories</option>
                                                <option value="160"{{ isset($_GET['category']) && $_GET['category'] == 160 ? ' selected="selected"' : '' }}>Accessories</option>
                                                <option value="150"{{ isset($_GET['category']) && $_GET['category'] == 150 ? ' selected="selected"' : '' }}>Eye Wear</option>
                                                <option value="120"{{ isset($_GET['category']) && $_GET['category'] == 120 ? ' selected="selected"' : '' }}>Gowns</option>
                                                <option value="119"{{ isset($_GET['category']) && $_GET['category'] == 119 ? ' selected="selected"' : '' }}>Haute Couture</option>
                                                <option value="118"{{ isset($_GET['category']) && $_GET['category'] == 118 ? ' selected="selected"' : '' }}>Knitwear</option>
                                                <option value="117"{{ isset($_GET['category']) && $_GET['category'] == 117 ? ' selected="selected"' : '' }}>Scarves</option>
                                                <option value="161"{{ isset($_GET['category']) && $_GET['category'] == 161 ? ' selected="selected"' : '' }}>Shoes</option>
                                                <option value="159"{{ isset($_GET['category']) && $_GET['category'] == 159 ? ' selected="selected"' : '' }}>Accessories</option>
                                                <option value="116"{{ isset($_GET['category']) && $_GET['category'] == 116 ? ' selected="selected"' : '' }}>Shoes</option>
                                            </optgroup>
                                            <optgroup label="BAGS">
                                                <option value="9"{{ isset($_GET['category']) && $_GET['category'] == 9 ? ' selected="selected"' : '' }}>Bags</option>
                                                <option value="43"{{ isset($_GET['category']) && $_GET['category'] == 43 ? ' selected="selected"' : '' }}>Backpack</option>
                                                <option value="114"{{ isset($_GET['category']) && $_GET['category'] == 114 ? ' selected="selected"' : '' }}>Clutch</option>
                                                <option value="113"{{ isset($_GET['category']) && $_GET['category'] == 113 ? ' selected="selected"' : '' }}>Evening</option>
                                                <option value="42"{{ isset($_GET['category']) && $_GET['category'] == 42 ? ' selected="selected"' : '' }}>Messenger</option>
                                                <option value="41"{{ isset($_GET['category']) && $_GET['category'] == 41 ? ' selected="selected"' : '' }}>Shopper</option>
                                                <option value="112"{{ isset($_GET['category']) && $_GET['category'] == 112 ? ' selected="selected"' : '' }}>Tote</option>
                                                <option value="111"{{ isset($_GET['category']) && $_GET['category'] == 111 ? ' selected="selected"' : '' }}>Travel</option>
                                                <option value="91"{{ isset($_GET['category']) && $_GET['category'] == 91 ? ' selected="selected"' : '' }}>Bags</option>
                                                <option value="137"{{ isset($_GET['category']) && $_GET['category'] == 137 ? ' selected="selected"' : '' }}>Handbag</option>
                                            </optgroup>
                                            <optgroup label="EXPERIENCES">
                                                <option value="3"{{ isset($_GET['category']) && $_GET['category'] == 3 ? ' selected="selected"' : '' }}>Experience</option>
                                                <option value="162"{{ isset($_GET['category']) && $_GET['category'] == 162 ? ' selected="selected"' : '' }}>Experience</option>
                                                <option value="169"{{ isset($_GET['category']) && $_GET['category'] == 169 ? ' selected="selected"' : '' }}>Bespoke Luxury Tour</option>
                                                <option value="165"{{ isset($_GET['category']) && $_GET['category'] == 165 ? ' selected="selected"' : '' }}>Cycle and Bike</option>
                                                <option value="99"{{ isset($_GET['category']) && $_GET['category'] == 99 ? ' selected="selected"' : '' }}>Diving</option>
                                                <option value="97"{{ isset($_GET['category']) && $_GET['category'] == 97 ? ' selected="selected"' : '' }}>Fishing</option>
                                                <option value="167"{{ isset($_GET['category']) && $_GET['category'] == 167 ? ' selected="selected"' : '' }}>Flying</option>
                                                <option value="164"{{ isset($_GET['category']) && $_GET['category'] == 164 ? ' selected="selected"' : '' }}>Food and Wine</option>
                                                <option value="166"{{ isset($_GET['category']) && $_GET['category'] == 166 ? ' selected="selected"' : '' }}>Heliski</option>
                                                <option value="98"{{ isset($_GET['category']) && $_GET['category'] == 98 ? ' selected="selected"' : '' }}>Horse Riding</option>
                                                <option value="95"{{ isset($_GET['category']) && $_GET['category'] == 95 ? ' selected="selected"' : '' }}>Overland and Safari</option>
                                                <option value="96"{{ isset($_GET['category']) && $_GET['category'] == 96 ? ' selected="selected"' : '' }}>Racing</option>
                                                <option value="163"{{ isset($_GET['category']) && $_GET['category'] == 163 ? ' selected="selected"' : '' }}>Sailing</option>
                                                <option value="94"{{ isset($_GET['category']) && $_GET['category'] == 94 ? ' selected="selected"' : '' }}>Trek and Hike</option>
                                            </optgroup>
                                            <optgroup label="COLLECTIBLES">
                                                <option value="1"{{ isset($_GET['category']) && $_GET['category'] == 1 ? ' selected="selected"' : '' }}>Collectibles and Art</option>
                                                <option value="46"{{ isset($_GET['category']) && $_GET['category'] == 46 ? ' selected="selected"' : '' }}>Collectibles</option>
                                                <option value="68"{{ isset($_GET['category']) && $_GET['category'] == 68 ? ' selected="selected"' : '' }}>Accessories</option>
                                                <option value="67"{{ isset($_GET['category']) && $_GET['category'] == 67 ? ' selected="selected"' : '' }}>ArtWork</option>
                                                <option value="168"{{ isset($_GET['category']) && $_GET['category'] == 168 ? ' selected="selected"' : '' }}>Bespoke Phone</option>
                                                <option value="136"{{ isset($_GET['category']) && $_GET['category'] == 136 ? ' selected="selected"' : '' }}>Boxes</option>
                                                <option value="64"{{ isset($_GET['category']) && $_GET['category'] == 64 ? ' selected="selected"' : '' }}>Frames</option>
                                                <option value="70"{{ isset($_GET['category']) && $_GET['category'] == 70 ? ' selected="selected"' : '' }}>Rare Books</option>
                                                <option value="61"{{ isset($_GET['category']) && $_GET['category'] == 61 ? ' selected="selected"' : '' }}>Tableware</option>
                                                <option value="131"{{ isset($_GET['category']) && $_GET['category'] == 131 ? ' selected="selected"' : '' }}>Vases</option>
                                                <option value="130"{{ isset($_GET['category']) && $_GET['category'] == 130 ? ' selected="selected"' : '' }}>Vintage</option>
                                                <option value="90"{{ isset($_GET['category']) && $_GET['category'] == 90 ? ' selected="selected"' : '' }}>Rare Objects</option>
                                            </optgroup>
                                            <optgroup label="FURNITURES">
                                                <option value="146"{{ isset($_GET['category']) && $_GET['category'] == 146 ? ' selected="selected"' : '' }}>Furniture</option>
                                                <option value="79"{{ isset($_GET['category']) && $_GET['category'] == 79 ? ' selected="selected"' : '' }}>Lighting</option>
                                                <option value="144"{{ isset($_GET['category']) && $_GET['category'] == 144 ? ' selected="selected"' : '' }}>Mirrors</option>
                                                <option value="63"{{ isset($_GET['category']) && $_GET['category'] == 63 ? ' selected="selected"' : '' }}>Home</option>
                                                <option value="133"{{ isset($_GET['category']) && $_GET['category'] == 133 ? ' selected="selected"' : '' }}>Lighting</option>
                                                <option value="62"{{ isset($_GET['category']) && $_GET['category'] == 62 ? ' selected="selected"' : '' }}>Tables</option>
                                                <option value="71"{{ isset($_GET['category']) && $_GET['category'] == 71 ? ' selected="selected"' : '' }}>Furniture</option>
                                                <option value="93"{{ isset($_GET['category']) && $_GET['category'] == 93 ? ' selected="selected"' : '' }}>Lighting</option>
                                            </optgroup>
                                            <optgroup label="MOTOR">
                                                <option value="40"{{ isset($_GET['category']) && $_GET['category'] == 40 ? ' selected="selected"' : '' }}>Yachting</option>
                                                <option value="25"{{ isset($_GET['category']) && $_GET['category'] == 25 ? ' selected="selected"' : '' }}>Cruiser</option>
                                                <option value="24"{{ isset($_GET['category']) && $_GET['category'] == 24 ? ' selected="selected"' : '' }}>Houseboat</option>
                                                <option value="23"{{ isset($_GET['category']) && $_GET['category'] == 23 ? ' selected="selected"' : '' }}>Jet Ski</option>
                                                <option value="85"{{ isset($_GET['category']) && $_GET['category'] == 85 ? ' selected="selected"' : '' }}>Super Yacht</option>
                                                <option value="76"{{ isset($_GET['category']) && $_GET['category'] == 76 ? ' selected="selected"' : '' }}>Yacht</option>
                                            </optgroup>
                                            <optgroup label="SAIL">
                                                <option value="22"{{ isset($_GET['category']) && $_GET['category'] == 22 ? ' selected="selected"' : '' }}>Sailing</option>
                                                <option value="24"{{ isset($_GET['category']) && $_GET['category'] == 24 ? ' selected="selected"' : '' }}>Houseboat</option>
                                            </optgroup>
                                            <optgroup label="JET">
                                                <option value="45"{{ isset($_GET['category']) && $_GET['category'] == 45 ? ' selected="selected"' : '' }}>Jets</option>
                                            </optgroup>
                                            <optgroup label="HELICOPTER">
                                                <option value="125"{{ isset($_GET['category']) && $_GET['category'] == 125 ? ' selected="selected"' : '' }}>Helicopters</option>
                                                <option value="13"{{ isset($_GET['category']) && $_GET['category'] == 13 ? ' selected="selected"' : '' }}>Jets-Helicopters</option>
                                            </optgroup>
                                            <optgroup label="ART">
                                                <option value="12"{{ isset($_GET['category']) && $_GET['category'] == 12 ? ' selected="selected"' : '' }}>Art</option>
                                                <option value="59"{{ isset($_GET['category']) && $_GET['category'] == 59 ? ' selected="selected"' : '' }}>Painting</option>
                                                <option value="58"{{ isset($_GET['category']) && $_GET['category'] == 58 ? ' selected="selected"' : '' }}>Photograph</option>
                                                <option value="129"{{ isset($_GET['category']) && $_GET['category'] == 129 ? ' selected="selected"' : '' }}>Print</option>
                                                <option value="128"{{ isset($_GET['category']) && $_GET['category'] == 128 ? ' selected="selected"' : '' }}>Sculpture</option>
                                            </optgroup>
                                            <optgroup label="ANTIQUES">
                                                <option value="139"{{ isset($_GET['category']) && $_GET['category'] == 139 ? ' selected="selected"' : '' }}>Antiques</option>
                                                <option value="74"{{ isset($_GET['category']) && $_GET['category'] == 74 ? ' selected="selected"' : '' }}>Arms and Armour</option>
                                                <option value="140"{{ isset($_GET['category']) && $_GET['category'] == 140 ? ' selected="selected"' : '' }}>Asian Antiques</option>
                                                <option value="81"{{ isset($_GET['category']) && $_GET['category'] == 81 ? ' selected="selected"' : '' }}>Ceramics and Porcelain</option>
                                                <option value="147"{{ isset($_GET['category']) && $_GET['category'] == 147 ? ' selected="selected"' : '' }}>Clocks</option>
                                                <option value="80"{{ isset($_GET['category']) && $_GET['category'] == 80 ? ' selected="selected"' : '' }}>Coins</option>
                                                <option value="73"{{ isset($_GET['category']) && $_GET['category'] == 73 ? ' selected="selected"' : '' }}>Decorative Art</option>
                                                <option value="145"{{ isset($_GET['category']) && $_GET['category'] == 145 ? ' selected="selected"' : '' }}>Glass</option>
                                                <option value="143"{{ isset($_GET['category']) && $_GET['category'] == 143 ? ' selected="selected"' : '' }}>Maps</option>
                                                <option value="142"{{ isset($_GET['category']) && $_GET['category'] == 142 ? ' selected="selected"' : '' }}>Medals</option>
                                                <option value="148"{{ isset($_GET['category']) && $_GET['category'] == 148 ? ' selected="selected"' : '' }}>Rare Books</option>
                                                <option value="78"{{ isset($_GET['category']) && $_GET['category'] == 78 ? ' selected="selected"' : '' }}>Rugs</option>
                                                <option value="77"{{ isset($_GET['category']) && $_GET['category'] == 77 ? ' selected="selected"' : '' }}>Silver</option>
                                                <option value="75"{{ isset($_GET['category']) && $_GET['category'] == 75 ? ' selected="selected"' : '' }}>Sport Antiques</option>
                                                <option value="141"{{ isset($_GET['category']) && $_GET['category'] == 141 ? ' selected="selected"' : '' }}>Tableware</option>
                                            </optgroup>
                                            <optgroup label="FINE WINES">
                                                <option value="35"{{ isset($_GET['category']) && $_GET['category'] == 35 ? ' selected="selected"' : '' }}>Fine Wines</option>
                                                <option value="26"{{ isset($_GET['category']) && $_GET['category'] == 26 ? ' selected="selected"' : '' }}>Dessert</option>
                                                <option value="30"{{ isset($_GET['category']) && $_GET['category'] == 30 ? ' selected="selected"' : '' }}>Red</option>
                                                <option value="28"{{ isset($_GET['category']) && $_GET['category'] == 28 ? ' selected="selected"' : '' }}>Rose</option>
                                                <option value="87"{{ isset($_GET['category']) && $_GET['category'] == 87 ? ' selected="selected"' : '' }}>Sparkling</option>
                                                <option value="29"{{ isset($_GET['category']) && $_GET['category'] == 29 ? ' selected="selected"' : '' }}>White</option>
                                            </optgroup>
                                            <optgroup label="SPIRITS">
                                                <option value="100"{{ isset($_GET['category']) && $_GET['category'] == 100 ? ' selected="selected"' : '' }}>Spirits</option>
                                                <option value="101"{{ isset($_GET['category']) && $_GET['category'] == 101 ? ' selected="selected"' : '' }}>Brandy</option>
                                                <option value="170"{{ isset($_GET['category']) && $_GET['category'] == 170 ? ' selected="selected"' : '' }}>Cognac</option>
                                                <option value="171"{{ isset($_GET['category']) && $_GET['category'] == 171 ? ' selected="selected"' : '' }}>Gin</option>
                                                <option value="102"{{ isset($_GET['category']) && $_GET['category'] == 102 ? ' selected="selected"' : '' }}>Port</option>
                                                <option value="103"{{ isset($_GET['category']) && $_GET['category'] == 103 ? ' selected="selected"' : '' }}>Rum</option>
                                                <option value="172"{{ isset($_GET['category']) && $_GET['category'] == 172 ? ' selected="selected"' : '' }}>Tequila</option>
                                                <option value="173"{{ isset($_GET['category']) && $_GET['category'] == 173 ? ' selected="selected"' : '' }}>Vodka</option>
                                                <option value="104"{{ isset($_GET['category']) && $_GET['category'] == 104 ? ' selected="selected"' : '' }}>Whiskey</option>
                                            </optgroup>
                                            <optgroup label="CHAMPAGNE">
                                                <option value="27"{{ isset($_GET['category']) && $_GET['category'] == 27 ? ' selected="selected"' : '' }}>Champagne</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right mb-20">
                                <button type="submit" class="btn btn-lg btn-raised btn-success">Filter</button>
                            </div>
                        </form>
                        <div id="product-list_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="dataTables_length" id="product-list_length">
                                        <form id="sorter" name="sorter" method="get" action="{{ $_SERVER['REQUEST_URI'] }}">
                                            <label>Show
                                            <select id="view" name="view-perpage" aria-controls="product-list" class="form-control input-sm">
                                                <option value="10"{{isset($_GET['view-perpage']) ? func::selected($_GET['view-perpage'],10) : ''}}>10</option>
                                                <option value="20"{{isset($_GET['view-perpage']) ? func::selected($_GET['view-perpage'],20) : ''}}>20</option>
                                                <option value="50"{{isset($_GET['view-perpage']) ? func::selected($_GET['view-perpage'],50) : ''}}>50</option>
                                                {{-- <option value="-1"{{isset($_GET['view-perpage']) ? func::selected($_GET['view-perpage'],-1) : ''}}>All</option> --}}
                                            </select>
                                            entries</label>
                                        </form>
                                        </br>
                                        <td>Showing {{ $products->count() }} of {{ $products->total() }} entries</td>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="wish-list" style="width: 100%" class="table table-hover dt-responsive nowrap">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    <div class="checkbox-custom">
                                                        <input id="checkAll" type="checkbox" value="option1">
                                                        <label for="checkAll" class="pl-0">&nbsp;</label>
                                                    </div>
                                                </th>
                                                <th>Image</th>
                                                <th>Product Name</th>
                                                <th>Date</th>
                                                <th>Featured Item</th>
                                                <th class="text-right">Price</th>
                                                {{-- <th class="text-right">Quantity</th> --}}
                                                <th style="display: block;">Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @for($i=0; $i < count($products); $i++)
                                                <tr>
                                                    <td class="text-center">
                                                        <div class="checkbox-custom">
                                                            <input id="product-{{$i}}" type="checkbox" value="{{$i}}">
                                                            <label for="product-{{$i}}" class="pl-0">&nbsp;</label>
                                                        </div>
                                                    </td>
                                                    <td><img src="{{func::img_url($products[$i]->mainImageUrl, 50, 50)}}" width="50" alt="" class="img-thumbnail img-responsive"></td>
                                                    <td style="width: 25%;">
                                                        {{$products[$i]->title}}
                                                    </td>
                                                    <td>{{date("Y-m-d H:i:s", strtotime($products[$i]->created_at))}}</td>
                                                    <?php
                                                    $sess_currency = null !==  session('currency') ? session('currency') : 'USD';
                                                    $price_format = func::formatPrice($products[$i]->currencyId, $sess_currency, $products[$i]->price);
                                                    $user = DB::table('users')->where('id',$products[$i]->userId)->first();
                                                    $featured_item = $user->featured_item;
                                                    $featured = json_decode($featured_item);
                                                    ?>
                                                    <td>
                                                    @if (is_array($featured))
                                                    	<?php $checked = in_array(($products[$i]->id), $featured) ? 'checked' : ''; ?>
                                                	@else
                                                		<?php $checked = ''; ?>
                                                    @endif
                                                    
                                                     <input id="product-{{$i}}" type="checkbox" {{$checked}} name="checkbox[]" value="{{$products[$i]->id}}" dataid="{{$products[$i]->userId}}" class="FeaturedItem">
                                                    </td>
                                                    <td class="text-right">{{$price_format}}</td>
                                                    {{-- <td class="text-right">320</td> --}}
                                                    <td><span class="label label-default">{{$products[$i]->status}}</span></td>
                                                    <td class="text-center">
                                                        <div role="group" aria-label="Basic example" class="btn-group btn-group-sm">
                                                            <a target="_blank" href="/listing/{{ $products[$i]->slug }}" class="btn btn-outline btn-primary"><i class="ti-eye"></i></a>
                                                            <a href="/dashboard/product/edit/{{ $products[$i]->id }}" class="btn btn-outline btn-success"><i class="ti-pencil"></i></a>
                                                            <a href="/dashboard/product/delete/{{ $products[$i]->id }}" class="btn btn-outline btn-danger"><i class="ti-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endfor
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="dataTables_info" id="product-list_info" role="status" aria-live="polite">
                                        Showing {{ $products->count() }} of {{ $products->total() }} entries
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="product-list_paginate">
                                        {{ $products->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('scripts')
    <!-- jQuery-->
    <script type="text/javascript" src="/db/js/jquery.min.js"></script>
    <!-- Bootstrap JavaScript-->
    <script type="text/javascript" src="/db/js/bootstrap.min.js"></script>
    <!-- Malihu Scrollbar-->
    <script type="text/javascript" src="/db/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- Animo.js-->
    <script type="text/javascript" src="/db/js/animo.min.js"></script>
    <!-- Bootstrap Progressbar-->
    <script type="text/javascript" src="/db/js/bootstrap-progressbar.min.js"></script>
    <!-- jQuery Easy Pie Chart-->
    <script type="text/javascript" src="/db/js/jquery.easypiechart.min.js"></script>
    <!-- MomentJS-->
    <script type="text/javascript" src="/db/js/moment.min.js"></script>
    <!-- Bootstrap Date Range Picker-->
    <script type="text/javascript" src="/db/js/daterangepicker.js"></script>
    <!-- DataTables-->
    <script type="text/javascript" src="/db/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="/db/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="/db/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="/db/js/buttons.bootstrap.min.js"></script>
    <script type="text/javascript" src="/db/js/jszip.min.js"></script>
    <script type="text/javascript" src="/db/js/pdfmake.min.js"></script>
    <script type="text/javascript" src="/db/js/vfs_fonts.js"></script>
    <script type="text/javascript" src="/db/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="/db/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="/db/js/dataTables.colReorder.min.js"></script>
    <script type="text/javascript" src="/db/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="/db/js/responsive.bootstrap.js"></script>
    <!-- Custom JS-->
    <script type="text/javascript" src="/db/js/app.js"></script>
    <script type="text/javascript" src="/db/js/demo.js"></script>
    <script type="text/javascript" src="/db/js/product-list.js"></script>
    <script type="text/javascript" src="/db/js/date-range-picker.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        $('#view').change(function(){
            $('form#sorter').submit();
        });
        
         $('.FeaturedItem').on('change',function(){
        var arr = [];
        arr.length = 0;
            $('.FeaturedItem').each(function(){
                if($(this).is(':checked')){
                    arr.push($(this).val());
                }
            });
            console.log(arr);
            //validasi

            //save
            var id = $(this).attr('dataid');
            //alert(checkbtn+id);

            $.ajax({
                url : '/add/featured-item/'+id,
                method :'post',
                data :{values: arr, _token: '{{ csrf_token()}}'},
                success:function(result){
                    // alert(result);
                    console.log(result);
                }
            });

        });
    });
    </script>

@endsection
