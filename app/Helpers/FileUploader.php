<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class FileUploader
{
    public static function upload(Request $request,  $fieldName, $diskName,$fichierName = null) {

        $filename = "";

        if ($request->hasFile($fieldName)) {
            // Obtenir le fichier
            $file = $request->file($fieldName);
            if($fichierName){
                $filename = $fichierName;
            } else {
                 // Générer un nom de fichier unique
                $filename = uniqid() . '-' . $file->getClientOriginalName();
            }
            if (Storage::disk($diskName)->put($filename, File::get($file))) {
                return $filename;
            }
        }

        return $filename;
    }
}
