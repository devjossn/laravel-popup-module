<?php

namespace Modules\Popup\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PopupContentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Popup\Entities\PopupContent::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'popup_id' => 1,            
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
        ];
    }
}

