<div>
    <div class="row">
        <div class="form-group col-md-6">
            <label for="name_evento"> @if(isset($evento)) Nombre del Evento: {{strtoupper($evento->name_evento)}} @else Nuevo Evento @endif</label>
            <input type="text" autocomplete="null" @if(isset($evento)) value="{{$evento->name_evento}}" @else value="{{old('name_evento')}}" @endif  name="name_evento" id="name_evento" placeholder=" @if(isset($evento)) {{$evento->name_evento}} @else Ingrese Nombre del Evento @endif " class="form-control" >
            @error('name_evento')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="direccion"> @if(isset($evento)) Direccion del Evento: {{strtoupper($evento->direccion)}} @else Direccion del Evento @endif</label>
            <input type="text" autocomplete="null" @if(isset($evento)) value="{{$evento->direccion}}" @else value="{{old('direccion')}}" @endif  name="direccion" id="direccion" placeholder=" @if(isset($evento)) {{$evento->direccion}} @else Ingrese Direccion del Evento @endif " class="form-control" >
            @error('direccion')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="descripcion_evento">Descripcion del Evento</label><br>
            <textarea name="descripcion_evento" id="" cols="20" class="form-control" rows="5" >@if(isset($evento)) {{$evento->descripcion_evento}} @endif </textarea>
            @error('descripcion_evento')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>

        <div class="form-group col-md-6">
            <label for="fecha_hora">Direccion</label>
            <input type="datetime-local" min="9:00" max="16:00" autocomplete="null" @if(isset($evento)) value="{{$evento->fecha_hora}}" @else value="{{old('fecha_hora')}}" @endif name="fecha_hora" id="fecha_hora" placeholder=" @if(isset($evento)) {{$evento->fecha_hora}} @else Ingrese Fecha y hora del Evento @endif " class="form-control" >
            @error('fecha_hora')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
</div>
