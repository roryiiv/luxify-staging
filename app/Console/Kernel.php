<?php

namespace App\Console;

Use DB;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        // Commands\Inspire::class,
    	Commands\Index::class,
        Commands\MigrationCategory::class,
        Commands\MigrationOptional::class,
        Commands\MigrationCategoryMeta::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule){
        // $schedule->command('inspire')
        //          ->hourly();

        $schedule->call(function () {
            $listed = DB::table('currencies')
            ->get();

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_URL, 'https://openexchangerates.org/api/latest.json?app_id=9dfc90f4fd60462d9088aa0039ccb30d&base=USD');
            $result = curl_exec($ch);
            curl_close($ch);

            $obj = json_decode($result);
            // echo $result->access_token;

            $rates = $obj->rates;

            foreach($listed as $curr){
                $_curr = $curr->code;
                $rate = $rates->$_curr;
                DB::table('currencies')
                ->where('id', $curr->id)
                ->update(['rate' => $rate]);
            }
        })->twiceDaily(1, 13);

        $schedule->command('index:luxify --force')->daily();
    }
}
