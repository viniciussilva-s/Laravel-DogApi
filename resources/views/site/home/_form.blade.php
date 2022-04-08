@if(isset($lista))
<div class="form-group">
  <label for="select2_breeds" class="form-label">Selecione o seu dog: </label>
  <select class="select2_breeds">
    @foreach($lista as $breed => $breed_type)
    @if( empty($breed_type) )
        <option value="{{$breed}}"> {{$breed}} </option>
        @else
          <optgroup label="{{$breed}}">
            @foreach($breed_type as $key => $type)
              <option value="{{$breed}}-{{$type}}">
              {{$breed}} - {{$type}}
              </option>
            @endforeach
            
          </optgroup>
      @endif
    @endforeach
  </select>
</div>

<div class="form-group">
  <label for="nameDog" class="form-label">Digite o nome do cachorro</label>
  <input class="form-control" type="text" name="nameDog" id="nameDog"  maxlength="100">
</div>

<div class="form-group">
  <label for="select2" class="form-label">Selecione o tipo da fonte: </label>
  <select class="select2">
    @foreach($fonts as $font)
    @if(!empty($font) )
        <option value="{{$font['descricao']}}"> {{$font['descricao']}} </option>          
      @endif
    @endforeach
  </select>
</div>
<div class="form-group">
  <label for="color" class="form-label">Selecione a cor do texto</label>
  <input type="color" class="form-control form-control-color" id="color" value="#563d7c" title="Choose your color">
</div>
@endif

