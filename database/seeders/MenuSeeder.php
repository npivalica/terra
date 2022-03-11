<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $menu = [
        [
            "name" => "Home",
            "route" => "home.index"
        ],
        [
            "name" => "Posts",
            "route" => "posts.index"
        ],
        [
            "name" => "Contact",
            "route" => "contact.index"
        ],
        [
            "name" => "Author",
            "route" => "author.index"
        ],
        [
            "name" => "Admin",
            "route" => "admin.index"
        ],
        [
            "name" => "Login",
            "route" => "auth.index"
        ],
        [
            "name" => "Logout",
            "route" => "auth.logout"
        ]
    ];

    public function run()
    {
        $faker = Faker::create();

        foreach($this->menu as $key=>$link){
            DB::table('menus')->insert([
                'name' => $link['name'],
                'route' => $link['route'],
                'order' => $key+1,
                'created_at' => $faker->dateTimeBetween('-5 years', '-1 month')
            ]);
        }
    }
}
