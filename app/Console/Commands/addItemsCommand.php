<?php

namespace App\Console\Commands;

use App\Models\Item;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class addItemsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'item:add';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Items Added';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $data['title']=Str::random(10);
        $data['slug']=$data['title'];
        $data['price']= rand(100, 1000);
        $data['category_id']=rand(1,3);
        $data['description']=Str::random(20);
        $data['image']='https://picsum.photos/200/300';
        $data['created_at']= now()->format('Y-m-d H:i:s');
        $data['updated_at']= now()->format('Y-m-d H:i:s');

        Item :: create($data);
        $this->info('Sucess');
    }
}
