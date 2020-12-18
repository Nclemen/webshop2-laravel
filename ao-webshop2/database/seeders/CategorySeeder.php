<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

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
            'Clothes',
            'Books',
            'Computer',
            'Movies',
            'school',
        ];

        foreach ($categories as $value) {
            Category::factory()->create(['name'=>$value]);
        }
    }
}
