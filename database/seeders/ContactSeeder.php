<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{

    private $contacts = [
            'address' => 'Windsor, ON, Canada',
            'email' => 'lucasbbs@live.fr',
            'phone' => '+5561983499994',
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $newContact = new Contact();
        $newContact->address = $this->contacts['address'];
        $newContact->email = $this->contacts['email'];
        $newContact->phone = $this->contacts['phone'];
        $newContact->save();
    }
}
