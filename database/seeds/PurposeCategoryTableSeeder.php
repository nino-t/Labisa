<?php

use App\PurposeCategory;
use Illuminate\Database\Seeder;

class PurposeCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $categories = [
        'Saya sendiri',
        'Keluarga/Kerabat',
        'Oraganisasi/Lembaga',
        'Lainnya'
      ];

      PurposeCategory::query()->truncate();
      foreach ($categories as $category) {
        $model_category = new PurposeCategory;
        $model_category->name = $category;
        $model_category->save();  
      }
    }
}
