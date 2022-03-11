<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $categories = ['Plants', 'Trees', 'Environment', 'Mindfulness', 'Wind'];

    public function run()
    {
        $faker = Faker::create();
        // $categories = Category::all();
        foreach ($this->categories as $category) {
            DB::table('categories')->insert([
                'name' => $category,
                'created_at' => $faker->dateTimeBetween('-5 years', '-1 month')
            ]);
            // $category->created_at = $faker->dateTimeBetween('-5 years', '-1 month');
            // $category->updated_at = $faker->dateTimeThisMonth;
            // $category->save();
        }
    }
}
