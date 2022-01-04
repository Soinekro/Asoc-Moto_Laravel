<div>
    <div class="row">
        <div class="form-group col-md-12">
            <label for="name_evento">Evento</label>
            <br>
            <select class="form-control" name="evento_socios_id" id="evento_socios_id">
                @foreach ($eventos as $e)
                    <option value="{{ $e->id }}"> Evento {{ strtoupper($e->name_evento) }} a realizarse:
                        {{ $e->fecha_hora }} </option>
                @endforeach
            </select>
            @error('name_evento')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group col-md-12 row-span-6">
            <label for="direccion"> @if (isset($evento)) Direccion del Evento: {{ strtoupper($evento->direccion) }} @else Justificacion: @endif</label>
            <textarea class="form-control" name="justificacion" id="editor" cols="30" rows="5">
                @if (isset($evento) && isset($evento->justificacion))
                    {!! $evento->justificacion !!}
                @endif
            </textarea>
            @error('justificacion')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

    </div>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
</div>
