<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Youth Health Education Program',
                'description' => 'Comprehensive health education initiative reaching 10,000+ young people annually across Kano State.',
                'content' => "The Youth Health Education Program is our flagship initiative, designed to empower young Nigerians with knowledge and skills for healthy living.\n\nProgram Components:\n- School-based health education\n- Peer education and mentorship\n- Community outreach activities\n- Interactive workshops and seminars\n- Educational materials distribution\n\nTopics Covered:\n- HIV/AIDS prevention and awareness\n- Reproductive health\n- Nutrition and healthy eating\n- Mental health and well-being\n- Substance abuse prevention\n- Personal hygiene and disease prevention\n\nOur trained facilitators use culturally appropriate, evidence-based curricula to engage young people in meaningful conversations about health.\n\nThe program has reached over 100,000 young people since its inception and continues to expand to new schools and communities each year.",
                'status' => 'ongoing',
                'location' => 'Kano State, Nigeria',
                'start_date' => now()->subYears(5),
                'end_date' => null,
                'beneficiaries' => '100,000+ youth',
                'is_featured' => true,
            ],
            [
                'title' => 'Community Health Radio Program',
                'description' => 'Weekly radio broadcasts reaching 40,000+ listeners with health information and awareness.',
                'content' => "Our Community Health Radio Program harnesses the power of radio to deliver vital health information to communities across Northern Nigeria.\n\nProgram Features:\n- Weekly broadcasts on local FM stations\n- Expert interviews and panel discussions\n- Call-in segments for listener questions\n- Health tips and practical advice\n- Local language programming\n\nTopics Covered:\n- Disease prevention and control\n- Maternal and child health\n- Nutrition and food safety\n- Environmental health\n- Healthcare access information\n\nThe program reaches an estimated 40,000 listeners weekly, including those in remote areas with limited access to health facilities.\n\nListener feedback has been overwhelmingly positive, with many reporting behavior changes as a result of information received through the program.",
                'status' => 'ongoing',
                'location' => 'Northern Nigeria',
                'start_date' => now()->subYears(3),
                'end_date' => null,
                'beneficiaries' => '40,000+ weekly listeners',
                'is_featured' => true,
            ],
            [
                'title' => 'Community Health Workers Training',
                'description' => 'Training program developing local health advocates to serve as frontline health workers in their communities.',
                'content' => "The Community Health Workers Training Program develops local capacity for grassroots health promotion and disease prevention.\n\nTraining Components:\n- Basic health assessment\n- First aid and emergency response\n- Health education and communication\n- Community mobilization techniques\n- Referral and follow-up systems\n\nProgram Outcomes:\n- 500+ community health workers trained\n- Coverage of 250+ communities\n- Improved health-seeking behavior\n- Early disease detection and referral\n- Strengthened community health systems\n\nGraduates receive starter kits and ongoing support through refresher trainings and supervision visits.\n\nThe program has been recognized as a model for community-based health programming in Nigeria.",
                'status' => 'ongoing',
                'location' => 'Kano and neighboring states',
                'start_date' => now()->subYears(4),
                'end_date' => null,
                'beneficiaries' => '500+ health workers trained',
                'is_featured' => false,
            ],
            [
                'title' => 'HIV/AIDS Awareness Campaign 2020-2023',
                'description' => 'Multi-year campaign that reached 50,000+ community members with HIV prevention messages and free testing.',
                'content' => "This comprehensive HIV/AIDS awareness campaign was implemented over three years, making significant strides in prevention and awareness.\n\nCampaign Activities:\n- Community sensitization events\n- Free HIV testing and counseling\n- Distribution of prevention materials\n- Support group establishment\n- Media campaigns (radio, TV, print)\n\nKey Achievements:\n- 50,000+ people reached with HIV messages\n- 15,000+ free HIV tests conducted\n- 1,000+ people linked to care and treatment\n- 20 support groups established\n- Reduced stigma in target communities\n\nThe campaign demonstrated the power of community engagement in HIV prevention and served as a model for similar initiatives across the region.\n\nLessons learned have been documented and shared with partner organizations.",
                'status' => 'completed',
                'location' => 'Kano State, Nigeria',
                'start_date' => now()->subYears(4),
                'end_date' => now()->subYear(),
                'beneficiaries' => '50,000+ community members',
                'is_featured' => false,
            ],
            [
                'title' => 'COVID-19 Response Initiative',
                'description' => 'Emergency response program providing PPE, awareness, and support during the COVID-19 pandemic.',
                'content' => "When COVID-19 emerged as a global threat, YOSPIS quickly mobilized to protect our communities.\n\nResponse Activities:\n- Distribution of PPE and hygiene supplies\n- Community awareness campaigns\n- Support for healthcare workers\n- Economic support for affected families\n- Coordination with government agencies\n\nImpact:\n- 100,000+ masks distributed\n- 50,000+ bottles of hand sanitizer provided\n- 500+ healthcare workers supported\n- 1,000+ families received food support\n- Millions reached through awareness campaigns\n\nThe initiative demonstrated YOSPIS's ability to respond rapidly to health emergencies while maintaining our commitment to evidence-based approaches.\n\nWe continue to support COVID-19 prevention and vaccination efforts.",
                'status' => 'completed',
                'location' => 'Kano State, Nigeria',
                'start_date' => now()->subYears(3),
                'end_date' => now()->subYears(2),
                'beneficiaries' => '100,000+ community members',
                'is_featured' => false,
            ],
            [
                'title' => 'Digital Health Literacy Project',
                'description' => 'Upcoming initiative to improve digital health literacy among youth, leveraging technology for health education.',
                'content' => "The Digital Health Literacy Project is an innovative new initiative launching next year.\n\nProject Goals:\n- Improve digital health literacy among youth\n- Develop mobile health education tools\n- Create online learning resources\n- Train youth as digital health ambassadors\n- Combat health misinformation online\n\nPlanned Activities:\n- Development of health education apps\n- Online training modules\n- Social media campaigns\n- Digital skills workshops\n- Partnership with tech companies\n\nExpected Impact:\n- 20,000 youth trained in digital health literacy\n- Mobile app reaching 50,000+ users\n- Reduced susceptibility to health misinformation\n- Improved health-seeking behavior\n\nThis project represents the next evolution of our health education work, meeting young people where they are—online.",
                'status' => 'upcoming',
                'location' => 'Nigeria (Nationwide)',
                'start_date' => now()->addMonths(3),
                'end_date' => now()->addYears(2),
                'beneficiaries' => 'Target: 50,000+ youth',
                'is_featured' => true,
            ],
        ];

        foreach ($projects as $project) {
            Project::create([
                'slug' => Str::slug($project['title']),
                ...$project,
            ]);
        }
    }
}
