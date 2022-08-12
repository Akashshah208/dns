<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Category 1',
            ],
            [
                'name' => 'Category 2',
            ],
            [
                'name' => 'Category 3',
            ],
            [
                'name' => 'Category 4',
            ],
            [
                'name' => 'Category 5',
            ],
        ];

        foreach ($categories as $category) {

            $categoryObj = new Category();
            $categoryObj->name = $category['name'];
            $categoryObj->save();
        }
    }
}
