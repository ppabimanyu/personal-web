<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Profile::factory()->create([
            'name' => config('admin.name', 'Admin'),
            'title' => 'Software Engineer',
            'greeting_text' => 'Welcome to my digital space, where I spill the beans on everything related to web development.',
            'bio' => 'I\'m a full stack developer passionate about building scalable web applications from front to back. I work across the entire technology stack, crafting seamless user experiences on the frontend while architecting robust server-side solutions. My expertise spans modern frameworks and databases, allowing me to transform ideas into fully functional digital products.',
            'image_path' => 'profile/profile.svg',
            'linkedin_url' => 'https://www.linkedin.com',
            'github_url' => 'https://github.com',
            'resume_path' => 'profile/resume.pdf',
        ]);
    }
}
