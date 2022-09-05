<?php

namespace Modules\Popup\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PopupAnimationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Popup\Entities\PopupAnimation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'popup_id' => 1,
            'animation' => "on" ,
        ];
    }
}

