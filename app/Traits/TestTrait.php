<?php
namespace App\Traits;

use Illuminate\Support\Facades\Auth;
use App\Models\{TestKepribadian, Soal};

trait TestTrait
{

   /**
    * @return array
    * Function createSoal digunakan untuk menampilkan soal yang sudah berelasi dengan pernyataan didalamnya,
    * dan juga record data test berupa id test dan juga id user yang nantinya disimpan pada database
    *
    * Untuk Test Baru (jika pengguna sebelumnya belum menyelesaikan sesitest, maka akan pakai id_test lama
    * sampai dengan user tersebut menyelesaikan sesitest sepenuhnya)
   */
   public function createSoal()
   {
      return [
      //    'id' => TestKepribadian::updateOrCreate([
      //    'user_id' => Auth::id(),
      //    'finished_at' => null
      // ])->id,
      'pernyataan' => Soal::all(),
      // 'pernyataan' => Soal::inRandomOrder()->get(),
      'nim' => Auth::user()->nim,
      ];
   }
}