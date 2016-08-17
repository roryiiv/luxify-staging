<?php

namespace App\MyLibrary;

use DateTime;

use Carbon\Carbon;

class Schema 
{

  
  static function itemScope() {
    return ' itemscope '; 
  }

  static function itemType($category) {
    $category_map = array(
      'real-estates' => 'Place' ,
      'jewellery-watches' => 'Product',
      'motors' => 'Vehicle',
      'handbags-accessories' => 'Product',
      'experiences' => 'Intangible',
      'collectibles-furnitures' => 'Product' ,
      'yachts' => 'Vehicle' ,
      'art-antiques' => 'CreativeWork' ,
      'fine-wines-spirits' => 'Winery',
      'ImageObject' => 'ImageObject',
      'URL' => 'URL',
      'PropertyValue' => 'PropertyValue'
    );
    $cat = isset($category_map[$category])? $category_map[$category] : $category;
    
    return ' itemtype=https://schema.org/' . $cat ;
  }

  static function itemProp($prop) {
    return ' itemprop='. $prop;
  }

}
