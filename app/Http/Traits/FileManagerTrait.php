<?php

namespace App\Http\Traits;
use App\Models\Attachement;
use DB;
use App\Http\Traits\CommonTrait;
use Illuminate\Support\Facades\Storage;


trait FileManagerTrait {
    use CommonTrait;

    public static function fileUpload($files,$productId) {

        try {
            //code...
            foreach ($files as $file) {
                # code...
                $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
                $fileName = substr(str_shuffle($chars),0,8).time().'.'.$file->getClientOriginalExtension();
                $filePath = $file->store('public/product-images');
                $filePath = str_replace("public", "storage", $filePath);

                DB::beginTransaction();

                $fileUpload = new Attachement;
                $fileUpload->file_name = $fileName;
                $fileUpload->path = url($filePath);
                $fileUpload->product_id = $productId;
                $fileUpload->save();

                if ($fileUpload->exists) {
                    # code...
                    DB::commit();
                    $successfull = true;
                } else {
                    # code...
                    DB::rollback();
                    $successfull = false;
                }

            }

            return $successfull;
        
        } catch (\Throwable $th) {
            //throw $th;
            return false;
        }
        
    }
}