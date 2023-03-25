<?php

namespace Database\Seeders;

use App\Models\Option;
use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Create some plans with options
        $plans = [
            [
                'name_en' => 'Basic Plan',
                'name_ar' => 'الأساسية',
                'name_fr' => 'Core',
                'description_en' => 'A simple plan with basic features for small schools',
                'description_ar' => 'خطة بسيطة مع الميزات الأساسية للمدارس الصغيرة',
                'description_fr' => 'Un plan simple avec des fonctionnalités de base pour les petites écoles',
                'price' => 99.99,
                'unit' => '$',
                'per'=>'Year',
                'options' => [
                    [
                        'key' => 'users',
                        'value' => 200,
                        'name_en' => 'up to 200 user',
                        'name_ar' => 'حتى 200 مستخدم',
                        'name_fr' => "jusqu'à 200 utilisateurs",
                        'description_en' => 'You can create until 200 users',
                        'description_ar' => 'يمكنك إنشاء حتى 200 مستخدم',
                        'description_fr' => "vous pouvez créer jusqu'à 200 utilisateurs",
                    ],
                    [
                        'key' => 'school year',
                        'value' => 1,
                        'name_en' => 'one school year',
                        'name_ar' => 'عام دراسي واحد',
                        'name_fr' => "une seul année scolaire",
                        'description_en' => 'You can create one school year',
                        'description_ar' =>'يمكنك إنشاء عام دراسي واحد',
                        'description_fr' => "Vous pouvez créer une année scolaire",
                    ],
                    [
                        'key' => 'schools',
                        'value' => 1,
                        'name_en' => 'one school',
                        'name_ar' => 'مدرسة واحدة',
                        'name_fr' => "une seul école",
                        'description_en' => 'You can create one school',
                        'description_ar' => 'يمكنك إنشاء مدرسة واحدة',
                        'description_fr' => "Vous pouvez créer une école",
                    ],
                    [
                        'key' => 'cars',
                        'value' => 5,
                        'name_en' => '5 cars',
                        'name_ar' => '5 سيارات',
                        'name_fr' => "5 voitures",
                        'description_en' => 'You can create 5 cars',
                        'description_ar' => 'يمكنك إنشاء 5 سيارات',
                        'description_fr' => "Vous pouvez créer 5 voitures",
                    ],

                ],
            ],
            [
                'name_en' => 'Premium Plan',
                'name_ar' => 'خطة متميزة',
                'name_fr' => 'Forfait Premium',
                'description_en' => 'A premium plan with advanced features',
                'description_ar' => 'خطة متميزة مع ميزات متقدمة',
                'description_fr' => "Un plan premium avec des fonctionnalités avancées",
                'price' => 199.99,
                'unit' => '$',
                'per'=>'Year',
                'options' => [
                    [
                        'key' => 'users',
                        'value' => 400,
                        'name_en' => 'up to 400 user',
                        'name_ar' => 'حتى 400 مستخدم',
                        'name_fr' => "jusqu'à 400 utilisateurs",
                        'description_en' => 'You can create until 400 users',
                        'description_ar' => 'يمكنك إنشاء حتى 400 مستخدم',
                        'description_fr' => "vous pouvez créer jusqu'à 400 utilisateurs",
                    ],
                    [
                        'key' => 'school year',
                        'value' => 2,
                        'name_en' => 'two school year',
                        'name_ar' =>'سنتان دراسيتان',
                        'name_fr' => "deux année scolaire",
                        'description_en' => 'You can create two school year',
                        'description_ar' =>'يمكنك إنشاء سنتان دراسيتان',
                        'description_fr' => "Vous pouvez créer deux année scolaire",
                    ],
                    [
                        'key' => 'schools',
                        'value' => 1,
                        'name_en' => 'one school',
                        'name_ar' => 'مدرسة واحدة',
                        'name_fr' => "une seul école",
                        'description_en' => 'You can create one school',
                        'description_ar' => 'يمكنك إنشاء مدرسة واحدة',
                        'description_fr' => "Vous pouvez créer une école",
                    ],
                    [
                        'key' => 'cars',
                        'value' => 20,
                        'name_en' => '20 cars',
                        'name_ar' => '20 سيارات',
                        'name_fr' => "20 voitures",
                        'description_en' => 'You can create 20 cars',
                        'description_ar' => 'يمكنك إنشاء 20 سيارات',
                        'description_fr' => "Vous pouvez créer 20 voitures",
                    ],

                ],
            ],
            [
                'name_en' => 'Ultimate Plan',
                'name_ar' => 'الخطة النهائية',
                'name_fr' => 'plan ultime',
                'description_en' => 'The ultimate plan with all features',
                'description_ar' => 'الخطة النهائية بكل الميزات',
                'description_fr' => 'le plan ultime avec toutes les fonctionnalités',
                'price' => 299.99,
                'unit' => '$',
                'per'=>'Year',
                'options' => [
                    [
                        'key' => 'users',
                        'value' => 2000,
                        'name_en' => 'up to 2000 user',
                        'name_ar' => 'حتى 2000 مستخدم',
                        'name_fr' => "jusqu'à 2000 utilisateurs",
                        'description_en' => 'You can create until 2000 users',
                        'description_ar' => 'يمكنك إنشاء حتى 2000 مستخدم',
                        'description_fr' => "vous pouvez créer jusqu'à 2000 utilisateurs",
                    ],
                    [
                        'key' => 'school year',
                        'value' => 10,
                        'name_en' => 'ten school year',
                        'name_ar' =>'عشر سنوات دراسية',
                        'name_fr' => "dix année scolaire",
                        'description_en' => 'You can create ten school year',
                        'description_ar' =>'يمكنك إنشاء عشر سنوات دراسية',
                        'description_fr' => "Vous pouvez créer dix année scolaire",
                    ],
                    [
                        'key' => 'schools',
                        'value' => 10,
                        'name_en' => '10 school',
                        'name_ar' => 'عشر مدارس',
                        'name_fr' => "dix écoles",
                        'description_en' => 'You can create 10 school',
                        'description_ar' => 'يمكنك إنشاء  عشر مدارس',
                        'description_fr' => "Vous pouvez créer dix écoles",
                    ],
                    [
                        'key' => 'cars',
                        'value' => 200,
                        'name_en' => '200 cars',
                        'name_ar' => '200 سيارات',
                        'name_fr' => "200 voitures",
                        'description_en' => 'You can create 200 cars',
                        'description_ar' => 'يمكنك إنشاء 200 سيارات',
                        'description_fr' => "Vous pouvez créer 200 voitures",
                    ],
                ],

            ],
        ];
        Option::whereNotNull('id')->forceDelete();
        Plan::whereNotNull('id')->forceDelete();

        foreach ($plans as $planData) {
            $plan = Plan::create([
                'name_en' => $planData['name_en'],
                'name_ar' => $planData['name_ar'],
                'name_fr' => $planData['name_fr'],
                'description_en' => $planData['description_en'],
                'description_ar' => $planData['description_ar'],
                'description_fr' => $planData['description_fr'],
                'price' => $planData['price'],
                'per' => $planData['per'],
                'unit' => $planData['unit'],
            ]);
            $plan->save();

            foreach ($planData['options'] as $optionData) {
                $option = Option::create([
                    'plan_id' => $plan->id,
                    'name_en' => $optionData['name_en'],
                    'name_ar' => $optionData['name_ar'],
                    'name_fr' => $optionData['name_fr'],
                    'description_en' => $optionData['description_en'],
                    'description_ar' => $optionData['description_ar'],
                    'description_fr' => $optionData['description_fr'],
                    'key' => $optionData['key'],
                    'value' => $optionData['value'],
                ]);
                $plan->options()->save($option);
            }
        }

    }
}
