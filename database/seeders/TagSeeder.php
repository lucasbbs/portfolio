<?php

namespace Database\Seeders;

use App\Models\Tags;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    private $tags = [
        [ 'name' => 'App' ],
        [ 'name' => 'Card' ],
        [ 'name' => 'Web' ],
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->tags as  $tag) {
            $newTag = new Tags();
            $newTag->name = $tag['name'];
            $newTag->save();
        }
    }
}
