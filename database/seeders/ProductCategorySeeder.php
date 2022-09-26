<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $table = [
            ['name' => 'Food'],
            ['name' => 'Phones'],
            ['name' => 'Cables'],
            ['name' => 'Laptops'],
            ['name' => 'Books']
        ];
        ProductCategory::insert($table);
    }
}
