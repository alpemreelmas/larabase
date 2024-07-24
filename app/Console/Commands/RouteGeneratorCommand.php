<?php

namespace App\Console\Commands;

use App\Http\RouteGenerator;
use Illuminate\Console\Command;

class RouteGeneratorCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'larabase:generate-routes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generating automatic modules routes.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Generating routes...");
        try{
            (new RouteGenerator())->run();
            $this->info("Routes are generated successfully.");
        }catch (\Exception $e){
            $this->error($e->getMessage());
        }
    }
}
