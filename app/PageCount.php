<?php

namespace App;
use Auth;
use DB;
use App\Users;
use App\Wishlists;
use Carbon\Carbon;
use Request;
use Illuminate\Database\Eloquent\Model;

class PageCount extends Model
{
    protected $table = 'analytics';
    public $timestamps = false;

    public static function counting($id_slug,$a){
	    try{
            DB::transaction(function () use ($id_slug,$a) {
                //mahasiswa
				$visitor = (Auth::user())?'user':'guess';
				$date = Carbon::now()->toDateString();

                $input = new PageCount;
                $input->id = '';
                $input->visited_at = $date;
                $input->listing_id = $id_slug;
                $input->user_id = $a;
                $input->visitor = $visitor;
                $input->ip = $_SERVER['REMOTE_ADDR'];
                $input->save();
            });
        }catch(Exception $e){
            return false;
        }
        return true;    	
    }
    public static function get_data(){

        //data all
        $userId = Auth::user()->id;
        $datenow = Carbon::now()->toDateString();
        $date_last = Carbon::today()->subDays(30)->toDateString();
        $all_visitor = PageCount::where('user_id',$userId)->count();
        $visitor_monthly = PageCount::where('visited_at','<=',$datenow)
        ->where('visited_at','>=',$date_last)
        ->where('user_id',$userId)
        ->count();

        //precentage %
        $date_31 = Carbon::today()->subDays(31)->toDateString();
        $date_60 = Carbon::today()->subDays(60)->toDateString();
        $visitor_last2month = PageCount::where('visited_at','<=',$date_31)
        ->where('visited_at','>=',$date_60)->count();
        $visitor_last2month=($visitor_last2month===0)?1:$visitor_last2month;
        $pr_visitor = $visitor_monthly/$visitor_last2month *100;
        if($visitor_last2month>$visitor_monthly){
            $pr_visitor='<span class="text-danger"><i class="ti-arrow-down fs-13"></i> '.$pr_visitor.'%</span>';
        }else{
            $pr_visitor='<span class="text-success"><i class="ti-arrow-up fs-13"></i> '.$pr_visitor.'%</span>';
        }




        $dt = Carbon::parse($datenow);
        $month = $dt->month;
        $year = $dt->year;
        $day = $dt->day;

        //data_bulanan
        $data = array();
        $data['date'] = $datenow;

        //alogaritm for add null count
        $data['visitor_all'] = $all_visitor;
        $data['visitor_m'] = $visitor_monthly;
        $data['pr_visitor'] = $pr_visitor;
        $data['total_product'] = DB::table('listings')->where('userId',Auth::user()->id)->count();

        
        $data['userId'] = $userId;
        $data['day'] = $day;
        $data['month'] = $month;
        $data['year'] = $year;
        $data['wishlists'] = Wishlists::get_dealer_item();
        $data['lastdate'] = $date_last;
        return $data;
    }
    public static function get_json(){
        $dataset=array();
        $userId = Auth::user()->id;
        for ($i=0; $i<30 ; $i++) { 
        $total = PageCount::where('visited_at',Carbon::today()->subDays($i))
        ->where('user_id',$userId)
        ->count();
        //$total = ($total<30)?$total+30:$total;
        $key = 29-$i;

        $dataset[] =array($key,$total);
//        array_push($dataset,$datas);
        }
        //$dataset = array_reverse($dataset);
        //return json_encode($dataset);
        return json_encode(array_reverse($dataset));
    }
        public static function get_tick(){
        $dataset=array();
        for ($i=0; $i<30 ; $i++) { 
        $date = Carbon::today()->subDays($i);
        $dt = Carbon::parse($date);
        $day = $dt->day;
        $key = 29-$i;

        $dataset[] =array($key,$day);
//        array_push($dataset,$datas);
        }
        //$dataset = array_reverse($dataset);
        //return json_encode($dataset);
        return json_encode(array_reverse($dataset));
    }
    public static function get_json_vm(){
        $userId = Auth::user()->id;
        //get visitor every 30 days in 12 month
        $dataset='';
        for ($i=0; $i <12 ; $i++) {
            if($i==0){
                $subday = ($i*30);
            }else{
                $subday = ($i*30)+1;
            }
        $date_start = Carbon::today()->subDays($subday);
        $date_end = Carbon::today()->subDays($subday+30);
        $total = PageCount::where('visited_at','<=',$date_start)->where('visited_at','>=',$date_end)->where('user_id',$userId)->count();

        $key = 11-$i;
        $dataset .='['.$key.','.$total.'],';            
        }
        return $dataset;

    }    
    public static function get_json_rn(){
        $userId = Auth::user()->id;
        //get visitor every 30 days in 12 month
        $dataset='';
        for ($i=0; $i <12 ; $i++) {
            if($i==0){
                $subday = ($i*30);
            }else{
                $subday = ($i*30)+1;
            }
        $date_start = Carbon::today()->subDays($subday);
        $date_end = Carbon::today()->subDays($subday+30);
        $total = DB::table('wishlists')->where('createdAt','<=',$date_start)->where('createdAt','>=',$date_end)->where('userId',$userId)->count();

        $key = 11-$i;
        $dataset .='['.$key.','.$total.'],';            
        }
        return $dataset;

    }
}
