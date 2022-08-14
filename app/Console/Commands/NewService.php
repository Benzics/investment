<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class NewService extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:service {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This is used to create service classes in App\Services folder';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $service_name = $this->argument('name');

        $contents = "<?php\nnamespace App\Services;\n\n#Automatically generated service\n#Author: Benjamin Ojobo\n\n\nclass $service_name {\n\t//your methods here\n}\n\n\n";

        $file = fopen('app/Services/' . $service_name . '.php', 'w') or die('Cannot create service');
        fwrite($file, $contents);
        fclose($file);

        $this->info('Service generated successfully');
        return 0;
    }
}
