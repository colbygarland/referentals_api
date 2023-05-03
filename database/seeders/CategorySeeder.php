<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert(
            ['name' => 'Cleanliness', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        );
        DB::table('categories')->insert(
            ['name' => 'Noise', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        );
        DB::table('categories')->insert(
            ['name' => 'Location', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        );
    }
}
