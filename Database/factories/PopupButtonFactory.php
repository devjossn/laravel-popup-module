<?php

namespace Modules\Popup\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PopupButtonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Popup\Entities\PopupButton::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'popup_id' => 1,
            'bt_name' => "That's fine." ,
        ];
    }
}

