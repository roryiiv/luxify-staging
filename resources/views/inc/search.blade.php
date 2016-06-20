{!! Form::open(['method'=>'GET','url'=>'search','class'=>'navbar-form navbar-left','role'=>'search'])  !!}

<div class="input-group custom-search-form">
    <input type="text" class="form-control" name="search" placeholder="Search...">
    <span class="input-group-btn">
        <button class="btn btn-default-sm" type="submit">
            search<!--<span class="hiddenGrammarError" pre="" data-mce-bogus="1"-->
        </button>
    </span>
</div>
{!! Form::close() !!}
