<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    public function run(): void
    {
        if (TeamMember::query()->exists()) {
            return; // don't duplicate or overwrite the team once it exists
        }

        TeamMember::create([
            'name' => 'Ashiq Hussein Maither',
            'role' => 'CEO, 3HDS Services',
            'other_roles' => 'Founder, QuettaWal and Khyber',
            'location' => 'Melbourne, Australia',
            'order' => 1,
            'is_visible' => true,
        ]);

        TeamMember::create([
            'name' => 'Zareef Hussain',
            'role' => 'Senior Web Developer',
            'location' => 'England, United Kingdom',
            'order' => 2,
            'is_visible' => true,
        ]);
    }
}
