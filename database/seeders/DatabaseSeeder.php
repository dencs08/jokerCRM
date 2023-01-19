<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Client;
use App\Models\SystemUser;
use App\Models\Contract;
use App\Models\Appointment;
use App\Models\Email;
use App\Models\ContactPerson;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        SystemUser::factory()
        ->count(10)
        ->create();

        Client::factory()
        ->count(10)
        ->create();

        Contract::factory()
        ->count(100)
        ->create();

        Appointment::factory()
        ->count(100)
        ->create();

        Email::factory()
        ->count(500)
        ->create();

        // ContactPerson::factory()
        // ->count(100)
        // ->create();
    }
}
