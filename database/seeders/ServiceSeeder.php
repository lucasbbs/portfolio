<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    private $typescriptIcon;
    private $copyAltIcon;
    private $barChartSquareIcon;
    private $binocularsIcon;
    private $sunIcon;
    private $calendarIcon;

    private $icons = [];

    private $services = [
        [
            'name' => 'Front-end',
            'description' => 'Desenvolvimento de aplicações web utilizando HTML, CSS e JavaScript.',
        ],
        [
            'name' => 'Back-end',
            'description' => 'Desenvolvimento de aplicações web utilizando PHP e NodeJS.',
        ],
        [
            'name' => 'Mobile',
            'description' => 'Desenvolvimento de aplicações mobile utilizando React Native.',
        ],
        [
            'name' => 'Banco de dados',
            'description' => 'Desenvolvimento de aplicações web utilizando MySQL e MongoDB.',
        ],
        [
            'name' => 'DevOps',
            'description' => 'Desenvolvimento de aplicações web utilizando Docker e AWS.',
        ],
        [
            'name' => 'Análise de dados',
            'description' => 'Análise de dados utilizando Python e R.',
        ],
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->typescriptIcon = \DB::table('icons')->where('name', 'typescript')->first()->id;
        $this->copyAltIcon = \DB::table('icons')->where('name', 'copy-alt')->first()->id;
        $this->barChartSquareIcon = \DB::table('icons')->where('name', 'bar-chart-square')->first()->id;
        $this->binocularsIcon = \DB::table('icons')->where('name', 'binoculars')->first()->id;
        $this->sunIcon = \DB::table('icons')->where('name', 'sun')->first()->id;
        $this->calendarIcon = \DB::table('icons')->where('name', 'calendar')->first()->id;
        $this->icons = [
            $this->typescriptIcon,
            $this->copyAltIcon,
            $this->barChartSquareIcon,
            $this->binocularsIcon,
            $this->sunIcon,
            $this->calendarIcon,
        ];

        foreach ($this->services as $key => $service) {
            $newService = new Service();
            $newService->icon_id = $this->icons[$key];
            $newService->name = $service['name'];
            $newService->description = $service['description'];
            $newService->save();
        }
    }
}
