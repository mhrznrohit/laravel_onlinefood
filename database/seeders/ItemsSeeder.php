<?php

namespace Database\Seeders;

use App\Models\item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Factories\ItemFactory;

class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        item::create([
            'title'=> 'C Momo',
            'slug'=>'momo',
            'category_id'=>'1',
            'description'=> 'asdfkjflkgs',
            'status'=> '1',
            'price'=> '200',
            'image'=> '123244.jpg',


        ]);

    }
}
