<?php

namespace App\Http\Traits;
use App\Models\Attachement;
use DB;

trait CommonTrait {
    public static function generateFileName($file) {

        try {
            //code...
            $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            return substr(str_shuffle($chars),0,8).time().'.'.$file->getClientOriginalExtension();
        
        } catch (\Throwable $th) {
            //throw $th;
            return false;
        }
        
    }
}