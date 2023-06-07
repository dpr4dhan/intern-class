<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i= 1; $i<= 5; $i++){

            DB::table('posts')->insert([
                'title' => fake()->text(),
                'short_description' =>  fake()->text(),
                'description' =>  fake()->text(),
                'status'=> 1,
                'author'=> fake()->name(),
                'published_at' => date('Y-m-d H:i:s')
            ]);
        }
    }
}
