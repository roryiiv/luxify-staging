<?php

namespace App\Http\Controllers;
use App\Listings;
use App\Users;
use \Cviebrock\EloquentSluggable\Services\SlugService;
class Slug extends Controller
{
  public function createSlug() {
    $slug = SlugService::createSlug(Listings::class, 'slug', $_POST['title']);
    return $slug;
  }
  public function createUserSlug() {
    $slug = SlugService::createSlug(Users::class, 'slug', $_POST['companyName']);
    return $slug;
  }

}
