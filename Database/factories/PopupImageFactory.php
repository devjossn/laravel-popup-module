<?php

namespace Modules\Popup\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PopupImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Popup\Entities\PopupImage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'popup_id' => 1,
            'image' => "https://cdn-icons-png.flaticon.com/512/1047/1047711.png" ,
        ];
    }
}

