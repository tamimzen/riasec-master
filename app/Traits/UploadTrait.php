<?php
namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait UploadTrait
{
   /**
   * membuat fungsi baru bernama uploadImg yang akan menangani pengunggahan file dengan mengambil parameter
   *  [ gambar, folder, disk, dan nama file yang diunggah ] 
   */ 
   public function uploadOne(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $filename = null)
   {
      # memeriksa apakah nama file telah diteruskan, jika tidak maka dibuat nama string acak.
      $name = !is_null($filename) ? $filename : Str::random(25);

      $file = $uploadedFile->storeAs($folder, $name.'.'.$uploadedFile->getClientOriginalExtension(), $disk);

      return $file;
   }

   public function deleteOne($folder = null, $disk = 'public', $filename = null)
   {
      Storage::disk($disk)->delete($folder.$filename);
   }
}