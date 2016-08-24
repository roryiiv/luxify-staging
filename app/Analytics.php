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

        $flot_chart['itempervisit'] = $flot_chart['total']/(DB::table('listings')->where('userId',$user_id)->count());

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
        $flot_chart['itempervisit'] = $flot_chart['total']/(DB::table('listings')->where('userId',$user_id)->count());

        return json_encode($flot_chart,JSON_HEX_APOS);
    }
}
