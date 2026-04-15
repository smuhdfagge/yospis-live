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
            [
                'title' => 'Events',
                'description' => 'Community outreach events, workshops, and awareness campaigns.',
                'category' => 'events',
                'is_published' => true,
                'sort_order' => 1,
                'images' => [
                    'https://images.unsplash.com/photo-1559027615-cd4628902d4a?w=800',
                    'https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=800',
                    'https://images.unsplash.com/photo-1576091160550-2173dba999ef?w=800',
                    'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?w=800',
                ],
            ],
            [
                'title' => 'Projects',
                'description' => 'Our impact projects including clean water, health screening, and education.',
                'category' => 'projects',
                'is_published' => true,
                'sort_order' => 2,
                'images' => [
                    'https://images.unsplash.com/photo-1541544537156-7627a7a4aa1c?w=800',
                    'https://images.unsplash.com/photo-1532629345422-7515f3d16bb6?w=800',
                    'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?w=800',
                ],
            ],
            [
                'title' => 'Our Team',
                'description' => 'Our dedicated leadership team and volunteers working together.',
                'category' => 'team',
                'is_published' => true,
                'sort_order' => 3,
                'images' => [
                    'https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=800',
                    'https://images.unsplash.com/photo-1552664730-d307ca884978?w=800',
                    'https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=800',
                ],
            ],
            [
                'title' => 'Community Engagement',
                'description' => 'Engaging with local community members and empowering youth.',
                'category' => 'general',
                'is_published' => true,
                'sort_order' => 4,
                'images' => [
                    'https://images.unsplash.com/photo-1469571486292-0ba58a3f068b?w=800',
                    'https://images.unsplash.com/photo-1491438590914-bc09fcaaf77a?w=800',
                ],
            ],
        ];

        foreach ($galleries as $data) {
            $images = $data['images'];
            unset($data['images']);

            $gallery = Gallery::create($data);

            foreach ($images as $i => $url) {
                $gallery->images()->create([
                    'image' => $url,
                    'sort_order' => $i,
                ]);
            }
        }
    }
}
