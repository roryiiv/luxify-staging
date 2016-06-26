<?php

namespace App\Http\Controllers;
use App\Listings;
use \Cviebrock\EloquentSluggable\Services\SlugService;
class Slug extends Controller
{
  public function createSlug() {
    $slug = SlugService::createSlug(Listings::class, 'slug', $_POST['title']);
    return $slug;
  }

}
