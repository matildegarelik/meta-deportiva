@extends('layouts.app')

@section('pagetitle','Events')

@section('content')

<section class="section-featured-header all-sports-events">
    <div class="container">
        <div class="section-content">
            <h1>All Sports Events</h1>
        </div>
    </div>
</section>

<section class="section-refine-search">
    <div class="container">
        <div class="row">
            <form>
                <div class="keyword col-sm-6 col-md-4">
                    <label>Search Keyword</label>
                    <input type="text" class="form-control hasclear" placeholder="Search">
                    <span class="clearer"><img src="images/clear.png" alt="clear"></span>
                </div>
                
                <div class="col-sm-6 col-md-2">
                    <input type="submit" value="Search">
                </div>
            </form>
        </div>
    </div>
</section>

<section class="section-search-content">
    <div class="container">
        <div class="row">
            <div id="secondary" class="col-md-4 col-lg-3">
                <div class="search-filter">
                    <div class="search-event-title">
                        <h2><span>Próximos</span> Eventos </h2>
                    </div>
                    <div class="search-filter-category">
                        <h3>Clasificaciones</h3>
                        <div class="checkbox">
                            <input id="category0" class="styled" type="checkbox" checked="" data-id="0">
                            <label for="category0">
                                All
                            </label>
                        </div>
                        @foreach($clasifications as $cla)
                        <div class="checkbox">
                            <input id="category{{$cla->id}}" class="styled" type="checkbox" data-id="{{$cla->id}}">
                            <label for="category{{$cla->id}}">
                                {{$cla->name}}
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            
            <div id="primary" class="col-md-8 col-lg-9">
            
                <div class="search-result-header">
                    <div class="row">
                        <div class="col-sm-7">
                            <h2>Próximos eventos</h2>
                            <span>Mostrando {{$events->firstItem()}}-{{$events->lastItem()}} de {{$events->total()}} resultados</span>
                        </div>
                        <div class="col-sm-5">
                            <label>Ordenar según</label>
                            <select class="selectpicker dropdown">
                              <option>Precio: Bajo-Alto</option>
                              <option>Precio: Alto-Bajo</option>
                            </select>
                        </div>
                    </div>
                </div>
                @foreach($events as $event)
                <div class="search-result-item">
                    <div class="row">
                        <div class="search-result-item-info col-sm-9">
                            <h3>{{$event->name}}</h3>
                            <ul class="row">
                                <li class="col-sm-5 col-lg-6">
                                    <span>Venue</span>
                                    {{$event->location}}
                                </li>
                                <li class="col-sm-4 col-lg-3">
                                    <!--<span>Saturday</span>
                                    July. 30th, 2016-->
                                    <span>{{date_format(new Datetime($event->start_date),'l')}}</span>
                                    {{date_format(new Datetime($event->start_date),'F  j, Y')}}
                                </li>
                                <li class="col-sm-3">
                                    <span>Time</span>
                                    07:00 PM
                                </li>
                            </ul>
                        </div>
                        <div class="search-result-item-price col-sm-3">
                            <span>Price From</span>
                            <strong>${{$event->starter_price()}}</strong>
                            <a href="{{ route('participante.event',$event->id) }}">Ver más</a>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="search-result-footer">
                    <ul class="pagination">
                        <li>
                            <a href="{{$events->previousPageUrl()}}" aria-label="Previous">
                                <span aria-hidden="true"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Previous</span>
                            </a>
                        </li>
                        @if($events->currentPage()>2)<li><a href="{{$events->url($events->currentPage()-2)}}">{{$events->currentPage()-2}}</a></li>@endif
                        @if($events->currentPage()>1)<li><a href="{{$events->url($events->currentPage()-1)}}">{{$events->currentPage()-1}}</a></li>@endif
                        <li class="active"><a href="#">{{$events->currentPage()}}</a></li>
                        @if($events->lastPage()>$events->currentPage())<li><a href="{{$events->nextPageUrl()}}">{{$events->currentPage()+1}}</a></li>@endif
                        @if($events->lastPage()>$events->currentPage()+1)<li><a href="{{$events->url($events->currentPage()+2)}}">{{$events->currentPage()+2}}</a></li>@endif
                        <li>
                            <a href="{{$events->nextPageUrl()}}" aria-label="Next">
                                <span aria-hidden="true">Next <i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
<script type="text/javascript">
$(document).ready(()=>{
    // checkear si no hay param en la url
    const params = new Proxy(new URLSearchParams(window.location.search), {
        get: (searchParams, prop) => searchParams.get(prop),
    });
    $('input[type=checkbox]').change(function(){
        $('input[type=checkbox]').prop('checked', false);
        $(this).prop('checked', true);
        if((params.clasification && params.clasification!=$(this).data('id')) || params.clasification==null)
            window.location.href='?clasification='+$(this).data('id');
    });
    if(params.clasification){
        $('#category'+params.clasification).prop('checked', true).trigger('change');
    }
})
</script>
@endsection