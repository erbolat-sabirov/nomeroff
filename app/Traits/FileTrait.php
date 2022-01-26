<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Symfony\Component\Filesystem\Exception\FileNotFoundException;

/**
 *
 */
trait FileTrait
{

    /**
     * upload_file
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string $filename (avatar, logotype)
     * @param  string $path Path where save file
     *
     * @return string path to file
     */
    public function uploadFile(UploadedFile $file, string $path)
    {
      $path = $file->store('/' . $path, 'uploads');
      return '/uploads' . '/' . $path;
    }

    public function deleteFile(string $path)
    {
      $path = public_path($path);
      if (file_exists($path)) {
        unlink($path);
      }
    }
}
