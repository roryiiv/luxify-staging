<div class="btn-group mt-5">
    <?php 
    $active = (Translation::getRoutePrefix()!=NULL)?Translation::getRoutePrefix():'en';
    $default = DB::table('languages')
                        ->where('lang_str', $active)
                        ->first();
    ?>
    <button type="button" class="btn btn-default btn-outline"><i class="flag-icon {{$default->icon}} mr-5"></i> {{$default->name}}</button>

    <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-default btn-outline dropdown-toggle"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
    <ul class="dropdown-menu dropdown-menu-right animated fadeInDown">
        <?php 
            $active = (Translation::getRoutePrefix()!=NULL)?Translation::getRoutePrefix():'en';
            $langs = DB::table('languages')
                    ->whereNotIn('lang_str', [$active])
                    ->get();
        
        foreach($langs as $lang){ 
            ?>
        <li><a href="/api/lang/switch/{{$lang->id}}"><i class="flag-icon {{$lang->icon}} mr-5"></i>{{$lang->name}}</a></li>
        <?php } ?>
    </ul>
</div>