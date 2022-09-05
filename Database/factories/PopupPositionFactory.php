<?php

namespace Modules\Popup\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PopupPositionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Popup\Entities\PopupPosition::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'popup_id' => 1,
            'side' => "topRight" ,
            'v_center' => "off" ,
        ];
    }
}
