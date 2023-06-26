<?php

namespace Database\Seeders;

use App\Models\Resume;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResumeSeeder extends Seeder
{
    private $summaryResume = [
        'title' =>'Lucas Breno de Souza Noronha Braga',
        'description' => 'Innovative and deadline-driven Graphic Designer with 3+ years of experience designing and developing user-centered digital/print marketing material from initial concept to final, polished deliverable.; Portland par 127,Orlando, FL; (123) 456-7891; alice.barkley@example.com'
    ];

    private $educationResumes = [
        [
            'title' => 'Master of Fine Arts',
            'description' => 'Qui deserunt veniam. Et sed aliquam labore tempore sed quisquam iusto autem sit. Ea vero voluptatum qui ut dignissimos deleniti nerada porti sand markend',
            'start_date' => '2015-01-01',
            'end_date' => '2016-01-01',
            'company' => 'Rochester Institute of Technology',
            'city' => 'Rochester',
            'state' => 'NY',
            'country' => 'USA',
        ],
        [
            'title' => 'Bachelor of Fine Arts & Graphic Design',
            'description' => 'Quia nobis sequi est occaecati aut. Repudiandae et iusto quae reiciendis et quis Eius vel ratione eius unde vitae rerum voluptates asperiores voluptatem Earum molestiae consequatur neque etlon sader mart dila',
            'start_date' => '2010-01-01',
            'end_date' => '2014-01-01',
            'company' => 'Rochester Institute of Technology',
            'city' => 'Rochester',
            'state' => 'NY',
            'country' => 'USA',
        ],
    ];

    private $professionalResumes = [
        [
            'title' => 'Senior Graphic Design Specialist',
            'description' => 'Lead in the design, development, and implementation of the graphic, layout, and production communication materials; Delegate tasks to the 7 members of the design team and provide counsel on all aspects of the project.; Supervise the assessment of all graphic materials in order to ensure quality and accuracy of the design; Oversee the efficient use of production project budgets ranging from $2,000 - $25,000',
            'start_date' => '2019-01-01',
            'company' => 'Experion',
            'city' => 'New York',
            'state' => 'NY',
            'country' => 'USA',
        ],
        [
            'title' => 'Graphic Design Specialist',
            'description' => 'Developed numerous marketing programs (logos, brochures,infographics, presentations, and advertisements).; Managed up to 5 projects or tasks at a given time while under pressure to meet weekly deadlines; Recommended and consulted with clients on the most appropriate graphic design; Created 4+ design presentations and proposals a month for clients and account managers',
            'start_date' => '2017-01-01',
            'end_date' => '2018-01-01',
            'company' => 'Stepping Stone Advertising',
            'city' => 'New York',
            'state' => 'NY',
            'country' => 'USA',
        ]
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $newResume = new Resume();
        $newResume->title = $this->summaryResume['title'];
        $newResume->description = $this->summaryResume['description'];
        $newResume->section = 'summary';
        $newResume->save();
        

        foreach ($this->educationResumes as $resume) {
            $newResume = new Resume();
            $newResume->title = $resume['title'];
            $newResume->description = $resume['description'];
            $newResume->start_date = $resume['start_date'];
            $newResume->end_date = isset($resume['end_date']) ? $resume['end_date'] : null;
            $newResume->company = $resume['company'];
            $newResume->city = $resume['city'];
            $newResume->state = $resume['state'];
            $newResume->country = $resume['country'];
            $newResume->section = 'education';
            $newResume->save();
        }

        foreach ($this->professionalResumes as $resume) {
            $newResume = new Resume();
            $newResume->title = $resume['title'];
            $newResume->description = $resume['description'];
            $newResume->start_date = $resume['start_date'];
            $newResume->end_date = isset($resume['end_date']) ? $resume['end_date'] : null;
            $newResume->company = $resume['company'];
            $newResume->city = $resume['city'];
            $newResume->state = $resume['state'];
            $newResume->country = $resume['country'];
            $newResume->section = 'professional_experience';
            $newResume->save();
        }
    }
}
