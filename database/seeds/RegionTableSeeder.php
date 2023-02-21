<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class RegionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $SQL = database_path('sql/region.sql');

        DB::unprepared(file_get_contents($SQL));

    }
}
