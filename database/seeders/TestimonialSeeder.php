<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    private $testimonials = [
        [ 
            'name' => 'Saul Goodman',
            'designation' => 'Ceo & Founder',
            'description' => 'Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.',
            'image' => 'image/testimonial/testimonials-1.jpg'
        ],
        [
            'name' => 'Sara Wilsson',
            'designation' => 'Designer',
            'description' => 'Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.',
            'image' => 'image/testimonial/testimonials-2.jpg'
        ],
        [
            'name' => 'Jena Karlis',
            'designation' => 'Store Owner',
            'description' => 'Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.',
            'image' => 'image/testimonial/testimonials-3.jpg'
        ],
        [
            'name' => 'Matt Brandon',
            'designation' => 'Freelancer',
            'description' => 'Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore.',
            'image' => 'image/testimonial/testimonials-4.jpg'
        ],
        [
            'name' => 'John Larson',
            'designation' => 'Entrepreneur',
            'description' => 'Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore.',
            'image' => 'image/testimonial/testimonials-5.jpg'
        ],
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
