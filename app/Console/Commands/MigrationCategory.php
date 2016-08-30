<?php

namespace App\Console\Commands;



use Illuminate\Console\Command;
use DB;

class MigrationCategory extends Command
{
    
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:category';

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
        // echo "migrate on";
       $oldcat = DB::table('categories')->get();

        //$old = DB::table('listings')->where('new_category',null)->get();
        
        //$status = array();
        foreach ($oldcat as $listing) {
            $old = DB::table('listings')->where('categoryId',$listing->id)->get();
            for($x = 0; $x < count($old); $x++){
                switch ($old[$x]->categoryId) {
                    case '9':
                        $new = '134';
                        break;
                    case '10':
                        $new = '66';
                        break;
                    case '11':
                        $new = '86';
                        break;
                    case '12':
                        $new = '18';
                        break;
                    case '13':
                        $new = '96';
                        break;
                    case '14':
                        $new = '48';
                        break;
                    case '15':
                        $new = '60';
                        break;
                    case '16':
                        $new = '49';
                        break;
                    case '17':
                        $new = '93';
                        break;
                    case '18':
                        $new = '91';
                        break;
                    case '19':
                        $new = '88';
                        break;
                    case '20':
                        $new = '87';
                        break;
                    case '21':
                        $new = '100';
                        break;
                    case '22':
                        $new = '103';
                        break;
                    case '25':
                        $new = '100';
                        break;
                    case '26':
                        $new = '107';
                        break;
                    case '27':
                        $new = '108';
                        break;
                    case '28':
                        $new = '107';
                        break;
                    case '29':
                        $new = '107';
                        break;
                    case '30':
                        $new = '107';
                        break;
                    case '31':
                        $new = '77';
                        break;
                    case '33':
                        $new = '77';
                        break;
                    case '34':
                        $new = '77';
                        break;
                    case '35':
                        $new = '107';
                        break;
                    case '36':
                        $new = '76';
                        break;
                    case '37':
                        $new = '74';
                        break;
                    case '38':
                        $new = '73';
                        break;
                    case '39':
                        $new = '71';
                        break;
                    case '40':
                        $new = '99';
                        break;

                }
            

                $update = DB::table('listings')->where('id',$old[$x]->id)->update([
                    'new_category' => $new]);
                if($update){
                    echo "success</br>";
                      //$status[] = "success";
                }else{
                    echo "error</br>";
                    //$status[] =  "error";
                }
            }
        }    
    }
}
