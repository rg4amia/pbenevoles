<?php

namespace App\Helpers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class Helper
{
    public static function getInstanceName($table,$table_id,$value,$returnName)
   {

     $entree =DB::table($table)
             ->where([
                       $table_id =>$value
                  ])
             ->first();
     if($entree){return $entree->$returnName;}else{ return '';}
     
   }
}
