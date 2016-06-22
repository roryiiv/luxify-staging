@extends('front.master')

@section('title', 'Welcome to Luxify')

@section('content')
        <section id="main_area">
            <h2>Welcome to Luxify</h2>
        </section>
        <section id="content"><!--form-->
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
                    </div>
                </div>
            </div>
        </section><!--/form-->
@endsection
@section('scripts')
    <script>

    </script>
@endsection
