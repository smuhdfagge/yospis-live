<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    public function run(): void
    {
        $partners = [
            // Donors
            [
                'name' => 'Global Health Foundation',
                'type' => 'donor',
                'description' => 'International foundation supporting health initiatives in developing countries.',
                'website' => 'https://example.com/ghf',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'USAID Nigeria',
                'type' => 'donor',
                'description' => 'United States Agency for International Development - Nigeria Mission.',
                'website' => 'https://www.usaid.gov/nigeria',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'European Union',
                'type' => 'donor',
                'description' => 'EU development assistance supporting health and education programs.',
                'website' => 'https://europa.eu',
                'is_active' => true,
                'sort_order' => 3,
            ],

            // Implementing Partners
            [
                'name' => 'Health Alliance International',
                'type' => 'implementing',
                'description' => 'International health organization focused on strengthening health systems.',
                'website' => 'https://example.com/hai',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Community Health Network',
                'type' => 'implementing',
                'description' => 'Network of community-based organizations working on health promotion.',
                'website' => null,
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Youth Development Initiative',
                'type' => 'implementing',
                'description' => 'Local NGO focused on youth empowerment and development.',
                'website' => null,
                'is_active' => true,
                'sort_order' => 3,
            ],

            // Government
            [
                'name' => 'Kano State Ministry of Health',
                'type' => 'government',
                'description' => 'State government ministry responsible for health policy and services.',
                'website' => 'https://kanostate.gov.ng',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'National Agency for the Control of AIDS',
                'type' => 'government',
                'description' => 'Federal agency coordinating Nigeria\'s HIV/AIDS response.',
                'website' => 'https://naca.gov.ng',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Federal Ministry of Health',
                'type' => 'government',
                'description' => 'Federal ministry overseeing national health policy.',
                'website' => 'https://health.gov.ng',
                'is_active' => true,
                'sort_order' => 3,
            ],

            // Media
            [
                'name' => 'Freedom Radio Kano',
                'type' => 'media',
                'description' => 'Leading radio station in Kano providing platform for health programming.',
                'website' => 'https://freedomradio.ng',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Pyramid FM',
                'type' => 'media',
                'description' => 'Popular FM station broadcasting in Northern Nigeria.',
                'website' => null,
                'is_active' => true,
                'sort_order' => 2,
            ],

            // Corporate
            [
                'name' => 'First Bank Nigeria',
                'type' => 'corporate',
                'description' => 'Corporate social responsibility partner supporting community health.',
                'website' => 'https://firstbanknigeria.com',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'MTN Foundation',
                'type' => 'corporate',
                'description' => 'Telecommunications company foundation supporting health initiatives.',
                'website' => 'https://mtn.ng/foundation',
                'is_active' => true,
                'sort_order' => 2,
            ],
        ];

        foreach ($partners as $partner) {
            Partner::create($partner);
        }
    }
}
