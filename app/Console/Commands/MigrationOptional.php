<?php

namespace App\Console\Commands;



use Illuminate\Console\Command;
use DB;

class MigrationOptional extends Command
{
    
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:optional';

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

        //contoh jika hanya satu category dan listing yang diambil

       /* $cat = DB::table('category_2')->where('id',76)->first();

        $list = DB:: table('listings')->where('new_category',$cat->id)->first();
         
        $extra = DB::table('extrainfos')
        ->leftJoin('formgroups','formgroups.id','=','extrainfos.formgroupId')
        ->join('formfields','formfields.id','=','formgroups.formfieldId')
        ->where('listingId',$list->id)
        ->get();
         
        
        $arr = array();
        foreach($extra as $value){
            $arr[] = array(
                'id' => $value->formfieldId,
                'title'=> $value->title,
                'name'=> $value->name,
                'label'=> $value->label,
                'value'=> $value->value
            );
        }
        $done = json_encode($arr);*/
       
        $cat = DB::table('category_2')->take(100)->get();
        
        for($x=0; $x<count($cat); $x++){
        $list = DB:: table('listings')
        ->leftJoin('extrainfos','extrainfos.listingId','=','listings.id')
        ->leftJoin('formgroups','formgroups.id','=','extrainfos.formgroupId')
        ->leftJoin('formfields','formfields.id','=','formgroups.formfieldId')
        ->select('listings.id','formgroups.formfieldId', 'formfields.title','formfields.name', 'formfields.label','extrainfos.value')
        ->where('new_category',$cat[$x]->id)
        ->get();
        
          
        }
        $arr = array();
        foreach($list as $data){
            $arr = array(
                'id' => $data->formfieldId,
                'title'=> $data->title,
                'name'=> $data->name,
                'label'=> $data->label,
                'value'=> $data->value
            );
            echo json_encode($arr) . "\n";
        }
         
    }
}
