<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            User::factory()->create([
                'name'=>'admin',
                'email'=>'admin@ao-webshop.com',
                'is_admin'=>'1',
                ]);
            
            User::factory()->create([
                'name'=>'henk',
                'email'=>'henk@ao-webshop.com',
                'is_admin'=>false,
                ]);

    }
}
