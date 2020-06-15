<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Seed the countries
        $this->call(CountriesTableSeeder::class);
    
        // Seed the Time Zones
        $this->call(TimeZonesTableSeeder::class);
    
        // Seed the Languages
        $this->call(LanguagesTableSeeder::class);
    }
}
