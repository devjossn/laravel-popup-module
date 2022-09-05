<?php

use Modules\Popup\Entities\Popup;
use Illuminate\Database\Seeder;

class PopupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Popup::factory(1)->create();
    }
}
