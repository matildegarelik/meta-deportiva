@extends('layouts.app')

@section('pagetitle','Event')

@section('css')
<style>
    .event-highlights h1:before {
    display: block;
    content: "";
    width: 5px;
    height: 16px;
    background: #ff5700;
    position: absolute;
    left: -25px;
    top: 3px;
}
</style>
@endsection

@section('content')

<section class="section-event-single-featured-header">
    <div class="container">
        <div class="section-content">
            <h1>Tickets for Camp Nou Experience</h1> 
            <p>
                <span>
                    <i class="fa fa-map-marker" aria-hidden="true"></i> Camp Nou, Barcelona, Spain
                </span>
            </p>
        </div>
    </div>
</section>

<section class="section-event-single-header">
    <div class="container">
        <h1>{{$event->name}}</h1>
        <ul class="ticket-purchase">
            <li>
                Ticket from
            </li>
            <li>
                <span>${{$event->starter_price()}}</span>
            </li>
            <li>
                <a href="{{  route('participante.registration_form', $event->id)}}">Registrarse</a>
            </li>
        </ul>
    </div>
</section>

<section class="section-event-single-content">
    <div class="container">
        <div class="row">
            <div id="primary" class="col-sm-12 col-md-12">
                <!--<div class="event-info">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="event-info-img">
                                <div id="slider" class="flexslider">
                                    <ul class="slides">
                                        <li>
                                            <img src="images/event-single-slider.jpg" alt="image"/>
                                        </li>
                                        <li>
                                            <img src="images/event-single-slider.jpg" alt="image"/>
                                        </li>
                                        <li>
                                            <img src="images/event-single-slider.jpg" alt="image"/>
                                        </li>
                                        <li>
                                            <img src="images/event-single-slider.jpg" alt="image"/>
                                        </li>
                                    </ul>
                                </div>
                                <div id="carousel" class="flexslider">
                                    <ul class="slides">
                                        <li>
                                            <img src="images/event-single-slider.jpg" alt="image"/>
                                        </li>
                                        <li>
                                            <img src="images/event-single-slider.jpg" alt="image"/>
                                        </li>
                                        <li>
                                            <img src="images/event-single-slider.jpg" alt="image"/>
                                        </li>
                                        <li>
                                            <img src="images/event-single-slider.jpg" alt="image"/>
                                        </li>
                                    </ul>
                                </div>									
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="event-info-about">
                                <h2>ABOUT THIS EVENT</h2>
                                <p>Lorem ipsum dolor sit amet, at omnes deseruisse pri. Quo aeterno legimus insolens ad. Sit cu detraxit constituam, an mel iudico constituto efficiendi. Eu ponderum mediocrem has, vitae adolescens in pro. Mea liber ridens inermis ei, mei legendos vulputate an, labitur tibique te qui.</p>
                                <p>Mel iudico constituto efficiendi. Eu ponderum mediocrem has, vitae adolescens in pro. Mea liber ridens inermis ei, mei legendos vulputate an, labitur tibique te qui.</p>
                                <p>Omnes deseruisse pri. Quo aeterno legimus insolens ad. Sit cu detraxit constituam, an mel iudico constituto efficiendi. Eu ponderum mediocrem has, vitae adolescens in pro. Mea liber ridens inermis ei, mei legendos vulputate an, labitur tibique te qui. Mel iudico constituto efficiendi. Eu ponderum mediocrem has, vitae adolescens in pro. Mea liber ridens inermis ei, mei legendos vulputate an, labitur tibique te qui.</p>
                            </div>
                        </div>
                    </div>
                </div>-->
                <div class="event-highlights">
                    {!! $event->description !!}
                </div>
                <div class="event-location">
                    <h2>Location</h2>
                    <p><span>Camp Nou</span> C. Aristides Maillol, 12 (Av. Joan XIII) Barcelona</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="event-map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2993.6864762013092!2d2.1206311157511477!3d41.380895979264686!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a498f576297baf%3A0x44f65330fe1b04b9!2sCamp+Nou!5e0!3m2!1sen!2sph!4v1491114335931" width="1200" height="435" allowfullscreen></iframe>
</section>

@endsection