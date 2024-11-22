<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class DurationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('durations')->insert([
            [
                'name'     => '2h',
            ],

            [
                'name'     => '4h',
            ],

            [
                'name'     => '6h',
            ],
        ]);
    }
}
