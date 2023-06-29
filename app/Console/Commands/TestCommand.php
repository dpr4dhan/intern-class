<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $post = Post::all();
        print_r($post[0]->title);
        return Command::SUCCESS;
    }
}
