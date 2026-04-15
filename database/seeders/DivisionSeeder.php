<?php

namespace Database\Seeders;

use App\Models\Division;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{

    public function run(): void
    {
    Division::create(['name' => 'Sarpras']);
    Division::create(['name' => 'Tata Usaha']);
    Division::create(['name' => 'Tefa']);
    }
}
