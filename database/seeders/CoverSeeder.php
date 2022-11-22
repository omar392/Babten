<?php

namespace Database\Seeders;

use App\Models\Cover;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cover::create([
            'image_contact' => 'example.jpg',
            'image_offer' => 'example.jpg',
            'image_offer_single' => 'example.jpg',
            'image_gallery' => 'example.jpg',
            'image_about_3' => 'example.jpg',
            'image_about_2' => 'example.jpg',
            'image_blog' => 'example.jpg',
            'image_faqs_2' => 'example.jpg',
            'image_faqs' => 'example.jpg',
            'image_service' => 'example.jpg',
            'image_about' => 'example.jpg',
            'image_jobs' => 'example.jpg',
            'image_jobs_2' => 'example.jpg',
        ]);
    }
}