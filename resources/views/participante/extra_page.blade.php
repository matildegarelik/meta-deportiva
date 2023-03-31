@extends('layouts.app',['extra_pages'=>$extra_pages])

@section('pagetitle',$extra_page->nombre)
@if($extra_page->image)
    @section('css')
    <style>
        .section-featured-header.all-sports-events {
            background: url("../{{env('PUBLIC_PATH')}}images/extra_pages/{{$extra_page->image}}") no-repeat center
        }
    </style> 
    @endsection
@else
    @section('css')
    <style>
        .section-featured-header.all-sports-events {
            background: url(../images/page-featured-img-category.jpg) no-repeat center
        }
    </style> 
    @endsection
@endif

@section('content')
<section class="section-featured-header all-sports-events">
    <div class="container">
        <div class="section-content">
            <h1>{{$extra_page->nombre}}</h1>
        </div>
    </div>
</section>

<section class="section-page-header">
    <div class="container">
        <h1 class="entry-title"></h1>
    </div>
</section>

<section class="section-page-content">
    <div class="container">
        <div class="row">
            {!! $extra_page->content !!}
        </div>
    </div>
</section>
@endsection