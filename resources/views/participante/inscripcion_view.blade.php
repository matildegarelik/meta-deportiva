@extends('layouts.app',['extra_pages'=>$extra_pages])

@section('pagetitle','Inscripcion')

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
.section-event-single-featured-header {
    background: url(../{{env('PUBLIC_PATH')}}images/eventos/{{$inscripcion->event->main_image}}) no-repeat center center;
}
.results-btn{
    margin-left:20px;
    background:#fff !important;
    color:#ff5700 !important;
}
.results-btn:hover{
    background:#ff5700 !important;
    color:#fff !important;
}
table#detalles_inscripcion, td, th{
    border: 1px solid;
}
</style>
@endsection

@section('content')

<section class="section-event-single-featured-header">
    <div class="container">
        <div class="section-content">
            <h1>{{$inscripcion->event->name}}</h1> 
            <p>
                <span>
                    <i class="fa fa-map-marker" aria-hidden="true"></i> {{$inscripcion->event->location}}
                </span>
            </p>
        </div>
    </div>
</section>

<section class="section-event-single-header">
    <div class="container">
        <h1>{{$inscripcion->event->name}}</h1>
        <ul class="ticket-purchase">
            <li>
                {{date_format(new Datetime($inscripcion->event->start_date),'l')}} <br>
                {{date_format(new Datetime($inscripcion->event->start_date),'F  j, Y')}}
            </li>
            <li>
                <span>{{date_format(new Datetime($inscripcion->event->start_date),'g:i A')}}</span>
            </li>
            
            @if($inscripcion->event->results)
            <li>
                <a href="{{ $inscripcion->event->results}}" target="_blank" class="results-btn">Ver resultados</a>
            </li>
            @endif
        </ul>
    </div>
</section>

<section class="section-event-single-content">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12" style="border: 1.5px solid; border-radius: 10px; background-color:white; padding: 10px 10px;">
                <h2 style="font-size: 25px;">DETALLES INSCRIPCIÓN  #{{$inscripcion->id}}</h2>
                <br>
                <table id="detalles_inscripcion">
                    <tr>
                        <td>Modalidad: </td>
                        <td>{{$inscripcion->category->name}}</td>
                        <td>Fecha Registro: </td>
                        <td>{{$inscripcion->created_at}}</td>
                        </tr>
                    <tr>
                        <td>Estado:</td>
                        <td>
                            <span style="background-color:
                                @if($inscripcion->estado == 'Confirmado')rgb(143, 225, 151) 
                                @elseif($inscripcion->estado=='Pendiente') rgb(236, 168, 105) 
                                @elseif($inscripcion->estado=='Cancelado') rgb(235, 125, 119)
                                @endif
                                ; color:white; border-radius:5px; padding: 5px 5px;">
                                @if($inscripcion->estado == 'Confirmado') Registro confirmado 
                                @elseif($inscripcion->estado=='Pendiente') En espera de confirmación 
                                @elseif($inscripcion->estado=='Cancelado') Registro cancelado
                                @endif
                            </span>
                        </td>
                        <td>Método de pago:</td>
                        <td>{{$inscripcion->metodo_pago}}</td>
                    </tr>
                    <tr><td colspan="4"></td></tr>
                    <tr><td colspan="4"><b>Respuestas</b></td></tr>
                    @foreach($inscripcion->answers as $answer)
                    <tr>
                        <td colspan="2">{{$answer->question->content}}</td>
                        <td colspan="2">{{$answer->answer}}</td>
                    </tr>

                    @endforeach

                </table>
            </div>
        </div>
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
                    {!! $inscripcion->event->description !!}
                </div>
            </div>
        </div>
    </div>
</section>
@if(count($inscripcion->event->sponsors))
<section class="section-event-single-content">
    <div class="container">
        <div class="row">
            <div id="primary" class="col-sm-12 col-md-12">
                <div class="event-highlights">
                    <h2>Sponsors</h2>
                    <div class="row">
                        @foreach($inscripcion->event->sponsors as $sponsor)
                        <div class="col-sm-3">
                            <a href="#">
                                <img src="{{ asset(env('PUBLIC_PATH').'images/eventos/sponsors/'.$sponsor->image) }}" alt="image" style="height: 50px;">
                            </a>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<section class="section-event-single-content">
    <div class="container">
        <div class="row">
            <div id="primary" class="col-sm-12 col-md-12">
                <div class="event-location">
                    <h2>Ubicación</h2>
                    <p>{{$inscripcion->event->location}}</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="event-map">
    <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2993.6864762013092!2d2.1206311157511477!3d41.380895979264686!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a498f576297baf%3A0x44f65330fe1b04b9!2sCamp+Nou!5e0!3m2!1sen!2sph!4v1491114335931" width="1200" height="435" allowfullscreen></iframe>-->
    <iframe
        width="600"
        height="450"
        style="border:0"
        loading="lazy"
        allowfullscreen
        referrerpolicy="no-referrer-when-downgrade"
        src="https://www.google.com/maps/embed/v1/place?key=AIzaSyC1ftWVTDrIHJfgbBUHeyEJmDbovqpozD4
            &q={{urlencode($inscripcion->event->location)}}&center={{$inscripcion->event->lat}},{{$inscripcion->event->long}}">
    </iframe>
</section>

@endsection