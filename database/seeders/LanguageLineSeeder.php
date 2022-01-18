<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\TranslationLoader\LanguageLine;

class LanguageLineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LanguageLine::create([
			'group' => 'validation',
			'key' => 'list',
			'text' => ['en' => 'Company List', 'id' => 'Daftar Perusahaan'],
		]);

    }
}




