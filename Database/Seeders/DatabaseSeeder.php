<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the Modules\Popup\Entitieslication's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PoupTableSeeder::class);
        $this->call(PopupAnimationSeeder::class);
    }
}
