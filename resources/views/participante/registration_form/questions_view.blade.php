@foreach($questions as $q)
    <div class="venue-details mt-5 @if($q->required) question-req @endif" data-id="{{$q->id}}" data-type="{{$q->type}}">
        
        <div class="venue-details-info">
            <h3>{{$q->content}}  
                @if($q->required) <span style="color:red">*</span>@endif
            </h3>
            @if($q->type==1) <!-- Open field -->
                <textarea rows="10" name="ans-{{$q->id}}"></textarea>
            @elseif($q->type==2) <!-- YEs/NO -->
                <input type="radio" name="ans-{{$q->id}}" value="SI" />Si
                <input type="radio" name="ans-{{$q->id}}" value="NO" />No
            @elseif($q->type==3) <!-- Select one option -->
                @foreach(explode(',',$q->options) as $option)
                <input type="radio" name="ans-{{$q->id}}" value="{{$option}}">{{$option}}<br>
                @endforeach
            @endif
        </div>
    </div>
@endforeach