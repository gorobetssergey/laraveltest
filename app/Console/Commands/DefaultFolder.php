<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class DefaultFolder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:folder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add folder for images';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if (!is_dir(storage_path('app/public/images/articles'))) {
            Storage::disk('public')->makeDirectory('images/articles');
        }
    }
}
