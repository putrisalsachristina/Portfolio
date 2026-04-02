<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::create([
            'title' => 'Project 1',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'image' => 'project.jpg',
            'github' => 'github1',
            'link' => 'Link1',
     ]);
    }
}
