<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();

        $articles = [
            [
                'title' => 'YOSPIS Launches New Youth Health Initiative in Kano',
                'excerpt' => 'A groundbreaking program aimed at educating over 10,000 young people about HIV/AIDS prevention and reproductive health.',
                'content' => "YOSPIS is proud to announce the launch of our new Youth Health Initiative, a comprehensive program designed to educate and empower young people across Kano State.\n\nThe initiative, which kicked off last week, aims to reach over 10,000 young people with critical information about HIV/AIDS prevention, reproductive health, and healthy lifestyle choices.\n\nWorking in partnership with local schools, community centers, and religious institutions, our trained facilitators will conduct interactive workshops and peer education sessions.\n\n\"This program represents a significant step forward in our mission to create healthier communities,\" said the Executive Director. \"By empowering young people with knowledge, we're investing in Nigeria's future.\"\n\nThe initiative includes:\n- School-based health education programs\n- Community outreach activities\n- Peer education training\n- Distribution of educational materials\n- Free health screenings\n\nWe invite community members, parents, and stakeholders to support this important work.",
                'status' => 'published',
                'published_at' => now()->subDays(3),
            ],
            [
                'title' => 'Radio Program Reaches 40,000 Listeners Weekly',
                'excerpt' => 'Our health education radio show continues to make impact, reaching thousands of listeners every week with life-saving information.',
                'content' => "Our weekly radio health education program has achieved a remarkable milestone, now reaching an estimated 40,000 listeners across Northern Nigeria.\n\nThe program, broadcast every Saturday on local FM stations, covers topics ranging from disease prevention to nutrition and mental health.\n\n\"Radio remains one of the most effective ways to reach our communities,\" explains our Communications Officer. \"It transcends barriers of literacy and geography.\"\n\nRecent episodes have covered:\n- Understanding and preventing malaria\n- Nutrition for children under five\n- Managing diabetes and hypertension\n- Mental health awareness\n- COVID-19 prevention measures\n\nListeners can call in during the live broadcast to ask questions and share their experiences.\n\nThe program is supported by our donors and partners who understand the power of mass media in health education.",
                'status' => 'published',
                'published_at' => now()->subDays(7),
            ],
            [
                'title' => 'Community Health Workers Training Completed',
                'excerpt' => '50 community health workers graduated from our intensive training program, ready to serve their communities.',
                'content' => "YOSPIS has successfully trained 50 community health workers who will serve as frontline advocates for public health in their communities.\n\nThe three-week intensive training program covered:\n- Basic health assessment\n- First aid and emergency response\n- Health education and communication\n- Community mobilization\n- Referral systems and follow-up\n\nThe graduates, representing 25 communities across Kano State, received certificates and starter kits containing essential supplies.\n\n\"These community health workers are the backbone of our grassroots approach,\" said the Training Coordinator. \"They live in the communities they serve and understand the unique challenges their neighbors face.\"\n\nEach trained worker is expected to reach at least 200 households in their first year of service.\n\nThe program was made possible through generous support from our international partners.",
                'status' => 'published',
                'published_at' => now()->subDays(14),
            ],
            [
                'title' => 'Partnership Announcement: Expanding Our Impact',
                'excerpt' => 'YOSPIS signs MOU with international health organization to expand programs across Northern Nigeria.',
                'content' => "We are excited to announce a new strategic partnership that will significantly expand our reach and impact across Northern Nigeria.\n\nThe Memorandum of Understanding, signed last week, will enable us to:\n- Scale up our youth education programs\n- Enhance our community health worker network\n- Improve our monitoring and evaluation systems\n- Develop new innovative health interventions\n\nThis partnership represents a vote of confidence in our work over the past 27 years and our commitment to evidence-based approaches.\n\n\"Partnerships like this are essential for sustainable impact,\" noted our Executive Director. \"Together, we can achieve more than any organization can alone.\"\n\nImplementation will begin next quarter with an initial focus on rural communities in Kano and neighboring states.\n\nStay tuned for updates on specific program activities and how you can get involved.",
                'status' => 'published',
                'published_at' => now()->subDays(21),
            ],
            [
                'title' => 'World Health Day 2024: Celebrating Community Health',
                'excerpt' => 'YOSPIS marks World Health Day with community events, free health screenings, and awareness campaigns.',
                'content' => "YOSPIS joined the global community in celebrating World Health Day 2024 with a series of events focused on our local communities.\n\nActivities included:\n- Free health screenings at 10 locations\n- Health education sessions in schools\n- Community walks promoting physical activity\n- Distribution of educational materials\n- Radio programs and social media campaigns\n\nOver 2,000 community members participated in the day's activities, with 500 receiving free health screenings including blood pressure checks, blood sugar tests, and HIV testing.\n\n\"World Health Day reminds us that health is a fundamental right,\" said our Program Manager. \"Through events like this, we work to make that right a reality for everyone in our community.\"\n\nThank you to all the volunteers, partners, and community members who made this day a success.",
                'status' => 'published',
                'published_at' => now()->subDays(30),
            ],
            [
                'title' => 'Upcoming: Youth Leadership Conference 2024',
                'excerpt' => 'Save the date for our annual youth leadership conference bringing together young change-makers from across the region.',
                'content' => "YOSPIS is pleased to announce our upcoming Youth Leadership Conference 2024, scheduled for next month.\n\nThis two-day event will bring together young leaders, health advocates, and community change-makers from across Northern Nigeria.\n\nConference highlights:\n- Keynote speeches from renowned health experts\n- Interactive workshops on leadership and advocacy\n- Networking opportunities\n- Project showcases by youth-led initiatives\n- Awards ceremony recognizing outstanding young leaders\n\nRegistration is now open for youth aged 18-35 who are passionate about health and community development.\n\nLimited scholarships are available for participants from underserved communities.\n\nThe conference will be held at the YOSPIS Community Center in Kano City.\n\nFor registration and more information, please contact our office or visit our social media pages.",
                'status' => 'draft',
                'published_at' => null,
            ],
        ];

        foreach ($articles as $article) {
            Article::create([
                'user_id' => $user?->id ?? 1,
                'slug' => Str::slug($article['title']),
                ...$article,
            ]);
        }
    }
}
