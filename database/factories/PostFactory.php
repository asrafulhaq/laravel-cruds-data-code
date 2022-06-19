<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'     => $this -> faker -> sentence(5),
            'desc'      => $this -> faker -> paragraph(15),
            'image'     => 'https://akm-img-a-in.tosshub.com/indiatoday/images/story/202104/photo-1531564701487-f238224b7c_1200x768.jpeg?q_6io2tiCIj7McK_gRABr11yUCEqtSAC&size=1200:675',
            'author'    => $this -> faker -> name('female') 
        ];
    }
}


