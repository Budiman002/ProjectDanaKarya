<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
public function run(): void
{
    $categories = [
        [
            'name' => 'Seni & Budaya',
            'slug' => 'seni-budaya',
            'description' => 'Campaign untuk seni, musik, film, teater, dan budaya lokal',
            'icon' => '🎭',
            'image' => 'SeniBudaya.jpg',
            'status' => 'active',
        ],
        [
            'name' => 'UMKM',
            'slug' => 'umkm',
            'description' => 'Campaign untuk usaha mikro, kecil, dan menengah',
            'icon' => '🏪',
            'image' => 'UMKM.jpg',
            'status' => 'active',
        ],
        [
            'name' => 'Teknologi',
            'slug' => 'teknologi',
            'description' => 'Campaign untuk inovasi teknologi dan startup',
            'icon' => '💻',
            'image' => 'Technology.jpg',
            'status' => 'active',
        ],
        [
            'name' => 'Pendidikan',
            'slug' => 'pendidikan',
            'description' => 'Campaign untuk program pendidikan dan pelatihan',
            'icon' => '📚',
            'image' => 'Education.jpg',
            'status' => 'active',
        ],
        [
            'name' => 'Kesehatan',
            'slug' => 'kesehatan',
            'description' => 'Campaign untuk kesehatan dan kesejahteraan',
            'icon' => '🏥',
            'image' => 'Health.jpg',
            'status' => 'active',
        ],
        [
            'name' => 'Lingkungan',
            'slug' => 'lingkungan',
            'description' => 'Campaign untuk pelestarian lingkungan dan sustainability',
            'icon' => '🌱',
            'image' => 'Environment.jpg',
            'status' => 'active',
        ],
        [
            'name' => 'Sosial',
            'slug' => 'sosial',
            'description' => 'Campaign untuk kegiatan sosial dan kemanusiaan',
            'icon' => '🤝',
            'image' => 'Social.jpg',
            'status' => 'active',
        ],
    ];

    foreach ($categories as $category) {
        \App\Models\Category::create($category);
    }
}
}
