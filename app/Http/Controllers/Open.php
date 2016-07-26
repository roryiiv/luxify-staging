<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Aws\S3\S3Client;
use League\Flysystem\AwsS3v3\AwsS3Adapter;
use League\Flysystem\Filesystem;

class Open extends Controller {
    public function upload(Request $request) {
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                //Image is valid and exist
                $imageTempName = $request->file('image')->getClientOriginalName();
                $ext = pathinfo($imageTempName, PATHINFO_EXTENSION);
                $timestamp = date("Ymd-His");
                $upload_path = base_path() . '/public/temp/';
                $filename = $timestamp . '-luxify-' . Auth::user()->id .'.'. $ext;
                $moved_path = $upload_path . $filename;
                $request->file('image')->move($upload_path, $filename);
                return response()->json($filename);
            }
        }
    }
}
