@extends('layouts.app')

@section('pagetitle','Homepage')

@section('content')

<section class="hero-1">
    <div class="container">
        <div class="row">
            <div class="hero-content">
                <h1 class="hero-title">Make Your Dream Come True</h1>
                <p class="hero-caption">Meet your favorite artists, sport teams and parties</p>
                <div class="hero-search">
                    <input type="text" placeholder="Seach Artist, Team, or Venue" id="search-input">
                </div>
                <div class="hero-location">
                    <p><i class="fa fa-map-marker" aria-hidden="true"></i> San Francisco <a href="#">Change Location</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-upcoming-events">
    <div class="container">
        <div class="row">
            <div class="section-header">
                <h2>Eventos patrocinados</h2>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut.</p>
                <a href="{{route('participante.events')}}">Ver todos los próximos eventos</a>
            </div>
            <div class="section-content">
                <ul class="clearfix">
                    @foreach($featured_events as $event)
                    <li>
                        <div class="date">
                            <a href="#">
                                <span class="day">{{date_format(new Datetime($event->start_date),'j')}}</span>
                                <span class="month">{{date_format(new Datetime($event->start_date),'F')}}</span>
                                <span class="year">{{date_format(new Datetime($event->start_date),'Y')}}</span>
                            </a>
                        </div>
                        <a href="#">
                            <img src="{{ asset(env('PUBLIC_PATH').'images/eventos/'.$event->main_image) }}" alt="image">
                        </a>
                        <div class="info">
                            <p>{{$event->name}}<span>{{$event->location}}</span></p>
                            <a href="{{route('participante.event', $event->id)}}" class="get-ticket">Ver más</a>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="section-event-category">
    <div class="container">
        <div class="row">
            <div class="section-header">
                <h2>Eventos por clasificación</h2>
            </div>
            <div class="section-content">
                <ul class="row clearfix">
                    @foreach($clasifications as $clasif)
                    <li class="category-{{$clasif->id}} col-sm-4">
                        <img src="{{ asset('assets/images/event-category-'.$clasif->id.'.jpg') }}" alt="image">
                        <a href="{{route('participante.events')}}?clasification={{$clasif->id}}"><span>{{$clasif->name}}</span></a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="section-stats">
    <div class="container">
        <div class="row">
            <div class="section-content">
                <ul class="row clearfix">
                    <li class="col-sm-4">
                        <span class="count">{{$events_active}}</span>
                        <hr>
                        <p>Eventos Activos</p>
                    </li>
                    <li class="col-sm-4">
                        <span class="count">{{$users_active}}</span>
                        <hr>
                        <p>Usuarios Activos</p>
                    </li>
                    <li class="col-sm-4">
                        <span class="count">{{$total_register}}</span>
                        <hr>
                        <p>Registros</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="section-video-parallax">
    <div class="container">
        <div class="section-content">
            <h2>LIVE THERE</h2>
            <p>Book events from anywhere in 191+ countries and get awesome experience Lorem ipsum dolor sit amet, consectetuer adipiscing elit,</p>
            <a href="#"><img src="{{ asset('assets/images/play-btn.png') }}" alt="image"></a>
        </div>
    </div>
</section>

<section class="section-sponsors">
    <div class="container">
        <div class="section-content">
            <ul class="row">
                <li class="col-sm-3">
                    <a href="#">
                        <img src="{{ asset('assets/images/sponsor-1.png') }}" alt="image">
                    </a>
                </li>
                <li class="col-sm-3">
                    <a href="#">
                        <img src="{{ asset('assets/images/sponsor-2.png') }}" alt="image">
                    </a>
                </li>
                <li class="col-sm-3">
                    <a href="#">
                        <img src="{{ asset('assets/images/sponsor-3.png') }}" alt="image">
                    </a>
                </li>
                <li class="col-sm-3">
                    <a href="#">
                        <img src="{{ asset('assets/images/sponsor-4.png') }}" alt="image">
                    </a>
                </li>
            </ul>
        </div>
    </div>
</section>

<section class="section-newsletter">
    <div class="container">
        <div class="section-content">
            <h2>Stay Up to date With Your Favorite Events!</h2>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh <br> euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
            <div class="newsletter-form clearfix">
                <input type="email" placeholder="Your Email Address">
                <input type="submit" value="Subscribe">
            </div>
        </div>
    </div>
</section>


@endsection

@section('js')
<script>
    $('#search-input').on('click',function(){
        let searchStr = encodeURI($(this).val())
        if(searchStr.trim()!='')
            window.location.href="{{route('participante.events')}}?search="+searchStr
    })
</script>
@endsection