<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Listings;

use App\Users;

use App\FormGroups;

use func;

class DataFeed extends Controller
{
  public function product_get($id) {
    $listing = Listings::where('id', $id )->with('extrainfo')->first();
    if ($listing) {
      foreach($listing->extrainfo as $info) {
        $ff = FormGroups::find($info->formgroupId)->formfield;
        if ($ff) {
          $info->formfield = $ff->label;
        }
      }
      echo json_encode(['result'=> 1, 'data' => $listing]);
    } else {
      echo json_encode(['result'=> 0, 'message' => 'Could not found listing with `id` = '.$id ]);
    }
  }

  public function product_add (Request $request) {
    $inputs = $request->all();
    $newListing = new Listings;
    if ($newListing->validate($inputs)) {
       // modified before filling to the object
      if($inputs['images'] && !empty($inputs['image'])) {
        $inputs['images'] = json_encode($inputs['images']);
      }
      if($inputs['extraInfo'] && !empty($inputs['extraInfo'])) {
        $inputs['extraInfo'] = json_encode($inputs['extraInfo']);
      }

      $newListing->fill($inputs); 
      $newId = $newListing->save();
      if ($newId) {
         echo json_encode(['result'=> 1, 'data' => $newListing]);
       }
    } else {
      echo json_encode(['result'=> 0, 'message' => $newListing->errors()]);
    }
  }
  public function product_update($id, Request $request) {
    if ($id) {
      $inputs = $request()->all();
      $oldListing = Listing::find($id)->get();
      if ($oldListing) {
        if ($newListing->validate($inputs)) {
          $oldListing->fill($inputs); 
          $newId = $oldListing->update();
          if ($newId) {
            echo json_encode(['result'=> 1, 'data' => $oldListing]);
          }
        } else {
          echo json_encode(['result'=> 0, 'message' => $newLisitng->errors()]);
        }   
      } else {
        echo json_encode(['result'=> 0, 'message' => 'Unable to find listing with provided id']);
      }
    } else {
      echo json_encode(['result'=> 0, 'message' => 'Please provide a valid listing id']);
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
