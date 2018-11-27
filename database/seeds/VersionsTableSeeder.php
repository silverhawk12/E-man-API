<?php

use Illuminate\Database\Seeder;

class VersionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('versions')->insert([
            'version' => '1.03.45',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
