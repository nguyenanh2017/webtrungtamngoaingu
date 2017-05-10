<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(NewsgroupsTableSeeder::class);
        $this->call(PermittionsTableSeeder::class);
        $this->call(NewsTableSeeder::class);

       
    }
}
