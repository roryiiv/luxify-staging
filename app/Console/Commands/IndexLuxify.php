<?php

namespace App\Console\Commands;

use Config;
use Illuminate\Console\Command;
use TNTSearch;

class IndexLuxify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'index';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Index the luxify tables';

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

        $indexer = TNTSearch::createIndex('luxify.index');
        $indexer->query('SELECT listings.id, listings.title, listings.html_desc, listings.description, countries.name, users.firstName, users.lastName FROM listings LEFT JOIN countries ON listings.countryId=countries.id LEFT JOIN users ON listings.userId=users.id;');
        $indexer->run();
    }
}