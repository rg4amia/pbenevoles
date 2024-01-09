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


   public static function checkPointage($poitage_date,$pointage_periode)
   {

     $pointage =DB::table('pointages')
             ->where([
                       'date' =>$poitage_date,
                       'periode' =>$pointage_periode,
                  ])
             ->first();
     if($pointage){return $pointage->id;}else{ return false;}
     
   }

   public static function get_eleve_pointage($benevole_id,$pointage_id)
   {
      //dd($id_eleve,$cour_id);
      $check = DB::table('pointage_benevoles')
      ->where('benevole_id',$benevole_id)
      ->where('pointage_id',$pointage_id)
      ->first();
      
     return @$check->pointage;
   }





}
