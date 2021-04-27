{{$dica}}
<br>
@foreach($letras as $letra)
    
    <input type="text" maxlength="1" value="{{$letra}}" style="width: 50px; text-align: left;">
@endforeach