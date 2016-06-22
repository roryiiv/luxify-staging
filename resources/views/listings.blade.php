@extends('front.master')

@section('title', 'Listings')

@section('content')
       <section id="form"><!--form-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <ul>
                            @foreach($listings as $list)
                                <li>
                                    <a href="/listing/{{ $list->id }}">
                                        <h3>{{ $list->title }}</h3>
                                    </a>
                                    <a href="/listing/{{ $list->id }}">
                                        <img src="{{ func::img_url($list->mainImageUrl, 120, 120) }}" alt="{{ $list->title }}" />
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        {{ $listings->links() }}
                    </div>
                </div>
            </div>
        </section><!--/form-->
@endsection
@section('scripts')
    <script>

    </script>
@endsection
