<?php

namespace App;
use Carbon\Carbon;
use DB;

use Illuminate\Database\Eloquent\Model;

class Analytics extends Model
{
    protected $table = 'analytics';
    public $timestamps = false;

    public static function get_flot_data($start,$end,$user_id){
        $start_date = date_create($start);
        $end_date = date_create($end);
        
        $flot_chart = array();
        $flot_chart['status']=true;
        $flot_chart['range_date']=array(
            'start_date'=>$start,
            'end_date'=>$end
            );
        $flot_chart['count_date'] = date_diff($start_date,$end_date)->days+1;
        if($flot_chart['count_date']<=1){
            $tick = array(array(0,' '),array(1,Carbon::parse($start)->format('M d, Y')),array(2,' '));
            $flot_chart['tick'] =json_encode($tick);
            
        }else{
            $tick = array();
            for ($i=0; $i < $flot_chart['count_date']; $i++) { 
                if($i==0){
                    $tick[] = array($i,Carbon::parse($start)->format('M d, Y'));
                }else if($i==$flot_chart['count_date']-1){
                    $tick[] = array($i,Carbon::parse($end)->format('M d, Y'));
                }else{
                    $tick[] = array($i,'');
                }
            }
            $flot_chart['tick']=json_encode($tick);
        }

        $flot_chart['total'] = Analytics::where('visited_at','<=',Carbon::parse($end)->toDateString())
        ->where('visited_at','>=',Carbon::parse($start)->toDateString())
        ->where('user_id',$user_id)
        ->count();
        if($start_date==$end_date){
            $icount = 1;
        }else{
            $icount = intval($flot_chart['count_date']);
        }
        $data = array();
        if($flot_chart['count_date']<=1){
            $data[]=array(2,0);
            for ($i=0; $i < $icount; $i++) {
                $date = Carbon::parse($end)->subDays($i)->toDateString();
                $counting = Analytics::where('visited_at',$date)
                ->where('user_id',$user_id)
                ->count();
                $data[] =array(1 , $counting);
            }
            $data[]=array(0,0);
        }else{

            for ($i=0; $i < $icount; $i++) {
                $date = Carbon::parse($end)->subDays($i)->toDateString();
                $counting = Analytics::where('visited_at',$date)
                ->where('user_id',$user_id)
                ->count();
                $key = ($icount-1)-$i;
                $data[] =array($key , $counting);
            }
        }

        $flot_chart['data'] = json_encode(array_reverse($data),JSON_HEX_APOS);
        $divide = (DB::table('listings')->where('userId',$user_id)->count()==0)?1:DB::table('listings')->where('userId',$user_id)->count();
        $flot_chart['itempervisit'] = $flot_chart['total']/$divide;
        return json_encode($flot_chart,JSON_HEX_APOS);
    }    
    public static function get_flot_first($year,$user_id){
    	$flot_chart = array();
    	$flot_chart['status']=true;
        $month = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
        $tick = array();
        for ($i=0; $i <count($month) ; $i++) {
            $tick[] = array($i,$month[$i]);
        }
        $flot_chart['tick'] = json_encode($tick);

        $flot_chart['total'] = Analytics::where('visited_at','<=',Carbon::parse($year.'-12-31')->toDateString())
        ->where('visited_at','>=',Carbon::parse($year.'-01-01')->toDateString())
        ->where('user_id',$user_id)
        ->count();

        $data = array();
        for ($i=0; $i < 12; $i++) {
            $month = $i+1;
        $counting = Analytics::where('visited_at','<=',Carbon::parse($year.'-'.$month.'-31')->toDateString())
        ->where('visited_at','>=',Carbon::parse($year.'-'.$month.'-01')->toDateString())
        ->where('user_id',$user_id)
        ->count();
            $data[] =array($i , $counting);
        }
        $flot_chart['data'] = json_encode($data,JSON_HEX_APOS);
        $divide = (DB::table('listings')->where('userId',$user_id)->count()==0)?1:DB::table('listings')->where('userId',$user_id)->count();
        $flot_chart['itempervisit'] = $flot_chart['total']/$divide;

        return json_encode($flot_chart,JSON_HEX_APOS);
    }
    public static function get_top_three($user_id){
        $data = DB::table('analytics')
                     ->select(DB::raw('count(*) as count, listing_id'))
                     ->where('user_id',$user_id)
                     ->groupBy('listing_id')
                     ->orderBy('count','desc')
                     ->take(3)
                     ->get();
        return $data;
    }
    public static function get_top_three_country($user_id){
        $data = DB::table('analytics')
                     ->select(DB::raw('count(*) as count, country_id'))
                     ->where('user_id',$user_id)
                     ->groupBy('country_id')
                     ->orderBy('count','desc')
                     ->take(3)
                     ->get();
        return $data;
    }
    public static function get_date_count($user_id){
        $year_now = Carbon::now()->year;

        $first_date = Analytics::where('visited_at','<=',Carbon::parse($year_now.'-12-31')->toDateString())
                    ->where('visited_at','>=',Carbon::parse($year_now.'-01-01')->toDateString())
                    ->where('user_id',$user_id)
                    ->orderBy('visited_at','asc')
                    ->select('visited_at')
                    ->first();

        $last_date = Analytics::where('visited_at','<=',Carbon::parse($year_now.'-12-31')->toDateString())
                    ->where('visited_at','>=',Carbon::parse($year_now.'-01-01')->toDateString())
                    ->where('user_id',$user_id)
                    ->orderBy('visited_at','desc')
                    ->select('visited_at')
                    ->first();
        if(count($last_date)>0 && count($first_date)>0 ){
            $fd = strtotime($first_date->visited_at);
            $ld = strtotime($last_date->visited_at);
            $nfd = date('Y-m-d',$fd);
            $nld = date('Y-m-d',$ld);
            $data = Carbon::parse($nfd)->format('M d, Y').' - '.Carbon::parse($nld)->format('M d, Y');
        }else{
            $data='';
        }
        return $data;
    }
    public static function get_prvisitor($user_id){
        $year_now = Carbon::now()->year;
        $year_ago = Carbon::now()->subYears(1)->year;

        $data_now = Analytics::where('visited_at','<=',Carbon::parse($year_now.'-12-31')->toDateString())
        ->where('visited_at','>=',Carbon::parse($year_now.'-01-01')->toDateString())
        ->where('user_id',$user_id)
        ->count();
        $data_ago = Analytics::where('visited_at','<=',Carbon::parse($year_ago.'-12-31')->toDateString())
        ->where('visited_at','>=',Carbon::parse($year_ago.'-01-01')->toDateString())
        ->where('user_id',$user_id)
        ->count();
        $pr = ($data_now-$data_ago)/(($data_now>0)?$data_now:1) *100;
        if ($pr > 0) {
        	if($data_ago>$data_now){
        	    $pr_visitor = '<span class="text-danger"><i class="ti-arrow-down fs-13"></i> '.$pr.'%</span>';
        	}else{
        	    $pr_visitor = '<span class="text-success"><i class="ti-arrow-up fs-13"></i> '.$pr.'%</span>';
        	}
        } else {
        	$pr_visitor = '';
        }
        
        return $pr_visitor;
    }
}
