<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::factory(200)
            ->create()->each(function ($service) {
                $tags = Tag::query()
                    ->where('type', 'service')
                    ->inRandomOrder()
                    ->take(3)
                    ->pluck('id');

                $service->tags()->attach($tags);
            });
    }
}
