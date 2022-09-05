<?php

namespace Modules\Popup\Database\factories;

use Modules\Popup\Entities\Popup;
use Modules\Popup\Entities\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class PopupFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Popup::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = (new \Faker\Factory())::create();

        return [
            'id' => 1,
            'title' => "test@gmail.com",
        ];
    }
}
