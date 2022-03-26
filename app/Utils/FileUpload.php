<?php

namespace App\Utils;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class FileUpload {

    public static function UploadFile($path, $file){
        $original_name = str_replace('_', '-', $file->getClientOriginalName());
        $original_name = str_replace(' ', '-', $original_name);
        $timestamp = Carbon::now()->format('YmdHis');
        $filename = $timestamp.'_'.$original_name;
        Storage::disk('public')->put($path.'/'.$filename, file_get_contents($file));

        return $filename;
    }

    public static function deleteFile($path, $filename){
        $exists = Storage::disk('public')->exists($path.'/'.$filename);

        if($exists){
            Storage::disk('public')->delete($path.'/'.$filename);
        }
    }
}