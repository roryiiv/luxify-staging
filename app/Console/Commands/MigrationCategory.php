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

        $childs = array(
            'estates' => array(50,69,16,52,72),
            'apartment' => array(126,51,49),
            'house' => array(48),
            'land' => array(53,54),
            'others' => array(47,138,57,56,127,15),
            'antique_jewelry' => array(149),
            'jewelry' => array(10,110,109,108,39,107,38,37),
            'watch' => array(36,106,105,89,34,33,31),
            'cars' => array(2,11,20,19,60,55,18),
            'classics' => array(66),
            'motorbike' => array(17),
            'accessories_men' => array(92.88),
            'accessories_women' => array(124, 160, 150, 120,119,118,117,161,159,116),
            'bags' => array(9,43,114,113,42,41,112,111,91,137),
            'experiences' => array(3,162,169,165,99,97,167,164,166,98,95,96,163,94),
            'collectibles' => array(1,46,68,67,168,136,64, 70, 61,131,130,90),
            'furnitures' => array(146, 79, 144, 63, 133, 62, 71, 93),
            'motor' => array(40,25,24,23,85,76),
            'sail' => array(22,24),
            'jet' => array(45),
            'helicopter' => array(125, 13),
            'art' => array(12,59,58,129,128),
            'antiques' => array(139,74,140,81,147,80,73,145,143,142,148,78,77,75,141,),
            'fine_wines' => array(35,26,30,28,87,29),
            'spirits' => array(100,101,170,171,102,103,172,173,104),
            'champagne' => array(27)
        );


        foreach ($oldcat as $listing) {
            $old = DB::table('listings')->where('categoryId',$listing->id)->get();
            for($x = 0; $x < count($old); $x++){
                $id = $old[$x]->categoryId;
                // dd($id);
                if(in_array($id,$childs['estates'])){
                    $new = 49;
                }elseif(in_array($id,$childs['apartment'])){
                    $new = 59;
                }elseif (in_array($id,$childs['house'])) {
                    $new = 60;
                }elseif (in_array($id,$childs['land'])) {
                    switch ($id) {
                        case 53:
                            $new = 61;
                            break;
                        case 54:
                            $new = 62;
                            break;
                        default:
                            $new = 61;
                            break;
                    }
                }elseif (in_array($id,$childs['others'])) {
                    $new = 60;
                }elseif (in_array($id,$childs['antique_jewelry'])) {
                    $new = 67;
                }elseif (in_array($id,$childs['jewelry'])) {
                    switch ($id) {
                        case 10:
                            $new = 66;
                            break;
                        case 110:
                            $new = 68;
                            break;
                        case 109:
                            $new = 69;
                            break;
                        case 108:
                            $new = 70;
                            break;
                        case 39:
                            $new = 71;
                            break;
                        case 107:
                            $new = 72;
                            break;
                        case 38:
                            $new = 73;
                            break;
                        case 37:
                            $new = 74;
                            break;

                        default:
                            $new = 66;
                            break;
                    }
                }elseif (in_array($id,$childs['watch'])) {
                    switch ($id) {
                        case 36:
                            $new = 76;
                            break;
                        case 106:
                            $new = 77;
                            break;
                        case 105:
                            $new = 77;
                            break;
                        case 89:
                            $new = 77;
                            break;
                        case 34:
                            $new = 77;
                            break;
                        case 33:
                            $new = 77;
                            break;
                        case 31:
                            $new = 77;
                            break;
                        default:
                            $new = 76;
                            break;
                    }
                }elseif (in_array($id,$childs['cars'])) {
                    switch ($id) {
                        case 2:
                            $new = 86;
                            break;
                        case 11:
                            $new = 86;
                            break;
                        case 20:
                            $new = 87;
                            break;
                        case 19:
                            $new = 88;
                            break;
                        case 60:
                            $new = 89;
                            break;
                        case 55:
                            $new = 90;
                            break;
                        case 18:
                            $new = 91;
                            break;
                        default:
                            $new = 86;
                            break;
                    }
                }elseif (in_array($id,$childs['classics'])) {
                    $new = 92;
                }elseif (in_array($id,$childs['motorbike'])) {
                    $new = 93;
                }elseif (in_array($id,$childs['accessories_men'])) {
                    $new = 0;
                }elseif (in_array($id,$childs['accessories_women'])) {
                    switch ($id) {
                        case 124:
                            $new = 124;
                            break;
                        case 160:
                            $new = 124;
                            break;

                        case 150:
                            $new = 0;
                            break;
                        case 120:
                            $new = 0;
                            break;
                        case 119:
                            $new = 0;
                            break;
                        case 118:
                            $new = 0;
                            break;
                        case 117:
                            $new = 0;
                            break;
                        case 161:
                            $new = 0;
                            break;
                        case 159:
                            $new = 0;
                            break;
                        case 116:
                            $new = 0;
                            break;
                        default:
                            $new = 124;
                            break;
                    }
                }elseif (in_array($id,$childs['bags'])) {
                    $new = 134;
                }elseif (in_array($id,$childs['experiences'])) {
                    $new = 36;
                }elseif (in_array($id,$childs['collectibles'])) {
                    switch ($id) {
                        case 1:
                            $new = 25;
                            break;
                        case 46:
                            $new = 25;
                            break;
                        case 68:
                            $new = 25;
                            break;
                        case 67:
                            $new = 25;
                            break;
                        case 168:
                            $new = 137;
                            break;
                        case 136:
                            $new = 25;
                            break;
                        case 64:
                            $new = 25;
                            break;
                        case 70:
                            $new = 135;
                            break;
                        case 61:
                            $new = 25;
                            break;
                        case 131:
                            $new = 25;
                            break;
                        case 130:
                            $new = 135;
                            break;
                        case 90:
                            $new = 25;
                            break;
                        default:
                            $new = 25;
                            break;
                    }
                }elseif (in_array($id,$childs['furnitures'])) {
                    switch ($id) {
                        case 146:
                            $new = 9;
                            break;
                        case 79:
                            $new = 2;
                            break;
                        case 144:
                            $new = 2;
                            break;
                        case 63:
                            $new = 25;
                            break;
                        case 133:
                            $new = 25;
                            break;
                        case 62:
                            $new = 25;
                            break;
                        case 71:
                            $new = 141;
                            break;
                        case 93:
                            $new = 143;
                            break;
                        default:
                            $new = 9;
                            break;
                    }
                }elseif(in_array($id,$childs['motor'])){
                    switch ($id) {
                        case 40:
                            $new = 99;
                            break;
                        case 25:
                            $new = 100;
                            break;
                        case 24:
                            $new = 100;
                            break;
                        case 23:
                            $new = 100;
                            break;
                        case 85:
                            $new = 100;
                            break;
                        case 76:
                            $new = 100;
                            break;
                        default:
                            $new = 9;
                            break;
                    }
                }elseif(in_array($id,$childs['sail'])){
                     switch ($id) {
                        case 22:
                            $new = 103;
                            break;
                        case 24:
                            $new = 100;
                            break;
                        default:
                            $new = 103;
                            break;
                    }
                }elseif(in_array($id,$childs['jet'])){
                    $new = 97;
                }elseif(in_array($id,$childs['art'])){
                    switch ($id) {
                        case 12:
                            $new = 18;
                            break;
                        case 59:
                            $new = 19;
                            break;
                        case 58:
                            $new = 20;
                            break;
                        case 129:
                            $new = 21;
                            break;
                        case 128:
                            $new = 22;
                            break;
                        default:
                            $new = 18;
                            break;
                    }
                }elseif (in_array($id,$childs['antiques'])) {
                    switch ($id) {
                        case 139:
                            $new = 1;
                            break;
                        case 74:
                            $new = 2;
                            break;
                        case 140:
                            $new = 3;
                            break;
                        case 81:
                            $new = 4;
                            break;
                        case 147:
                            $new = 5;
                            break;
                        case 80:
                            $new = 2;
                            break;
                        case 73:
                            $new = 2;
                            break;
                        case 145:
                            $new = 2;
                            break;
                        case 143:
                            $new = 2;
                            break;
                        case 142:
                            $new = 2;
                            break;
                        case 148:
                            $new = 2;
                            break;
                        case 78:
                            $new = 142;
                            break;
                        case 77:
                            $new = 15;
                            break;
                        case 75:
                            $new = 2;
                            break;
                        case 141:
                            $new = 17;
                            break;
                        default:
                            $new = 1;
                            break;
                    }
                }elseif (in_array($id,$childs['fine_wines'])){
                    switch ($id) {
                        case 35:
                            $new = 107;
                            break;
                        case 26:
                            $new = 107;
                            break;
                        case 30:
                            $new = 107;
                            break;
                        case 28:
                            $new = 107;
                            break;
                        case 87:
                            $new = 107;
                            break;
                        case 29:
                            $new = 107;
                            break;
                        default:
                            $new = 107;
                            break;
                    }
                }elseif (in_array($id,$childs['spirits'])){
                    $new = 114;
                }elseif (in_array($id,$childs['champagne'])){
                    $new = 108;
                }
            
                if($new == $old[$x]->new_category){
                	echo 'Skipped... listing #' . $old[$x]->id;
                }else{
                	$updated = DB::table('listings')->where('id',$old[$x]->id)->update(['new_category' => $new]);
                	if($updated){
                	    echo "success listing #" . $old[$x]->id . "\n";
                	      //$status[] = "success";
                	}else{
                	    echo "error listing #" . $old[$x]->id . "\n";
                	    //$status[] =  "error";
                	}
                }
            }
        }    
    }
}
