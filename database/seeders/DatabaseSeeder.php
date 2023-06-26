<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{


    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Lucas Breno de Souza Noronha Braga',
            'email' => 'lucasbbs@live.fr'
        ]);

        $this->call([
            ContactSeeder::class,
            TagSeeder::class,
            MultpicSeeder::class,
            ResumeSeeder::class,
            IconSeeder::class,
            ServiceSeeder::class,
            TestimonialSeeder::class,
        ]);
    }
}
