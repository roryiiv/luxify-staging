<?php
if(Auth::user()->role == 'admin'){
    
    $admin = array(
        'admin'=>'admin',
        'user'=>'user',
        'seller'=>'dealler',
        'editor'=>'editor'
        );
    if(in_array(Auth::user()->role,array_keys($admin))){
?>
<div class="btn-group mt-5">view as :</div>
<div class="btn-group mt-5">
    <?php 
    $active = (Auth::user()->role == 'admin' && Session::get('view_as') !='')?Session::get('view_as'):Auth::user()->role;
    $label = $admin[$active];
    ?>
    <button type="button" class="btn btn-default btn-outline">{{$label}}</button>

    <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-default btn-outline dropdown-toggle"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
    <ul class="dropdown-menu dropdown-menu-right animated fadeInDown">
        <?php 
        foreach($admin as $key => $value){ 
            if($key!=$active){ ?>
            <li><a href="/api/admin/switch/{{$key}}">{{$value}}</a></li>
        <?php }
        } ?>
    </ul>
</div>
<?php
    }
}
?>

<div class="btn-group mt-5">
    <?php 
    $active = (Translation::getRoutePrefix()!=NULL)?Translation::getRoutePrefix():'en';
    $default = DB::table('languages')
                        ->where('lang_str', $active)
                        ->orWhere('code',$active)
                        ->first();
    if(count($default)==0){
        $default = DB::table('languages')
                        ->where('lang_str', 'en')
                        ->first();
    }
    ?>
    <button type="button" class="btn btn-default btn-outline"><i class="flag-icon {{$default->icon}} mr-5"></i> {{$default->name}}</button>

    <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-default btn-outline dropdown-toggle"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
    <ul class="dropdown-menu dropdown-menu-right animated fadeInDown">
        <?php 
            $active = (Translation::getRoutePrefix()!=NULL)?Translation::getRoutePrefix():'en';
            $langs = DB::table('languages')
                    ->whereNotIn('lang_str', [$active])
                    ->WhereNotIn('code', [$active])
                    ->get();
        
        foreach($langs as $lang){ 
            ?>
        <li><a href="/api/lang/switch/{{$lang->id}}"><i class="flag-icon {{$lang->icon}} mr-5"></i>{{$lang->name}}</a></li>
        <?php } ?>
    </ul>
</div>