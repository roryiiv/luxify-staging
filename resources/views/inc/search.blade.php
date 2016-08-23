<div class="search-wrapper">
    <form method="get" role="search" action="/search" class="category-search">
        {{ csrf_field() }}
        <input type="hidden" name="action" value="search" />
        <div class="input-group">
        	@if (isset($search) && !empty($search))
        		 <input id="search_query" type="text" name="search" class="form-control search-tracker" value="{{ $search }}">
        	@else
        		<input id="search_query" type="text" name="search" class="form-control search-tracker" placeholder="Search by category, item, location...">
        	@endif
           
            <div class="input-group-addon">
                <input type="submit" class="btn btn-primary" value="Search">
            </div>
        </div>
    </form>
    <div class="suggested-results">
        <div class="inner-wrapper">
            <div class="search-term">Search for"<strong></strong>"</div>
            <div class="suggestions-wrap">
                <div id="search-left" class="row">
                </div>
            </div>
        </div>
    </div>
</div>
