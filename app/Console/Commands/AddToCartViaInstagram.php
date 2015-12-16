<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AddToCartViaInstagram extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'addtocart:comment';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scaning Instagram Comments in order to add cart';

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
        echo 'hello';
    }
}
