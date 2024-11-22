<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class LocalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('locals')->insert([
            [
                'name'     => 'Porto',
            ],

            [
                'name'     => 'Lisboa',
            ],

            [
                'name'     => 'Faro',
            ],
            [
                'name'     => 'Açores',
            ],
        ]);
    }
}
