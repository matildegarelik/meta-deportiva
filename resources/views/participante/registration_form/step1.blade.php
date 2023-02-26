<div class="section-order-details-event-info">
    <div class="venue-details">
        <h3>Ubicación & Información del evento</h3>
        <div class="venue-details-info">
            <p>{{$event->name}} - {{$event->location}}</p>
            <p>{{date_format(new Datetime($event->start_date),'g:i A l')}} <span>
                {{date_format(new Datetime($event->start_date),'F  j, Y')}}</span></p>
        </div>
    </div>
    
    <div class="seat-details">
        <h3>Modalidades</h3>
        <div class="seat-details-info ticket-price">
            <table class="table table-hover" id="categories-table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Edades</th>
                        <th>Género</th>
                        <th>Precio</th>
                        <th>Cupo disponible</th>
                    </tr>
                </thead>
                <tbody>
                    <input id="input-cat" name="category" type="hidden" value="{{$event->categories[0]->id}}">
                    @foreach($event->categories as $cat)
                    <tr class="select-seat cat @if($cat->cupo_disponible()==0) no-disp @endif" data-id="{{$cat->id}}" data-precio="{{$cat->price}}" data-cat='{{$cat}}'>
                        
                        <td>{{$cat->name}}</td>
                        <td>{{$cat->age_from}} - {{$cat->age_to}}</td>
                        <td>{{$cat->format_genero()}}</td>
                        <td>${{$cat->price}}</td>
                        <td><b>{{$cat->cupo_disponible()}}</b>/{{$cat->availability}}</td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
        
    </div>
</div>