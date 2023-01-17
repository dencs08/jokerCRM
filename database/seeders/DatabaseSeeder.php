<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Client;
use App\Models\SystemUser;

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
    }
}
