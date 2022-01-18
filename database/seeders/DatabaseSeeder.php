<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use bfinlay\SpreadsheetSeeder\SpreadsheetSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([UserTableSeeder::class]);
        $this->call([SpreadsheetSeeder::class]);
        $this->call([LanguageLineSeeder::class]);  
        $this->call([ItemTableSeeder::class]);      
    }
}
