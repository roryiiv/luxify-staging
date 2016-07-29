<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Listings;

use App\Users;

use func;

class DataFeed extends Controller
{
  public function product_get($id) {
    $listing = Listings::where('id', $id )->first();
    if ($listing) {
      echo json_encode(['result'=> 1, 'data' => $listing]);
    } else {
      echo json_encode(['result'=> 0, 'message' => 'Could not found listing with `id` = '.$id ]);
    }
  }

  public function product_add(Request $request) {
    $inputs = $request()->all();
    $newListing = new Listing;
    if ($newListing->validate($inputs)) {
       $newListing->fill($inputs); 
       $newId = $newListing->insertGetId();
       if ($newId) {
         echo json_encode(['result'=> 0, 'data' => $newListing]);
       }
    } else {
      echo json_encode(['result'=> 0, 'message' => $newLisitng->errors()]);
    }
  }

  public function dealers_list() {
    $query = func::getVal('get', 'query'); 
    $q = Users::where('role', 'seller')
      ->where('dealer_status', 'approved')
      ->where('isSuspended', false)
      ->where(function ($queryBuilder) use ($query) {
        if ($query) {
          $queryArr = explode(' ', $query);
          foreach($queryArr as $keyword) {
            $queryBuilder->where(function ($nestedQ) use ($keyword) {
            
            $nestedQ->orWhere('email', 'like', '%'.$keyword .'%'); 
            $nestedQ->orWhere('firstName', 'like', '%'.$keyword .'%'); 
            $nestedQ->orWhere('lastName', 'like', '%'.$keyword .'%'); 
            $nestedQ->orWhere('companyName', 'like', '%'.$keyword .'%'); 
            $nestedQ->orWhere('fullName', 'like', '%'.$keyword .'%'); 
            });
          }
        }
      })
      ->limit(20)
      ->get();

    if( $q && count($q) > 0) {
       echo json_encode(['result' => 1, 'data'=>$q]); 
    } else {
       echo json_encode(['result' => 0, 'message'=> 'No dealers can be found.']); 
    }
  }
}
