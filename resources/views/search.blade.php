@extends('front.master')

@section('title', 'Search')

@section('metas')

@endsection

@section('content')

    <div class="panel panel-default">
        <table class="table table-bordered table-hover" >
            <thead>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
            </thead>
            <tbody>
                @foreach($listings as $list)
                <tr>
                    <td>
                        {{ $list->title }}
                    </td>
                    <td>
                        <?php
                        $desc = $list->description;
                        $desc = str_ireplace($search, '<span style="color:red">'. $search .'</span>', $desc);
                        echo $desc;
                        ?>
                    </td>
                    <td>
                        <img src="{{ func::img_url($list->mainImageUrl, 150, 200) }}" width="150" alt="{{ $list->title }}" />
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="3">
                        {{ $listings->links() }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
@section('scripts')
    <script>

    </script>
@endsection
