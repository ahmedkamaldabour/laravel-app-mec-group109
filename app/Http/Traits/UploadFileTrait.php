<?php

namespace App\Http\Traits;

use function public_path;
use function time;

trait UploadFileTrait
{
    private function uploadImage($file)
    {
        $fileName = time() . '.' . $file->getClientOriginalName();
        $file->move(public_path('images'), $fileName);
        return $fileName;
    }

}
