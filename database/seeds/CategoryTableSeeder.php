<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $categories = [
        'Balita & Anak Sakit',
        'Bantuan Medis & Kesehatan',
        'Beasiswa & Pendidikan',
        'Bencana Alam',
        'Birthday Fundraising',
        'Difabel',
        'Family For Family',
        'Hadiah & Apresiasi',
        'Karya Kreatif (Film, Buku, dll)',
        'Kategori Lainnya',
        'Kegiatan Sosial',
        'Kemanusiaan',
        'Lingkungan',
        'Menolong Hewan',
        'Modal Usaha',
        'Panti Asuhan',
        'Produk & Inovasi',
        'Rumah Ibadah',
        'Run For Charity',
        'Sarana & Infrastruktur'
      ];

      Category::query()->truncate();
      foreach ($categories as $category) {
        $model_category = new Category;
        $model_category->name = $category;
        $model_category->save();  
      }
    }
}
