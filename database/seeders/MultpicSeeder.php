<?php

namespace Database\Seeders;

use App\Models\Multipic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Image;

class MultpicSeeder extends Seeder
{
    private $appId;
    private $cardId;
    private $webId;
    private $multpicsApp = [
        [ 'name' => 'App 1', 'image' => 'image/multi/portfolio-1.jpg' ],
        [ 'name' => 'App 2', 'image' => 'image/multi/portfolio-2.jpg' ],
        [ 'name' => 'App 3', 'image' => 'image/multi/portfolio-3.jpg' ],
    ];
    private $multpicsCard = [
        [ 'name' => 'Card 1', 'image' => 'image/multi/portfolio-4.jpg' ],
        [ 'name' => 'Card 2', 'image' => 'image/multi/portfolio-5.jpg' ],
        [ 'name' => 'Card 3', 'image' => 'image/multi/portfolio-6.jpg' ],
    ];
    
    private $multpicsWeb = [
        [ 'name' => 'Web 1', 'image' => 'image/multi/portfolio-7.jpg' ],
        [ 'name' => 'Web 2', 'image' => 'image/multi/portfolio-8.jpg' ],
        [ 'name' => 'Web 3', 'image' => 'image/multi/portfolio-9.jpg' ],
    ];
    
    private $multpics = [];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $this->appId = \DB::table('tags')->where('name', 'App')->first()->id;
        $this->cardId = \DB::table('tags')->where('name', 'Card')->first()->id;
        $this->webId = \DB::table('tags')->where('name', 'Web')->first()->id;
        $this->multpicsApp = array_map(function ($multpic) {
            $multpic['tag_id'] = $this->appId;
            return $multpic;
        }, $this->multpicsApp);

        $this->multpicsCard = array_map(function ($multpic) {
            $multpic['tag_id'] = $this->cardId;
            return $multpic;
        }, $this->multpicsCard);

        $this->multpicsWeb = array_map(function ($multpic) {
            $multpic['tag_id'] = $this->webId;
            return $multpic;
        }, $this->multpicsWeb);
        
        $this->multpics = [...$this->multpicsApp, ...$this->multpicsCard, ...$this->multpicsWeb];

        foreach ($this->multpics as $multpic) {
            $newMultpic = new Multipic();
            $newMultpic->name = $multpic['name'];
            $newMultpic->image = $multpic['image'];
            $newMultpic->tag_id = $multpic['tag_id'];
            $newMultpic->save();
        }
    }
}
