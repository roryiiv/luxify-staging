<div class="sitemap-content">
@for($i=1; $i<=3; $i++)
    @if($postInf['section_'.$i]['title']!='')
        @if($postInf['section_'.$i]['style']=='1')
            <div class="col-sm-12 style_1_div">
                <div class="col-lg-4 col-lg-offset-1 col-sm-6 style_text ">
                    <div class="col-sm-12 style_title">{!!$postInf['section_'.$i]['title']!!}</div>
                    <div class="col-sm-12 style_description">{!!$postInf['section_'.$i]['description']!!}</div>
                </div>
            @if(is_array($postInf['section_'.$i]['bg']))
                    <div class="style_image ">
                        <img src="{{$postInf['section_'.$i]['bg']['url']}}" />
                    </div>
                @endif
            </div>
        @elseif($postInf['section_'.$i]['style']=='2')
                <div class="col-sm-12 style_2_div">
                    <div class="col-lg-4 col-lg-offset-7 col-sm-offset-6 col-sm-6 style_text ">
                        <div class="col-sm-12 style_title">{!!$postInf['section_'.$i]['title']!!}</div>
                        <div class="col-sm-12 style_description">{!!$postInf['section_'.$i]['description']!!}</div>
                    </div>
                    @if(is_array($postInf['section_'.$i]['bg']))
                        <div class="style_image ">
                            <img src="{{$postInf['section_'.$i]['bg']['url']}}" />
                        </div>
                    @endif
                </div>
        @elseif($postInf['section_'.$i]['style']=='3')
            <div class="col-sm-12 style_3_div">
                <div class="col-lg-5 col-lg-offset-1 col-sm-offset-1 col-sm-6 style_text ">
                    <div class="col-sm-12 style_title">{!!$postInf['section_'.$i]['title']!!}</div>
                    <div class="col-sm-12 style_description">{!!$postInf['section_'.$i]['description']!!}</div>
                </div>
                @if(is_array($postInf['section_'.$i]['bg']))
                    <div class="style_image" style="background-image:url('{{$postInf['section_'.$i]['bg']['url']}}');"></div>
                @endif
            </div>
        @elseif($postInf['section_'.$i]['style']=='4')
                <div class="col-sm-12 style_4_div">
                    <div class="col-lg-5 col-lg-offset-6 col-sm-offset-5 col-sm-6 style_text ">
                        <div class="col-sm-12 style_title">{!!$postInf['section_'.$i]['title']!!}</div>
                        <div class="col-sm-12 style_description">{!!$postInf['section_'.$i]['description']!!}</div>
                    </div>
                    @if(is_array($postInf['section_'.$i]['bg']))
                        <div class="style_image" style="background-image:url('{{$postInf['section_'.$i]['bg']['url']}}');"></div>
                    @endif
                </div>
        @elseif($postInf['section_'.$i]['style']=='5')
                <div class="col-sm-12 style_5_div">
                    <div class="col-lg-10 col-lg-offset-1 col-sm-10 col-sm-offset-1 style_text ">
                        <div class="col-sm-12 style_title">{!!$postInf['section_'.$i]['title']!!}</div>
                        <div class="col-sm-12 style_description">{!!$postInf['section_'.$i]['description']!!}</div>
                    </div>
                    @if(is_array($postInf['section_'.$i]['bg']))
                        <div class="style_image" style="background-image:url('{{$postInf['section_'.$i]['bg']['url']}}');"></div>
                    @endif
                </div>
        @elseif($postInf['section_'.$i]['style']=='6')
            <div class="col-sm-12 style_6_div">
                <div class="col-lg-10 col-lg-offset-1 col-sm-10 col-sm-offset-1 style_text ">
                    <div class="col-sm-12 style_title">{!!$postInf['section_'.$i]['title']!!}</div>
                    <div class="col-sm-12 style_description">{!!$postInf['section_'.$i]['description']!!}</div>
                </div>
                @if(is_array($postInf['section_'.$i]['bg']))
                    <div class="style_image" style="background-image:url('{{$postInf['section_'.$i]['bg']['url']}}');"></div>
                @endif
            </div>
        @endif
    @else

    @endif
@endfor
</div>
