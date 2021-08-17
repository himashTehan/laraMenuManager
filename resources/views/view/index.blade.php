@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center">
                <div class="card-header">
                    <div>
                        <ul class="nav nav-pills card-header-pills" id="myTab">
                            @foreach ($categories as $category)
                                <li class="nav-item">
                                    <a class="nav-link" href="#{{ $category->name }}" role="tab"
                                        data-toggle="pill">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="tab-content">
                            @foreach ($categories as $category)
                                @include('view.tabcontent', array('category' => $category))
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('script')
    <script type="text/javascript">
        $('#myTab li:first-child a').tab('show');
    </script>
@show
@endsection
