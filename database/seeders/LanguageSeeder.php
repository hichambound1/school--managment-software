<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $AR= Language::firstOrCreate(
            [ 'name' => 'arabic' ],
            [ 'symbole' => 'AR' ]
        );
        $FR= Language::firstOrCreate(
            [ 'name' => 'frensh' ],
            [ 'symbole' => 'FR' ]
        );
        $EN= Language::firstOrCreate(
            [ 'name' => 'english' ],
            [ 'symbole' => 'EN' ]
        );
    }
}
