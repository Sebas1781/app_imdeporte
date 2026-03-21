<?php

namespace App\Http\Controllers;

use Illuminate\Http\UploadedFile;

abstract class Controller
{
    /**
     * Store an uploaded image directly in public/uploads/{folder}/
     * so it is served without needing a storage symlink.
     */
    protected function storeImage(UploadedFile $file, string $folder): string
    {
        $ext      = strtolower($file->getClientOriginalExtension());
        $filename = uniqid() . '.' . $ext;
        $dir      = public_path('uploads/' . $folder);

        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        $file->move($dir, $filename);

        return '/uploads/' . $folder . '/' . $filename;
    }
}

