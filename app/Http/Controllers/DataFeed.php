<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Listings;

use App\Meta;

use App\Users;

use App\FormGroups;

use \Cviebrock\EloquentSluggable\Services\SlugService;

use Intervention\Image\ImageManagerStatic as Image;

use Aws\S3\S3Client;

use DB;

use func;


class DataFeed extends Controller
{
  public function downloadImageToS3() {
    $imageUrl = func::getVal('post', 'imageUrl');
    $userId = func::getVal('post', 'userId');
    if ($imageUrl && $userId) {
      $oriFileName = basename($imageUrl);
      $ext = pathinfo($oriFileName, PATHINFO_EXTENSION);
      $timestamp = date("Ymd-His");
      $filepath = base_path() . '/public/temp/';
      $filename = $timestamp.'-luxify-'. $userId .'.'. $ext;
      $saved_filepath = $filepath . $filename;
      $img = Image::make($imageUrl)->save($saved_filepath); 
      $s3 = \Storage::disk('s3');
      if (file_exists($saved_filepath)) {
        if($s3->put('/images/'.$filename, file_get_contents($saved_filepath), 'public' )) {
          unlink($saved_filepath);
          echo json_encode(['result' => 1, 'data' => $filename]);
        } else {
          unlink($saved_filepath);
          echo json_encode(['result' => 0, 'message' => 'Fail to upload the image to s3.']); 
        }
      } else {
        echo json_encode(['result' => 0, 'message' => 'Fail to download the image to server.']); 
      }

    
    } else {
      echo json_encode(['result' => 0, 'message' => 'Please provide a valid image url and userId']); 
    }
  
  }

  public function product_search() {
    $where = func::getVal('post', 'where' );  
    $select = func::getVal('post', 'select');
    $limit = func::getVal('post', 'limit');
    $order = func::getVal('post', 'order');
    $table = func::getVal('post', 'table');
    $join = func::getVal('post', 'join');

    if (!$table) {
      $table = 'listings';
    }
    var_dump($join); exit();

    //try {
    $q = DB::table($table);
    if($where) {
      $q->where(function($query) use ($where, $limit, $order){
        foreach ($where as $field => $w) {
          if ((isset($w['op']) && !empty($w['op'])) && (isset($w['val']) && !empty($w['val']))) {
            $query->where($field, $w['op'], $w['val'] );
          }
        }
      });
      if ($select && is_array($select)) {
        foreach($select as $s) {
           $q->addSelect($s);
        }
      }
      if($join && is_array($join)) {
        foreach($join as $key => $j) {
          $q->join($key, $j['lhs'], '=', $j['rhs']);
        }
      }
      if ($limit && intval($limit) !== 0) {
        $q->take(intval($limit));
      }
      if ($order && is_array($order)) {
        foreach($order as $key => $direction) {
          if (in_array($direction, ['desc', 'asc'])) {
            $q->orderBy($key, $direction); 
          }
        } 
      }
        $result = $q->get();
        if ($result) {
          echo json_encode(['result'=> 1, 'data' => $result]);
        } else {
          echo json_encode(['result'=> 1, 'data' => [] ]);
        }
    } else {
      echo json_encode(['result' => 0, 'message' => 'Please supply enough parameter or check the structure of your request']); 
    }

  //    } catch(\Illuminate\Database\QueryException $e) {
  //      var_dump($e); exit();
  //    }
  }

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
      $newListing->fill($inputs); 
      $newListing->slug = SlugService::createSlug(Listings::class, 'slug', $inputs['title']);
      $newId = $newListing->save();
      if ($newId) {
         if(isset($inputs['extraInfo']) && !empty($inputs['extraInfo'])) {
           foreach($extraInfo as $key => $val) {
             $anInfo = new ExtraInfos; 
             $formgroupId = str_replace('formgroupId_', '');
             $anInfo->formgroupId = $formgroupId;
             $anInfo->listingId = $newId;
             $anInfo->save();
           }
         }
         echo json_encode(['result'=> 1, 'data' => $newListing]);
       }
    } else {
      echo json_encode(['result'=> 0, 'message' => $newListing->errors()]);
    }
  }
  
  public function product_update($id, Request $request) {
    if ($id) {
      $inputs = $request->all();
      $oldListing = Listings::find($id);
      if ($oldListing) {
        $oldListing->fill($inputs); 
        $newId = $oldListing->save();
        if ($newId) {
          echo json_encode(['result'=> 1, 'data' => $oldListing]);
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
  public function getTable($tableName) {
    $data = DB::table($tableName)
      ->get();
    if ($data) {
      echo json_encode(['result' => 1, 'data' => $data]); 
    } else {
      echo json_encode(['result' => 0, 'message' => 'No data exists in the database']); 
    }
  }
  public function updateMeta() {
    $table = func::getVal('post', 'table');
    $id = func::getVal('post', 'id');
    $meta = func::getVal('post', 'meta');
    
    if ($table && $id && $meta) {
      if ($table !== 'images') {
        foreach ($meta  as $key => $value) {
          if (!in_array($key, ['alt_text', 'author', 'description', 'keyword', 'title'])) {
            echo json_encode(['result'=> 0, 'message' => '`' .$key . '` is an invalid meta_key.']);
            exit();
          }   
        }
      }
      if ($table === 'listings') {
        $listing = Listings::find($id);
        if ($listing) {
          Meta::saveorupdate($id, $meta, 'listings');
          echo json_encode(['result' => 1]);
        } else {
          echo json_encode(['result' => 0, 'message' => 'Lisitng does not exists.']); 
        }
      } else if ($table === 'users') {
        $user = Users::find($id);
        if ($user) {
          Meta::saveorupdate($id, $meta, 'users');
          echo json_encode(['result' => 1]);
        } else {
          echo json_encode(['result' => 0, 'message' => 'Lisitng does not exists.']); 
        }
      } else if ($table === 'images') {
        $allImage = $meta;
        foreach($allImage as $key =>$img) {
          Meta::saveorupdate($key, $img, 'images');
        }
        echo json_encode(['result' => 1]);
      }
    } else {
      echo json_encode(['result' => 0, 'message' => 'Please provide enough parameters.']); 
    } 
  }
}
