<?php

namespace App\Console\Commands;



use Illuminate\Console\Command;
use DB;

class MigrationCategoryMeta extends Command
{
    
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:categorymeta';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $today = date("Y-m-d H:i:s");
        $old = DB::table('formfields')->get();
        
        for($x=0; $x<count($old); $x++){
            $new = DB::table('category_meta')->insert([
                'title'=> $old[$x]->label,
                'name'=> $old[$x]->label,
                'label' => $old[$x]->label,
                'meta_type' => $old[$x]->type,
                'meta_value' => $old[$x]->optionValues,
                'created_by' => 1292,
                'created_at' => $today,
                'updated_at' => $today
                ]);
            if($new){
                echo "success listing #" . $old[$x]->id . "\n";
                    
            }else{
                echo "error listing #" . $old[$x]->id . "\n";                
            }
        }

    }
}
