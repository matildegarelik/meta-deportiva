@extends('layouts.app')

@section('pagetitle','Registro a evento')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/jquery-smartwizard/dist/css/smart_wizard.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/jquery-smartwizard/dist/css/smart_wizard_dots.min.css') }}">
<style>
.section-featured-header.all-sports-events {
    min-height: 122px;
    /*background: url(../images/page-featured-img-category.jpg) no-repeat center center;*/
}
.section-featured-header.all-sports-events .section-content {
    padding: 0px 0 0px;
}
.col-form-label{
    text-align: right;
}
.section-order-details-event-info .seat-details h3 {
    margin: 25px 0 15px;
}
#categories-table tr:hover {
    cursor: pointer;
}
th,td{
    width: 20% !important;
}
.ticket-price .table > tbody {
    overflow-y: scroll;
    height:auto;
    max-height:250px;
}
.sw .toolbar {
    margin-top: 60px;
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
        <h1 class="entry-title">Formulario de registro</h1>
    </div>
</section>

<section class="section-page-content">
    <div class="container">
        <div class="row">
            <!--<div id="primary" class="col-md-6">
                <div class="section-order-details-event-title">
                    <span class="event-caption">UEFA CHAMPIONS LEAGUE</span>
                    <h2 class="event-title"><strong>FC BARCELONA</strong> VS <strong>AC MILAN</strong></h2>
                    <img class="event-img" src="images/order-details-img.jpg" alt="image">
                </div>
            </div>	
            
            <div id="secondary" class="col-md-6">
                <div class="section-order-details-event-info">
                    <div class="venue-details">
                        <h3>Venue & Event Information</h3>
                        <div class="venue-details-info">
                            <p>Estadi Camp Nou - Barcelona</p>
                            <p>Wednesday <span>10 August 2016 8:30 PM</span></p>
                        </div>
                    </div>
                    
                    <div class="seat-details">
                        <h3>Seats Order Information</h3>
                        <div class="seat-details-info">
                            <table class="table seat-row">
                                <thead>
                                    <tr>
                                        <th>Section</th>
                                        <th>Row</th>
                                        <th>Seats</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>C16-Middle</td>
                                        <td>5</td>
                                        <td>10-12</td>
                                    </tr>
                                </tbody>
                            </table>	
                            <table class="table number-tickets">
                                <thead>
                                    <tr>
                                        <th>Delivery</th>
                                        <th>Number of Tickets</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Instant Download</td>
                                        <td>
                                            <div class="qty-select">
                                                <div class="qty-minus"> 
                                                    <a class="qty-btn" href="#">-</a>
                                                </div>
                                                <div class="qty-input">
                                                    <input type="text" class="quantity-input" value="1" />
                                                </div>
                                                <div class="qty-plus"> 
                                                    <a class="qty-btn" href="#">+</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="seat-details-info-price">
                            <table class="table total-price">
                                <tbody>
                                    <tr>
                                        <td>Total Price</td>
                                        <td class="price">USD $134</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="section-order-details-event-action">
                    <ul class="row">
                        <li class="col-xs-6 col-sm-6">
                            <a class="secondary-link" href="#">Back</a>
                        </li>
                        <li class="col-xs-6 col-sm-6">
                            <a class="primary-link" href="#">Place Order</a>
                        </li>
                    </ul>
                </div>
            </div>-->
            <div id="smartwizard">
                <ul class="nav">
                    <li class="nav-item">
                      <a class="nav-link" href="#step-1">
                        <div class="num">1</div>
                        Datos del evento
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#step-2">
                        <span class="num">2</span>
                        Datos personales
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#step-3">
                        <span class="num">3</span>
                        Preguntas adicionales
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " href="#step-4">
                        <span class="num">4</span>
                        Pago
                      </a>
                    </li>
                </ul>
                <form method="POST" action="{{route('participante.save_register')}}" id="form-registro">
                    @csrf
                    <input name="event" type="hidden" value="{{$event->id}}">
                    <div class="tab-content">
                        <div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1">
                            @include('participante.registration_form.step1',['event'=>$event])
                        </div>
                        <div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2">
                            @include('participante.registration_form.step2',['participante'=>$participante])
                        </div>
                        <div id="step-3" class="tab-pane" role="tabpanel" aria-labelledby="step-3">
                            @include('participante.registration_form.step3',['event'=>$event])
                        </div>
                        <div id="step-4" class="tab-pane" role="tabpanel" aria-labelledby="step-4">
                            @include('participante.registration_form.step4',['event'=>$event])
                        </div>
                    </div>
                </form>
             
                <!-- Include optional progressbar HTML -->
                <div class="progress">
                  <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>  
        </div>
    </div>
</section>

@endsection

@section('js')
<script src="{{ asset('assets/jquery-smartwizard/dist/js/jquery.smartWizard.js') }}"></script>
<script>
$(function() {
    // SmartWizard initialize
    $('#smartwizard').smartWizard({
        theme: 'dots',
        toolbar: {
            position: 'bottom', // none|top|bottom|both
        },
        anchor: {
            enableNavigationAlways: true, // Activates all anchors clickable always
            enableDoneState: true, // Add done state on visited steps
            markPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
            unDoneOnBackNavigation: true, // While navigate back, done state will be cleared
            enableDoneStateNavigation: true // Enable/Disable the done state navigation
        },
        
        lang: { // Language variables for button
            next: 'Siguiente',
            previous: 'Previo'
        },
    });
    
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
});
$('tr').on('click', function(){
    if ($(this).hasClass("select-seat") && $(this).hasClass("cat")) { 
        //$(this).siblings().removeClass("selected");
        //$(this).addClass('selected');
        
        let cat_id = $(this).data('id')
        $('#input-cat').val(cat_id)
        let precio = $(this).data('precio')
        $('#total_price').html(precio)
        
    }
})
function validarCupon(){
    //e.prventDefault()
    let cupon = $('#cupon-code').val()
    $.get('/validar-cupon/'+cupon, function(data){
        if(data){
            toastr.success('Cupón válido')
            let curr = $('#total_price').html()
            $('#total_price').html(curr-data.discount_amount)
            $('#cupon_id').val(data.id)
            $('#cupon-code').prop('readonly', true)
        }else{
            toastr.error('Cupón inválido')
        }
    })
    //console.log(cupon)
}
function registrar(){ 
    let selected_cat=false;
    $('tr.cat').each(function(e){
        if($(this).hasClass('selected')) selected_cat=true
    })
    if(selected_cat){
        $('#form-registro').submit()
    }else{
        toastr.warning('Seleccionar modalidad')
    }
    // chequear si estan respondidas las preguntas obligatorias y todos los datos personales
}
</script>
@endsection