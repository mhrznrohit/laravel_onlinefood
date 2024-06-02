<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Define the path where the images should be saved
        $imagePath = storage_path('app/public/storage/user');

        // Ensure the directory exists
        if (!file_exists($imagePath)) {
            mkdir($imagePath, 0755, true);
        }

        // Generate a random image and save it to the specified directory
        $imageFullPath = $this->faker->image($imagePath, 200, 300, null, false);

        // Generate the URL or path for the image
        $imageUrl = Storage::url('user/' . $imageFullPath);

        $title = $this->faker->word;

        return [
            'title' => $title,
            'slug' => $title, // Set slug to be the same as title
            'price' => $this->faker->numberBetween(100, 1000),
            'category_id' => $this->faker->numberBetween(1, 3),
            'description' => $this->faker->sentence,
            'image' => $imageUrl, // Local image URL
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
