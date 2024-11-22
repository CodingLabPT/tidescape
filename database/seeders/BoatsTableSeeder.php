<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class BoatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('boats')->insert([
            [
                'tipo'          => 'Small Boat',
                'img'           => 'assets/img/boats\8aba20d8c2185e54f492b34f226d54fd.jpg',
                'img2'          => 'assets/img/boats\8aba20d8c2185e54f492b34f226d54fd.jpg',
                'img3'          => 'assets/img/boats\8aba20d8c2185e54f492b34f226d54fd.jpg',
                'descricao'     => 'A small watercraft is a small boat or ship, often used for recreational, sporting, fishing, or transportation purposes in inland or coastal waters. Typically, these vessels are of compact dimensions and can be maneuvered by one or a few individuals.',
            ],
            [
                'tipo'          => 'Big Boat',
                'img'           => 'assets/img/boats\8aba20d8c2185e54f492b34f226d54fd.jpg',
                'img2'          => 'assets/img/boats\8aba20d8c2185e54f492b34f226d54fd.jpg',
                'img3'          => 'assets/img/boats\8aba20d8c2185e54f492b34f226d54fd.jpg',
                'descricao'     => 'A large watercraft is a large-sized ship or boat, often used for commercial, military, cruise, or cargo transportation purposes in oceanic waters. These vessels are characterized by their substantial size and capacity to carry large volumes of cargo or a significant number of passengers.',
            ],
            [
                'tipo'          => 'Large Boat',
                'img'           => 'assets/img/boats\8aba20d8c2185e54f492b34f226d54fd.jpg',
                'img2'          => 'assets/img/boats\8aba20d8c2185e54f492b34f226d54fd.jpg',
                'img3'          => 'assets/img/boats\8aba20d8c2185e54f492b34f226d54fd.jpg',
                'descricao'     => 'A very large watercraft is a category of vessel that significantly exceeds the dimensions of conventional large vessels. It is often used to transport large loads or perform specific tasks on a massive scale, such as giant tankers, high-tonnage cargo ships, or large-scale ocean exploration vessels.',
            ],
        ]);
    }
}
