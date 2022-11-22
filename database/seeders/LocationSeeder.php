<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::create([
            'image' => 'example.jpg',
            'lat' => '24.6438753',
            'lang' => '46.7273219',
            'url' => 'https://goo.gl/maps/fgBs1gqBBQ85EBiP6',

            'description_ar' => 'شارع الريل مجمع الشايع <br> صناع الحلول الدولية',
            'description_en' => 'Riydah',
        ]);
    }
}