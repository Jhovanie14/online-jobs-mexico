<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();

        // Define some skills for each category
        $skills = [
            'Programming' => [
                'PHP',
                'HTML',
                'JavaScript',
                'Python',
                'Ruby',
            ],
            'Design' => [
                'Photoshop',
                'Illustrator',
                'UI/UX Design',
                'Sketch',
            ],
            'Marketing' => [
                'SEO',
                'Content Marketing',
                'Social Media Marketing',
                'Email Marketing',
            ],
            'Management' => [
                'Project Management',
                'Team Leadership',
                'Time Management',
            ],
            'Writing' => [
                'Copywriting',
                'Technical Writing',
                'Content Writing',
                'Blogging',
            ],
            'Data Science' => [
                'Data Analysis',
                'Machine Learning',
                'Deep Learning',
                'Big Data',
            ],
            'Finance' => [
                'Financial Analysis',
                'Budgeting',
                'Accounting',
                'Investment',
            ],
        ];

        // Loop through each category and add skills
        foreach ($skills as $categoryName => $skillNames) {
            $category = $categories->where('name', $categoryName)->first();

            foreach ($skillNames as $skillName) {
                Skill::create([
                    'name' => $skillName,
                    'category_id' => $category->id,  // Associate skill with category
                ]);
            }
        }
    }
}
