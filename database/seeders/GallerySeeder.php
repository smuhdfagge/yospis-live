<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $galleries = [
            // Events Category
            [
                'title' => 'World AIDS Day Awareness Campaign 2024',
                'description' => 'Community outreach and education event held on December 1st, 2024, reaching over 500 youth with HIV/AIDS awareness messages.',
                'image' => 'https://images.unsplash.com/photo-1559027615-cd4628902d4a?w=800',
                'category' => 'events',
                'is_published' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'Youth Health Summit 2024',
                'description' => 'Annual youth health summit bringing together young leaders to discuss pressing health challenges.',
                'image' => 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=800',
                'category' => 'events',
                'is_published' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'Community Health Screening Day',
                'description' => 'Free health screening event providing blood pressure, blood sugar, and BMI checks to community members.',
                'image' => 'https://images.unsplash.com/photo-1576091160550-2173dba999ef?w=800',
                'category' => 'events',
                'is_published' => true,
                'sort_order' => 3,
            ],
            [
                'title' => 'Drug Abuse Prevention Workshop',
                'description' => 'Interactive workshop educating secondary school students about the dangers of substance abuse.',
                'image' => 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?w=800',
                'category' => 'events',
                'is_published' => true,
                'sort_order' => 4,
            ],
            
            // Projects Category
            [
                'title' => 'Clean Water Initiative Launch',
                'description' => 'Launching of clean water facilities in rural communities to prevent waterborne diseases.',
                'image' => 'https://images.unsplash.com/photo-1541544537156-7627a7a4aa1c?w=800',
                'category' => 'projects',
                'is_published' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'Mosquito Net Distribution',
                'description' => 'Distribution of treated mosquito nets to families in malaria-endemic areas.',
                'image' => 'https://images.unsplash.com/photo-1532629345422-7515f3d16bb6?w=800',
                'category' => 'projects',
                'is_published' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'School Health Club Setup',
                'description' => 'Establishing health clubs in schools to promote peer-to-peer health education.',
                'image' => 'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?w=800',
                'category' => 'projects',
                'is_published' => true,
                'sort_order' => 3,
            ],
            
            // Team Category
            [
                'title' => 'YOSPIS Leadership Team',
                'description' => 'Our dedicated leadership team working together to drive positive change in communities.',
                'image' => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=800',
                'category' => 'team',
                'is_published' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'Volunteer Training Session',
                'description' => 'Training new volunteers on community health education techniques and best practices.',
                'image' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?w=800',
                'category' => 'team',
                'is_published' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'Team Building Retreat',
                'description' => 'Annual team building retreat to strengthen bonds and plan for upcoming initiatives.',
                'image' => 'https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=800',
                'category' => 'team',
                'is_published' => true,
                'sort_order' => 3,
            ],
            
            // General Category
            [
                'title' => 'Community Engagement',
                'description' => 'Engaging with local community members during a health awareness campaign.',
                'image' => 'https://images.unsplash.com/photo-1469571486292-0ba58a3f068b?w=800',
                'category' => 'general',
                'is_published' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'Youth Empowerment Session',
                'description' => 'Empowering young people with knowledge and skills for healthy living.',
                'image' => 'https://images.unsplash.com/photo-1491438590914-bc09fcaaf77a?w=800',
                'category' => 'general',
                'is_published' => true,
                'sort_order' => 2,
            ],
        ];

        foreach ($galleries as $gallery) {
            Gallery::create($gallery);
        }
    }
}
