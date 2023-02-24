@extends('layouts.app')

@section('pagetitle','Mis eventos')

@section('css')
<style>
.section-featured-header.all-sports-events {
    min-height: 122px;
    /*background: url(../images/page-featured-img-category.jpg) no-repeat center center;*/
}
.section-featured-header.all-sports-events .section-content {
    padding: 0px 0 0px;
}
</style>
@endsection

@section('content')

<section class="section-featured-header all-sports-events">
    <div class="container">
        <div class="section-content">
            
        </div>
    </div>
</section>
<section class="section-page-header">
    <div class="container">
        <h1 class="entry-title">Mis eventos</h1>
    </div>
</section>

<section class="section-latest">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-2"></div>
            <div class="col-sm-12 col-md-8">
                <div class="latest-news">
                    <div class="section-header" style="margin-bottom:20px">
                        <h2>Mis eventos registrados</h2>
                        <span>Mostrando {{$events_inscripto->firstItem()}}-{{$events_inscripto->lastItem()}} de {{$events_inscripto->total()}} resultados</span>
                    </div>
                    <div class="section-content">
                        <ul class="clearfix">
                            @foreach($events_inscripto as $ei)
                            <li class="row news-item">
                                <div class="col-sm-5 news-item-img">
                                    <div class="date">
                                        <a href="#">
                                            <span class="day">{{date_format(new Datetime($ei->event->start_date),'j')}}</span>
                                            <span class="month">{{date_format(new Datetime($ei->event->start_date),'F')}}</span>
                                            <span class="year">{{date_format(new Datetime($ei->event->start_date),'Y')}}</span>
                                        </a>
                                    </div>
                                    <a href="#"><img src="{{asset('images/eventos/'.$ei->event->main_image) }}" alt="image"></a>
                                </div>
                                <div class="col-sm-7 news-item-info">
                                    <h3><a href="#">{{$ei->event->name}}</a></h3>
                                    <span class="meta-data">Clasificacion: {{$ei->event->clasification->name}}  | Categoría: {{$ei->category->name}}</span>
                                    <p>Ubicación: {{$ei->event->location}}</p>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        <div class="search-result-footer" style="text-align:center">
                                <ul class="pagination">
                                    <li>
                                        <a href="{{$events_inscripto->previousPageUrl()}}" aria-label="Previous">
                                            <span aria-hidden="true"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></span>
                                        </a>
                                    </li>
                                    @if($events_inscripto->currentPage()>2)<li><a href="{{$events_inscripto->url($events_inscripto->currentPage()-2)}}">{{$events_inscripto->currentPage()-2}}</a></li>@endif
                                    @if($events_inscripto->currentPage()>1)<li><a href="{{$events_inscripto->url($events_inscripto->currentPage()-1)}}">{{$events_inscripto->currentPage()-1}}</a></li>@endif
                                    <li class="active"><a href="#">{{$events_inscripto->currentPage()}}</a></li>
                                    @if($events_inscripto->lastPage()>$events_inscripto->currentPage())<li><a href="{{$events_inscripto->nextPageUrl()}}">{{$events_inscripto->currentPage()+1}}</a></li>@endif
                                    @if($events_inscripto->lastPage()>$events_inscripto->currentPage()+1)<li><a href="{{$events_inscripto->url($events_inscripto->currentPage()+2)}}">{{$events_inscripto->currentPage()+2}}</a></li>@endif
                                    <li>
                                        <a href="{{$events_inscripto->nextPageUrl()}}" aria-label="Next">
                                            <span aria-hidden="true"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                                        </a>
                                    </li>
                                </ul>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

@section('js')
<script>
$(document).ready(()=>{
    const d = new Date()
    $('#filter-month').val(d.getMonth())
    $('#filter-year').val(d.getFullYear())
    $('#filter-month,#filter-year').on('change', function(){
        $('.m-y').html($('#filter-month option:selected').text()+' '+$('#filter-year').val())
    })
    $('.m-y').html($('#filter-month option:selected').text()+' '+d.getFullYear())
})
</script>
@endsection