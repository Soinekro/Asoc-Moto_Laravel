<div>
    <div class="row">
        @if (!isset($postulante))
            @livewire('admin.postulantes.search-postulante')
        @endif
        <div class="form-group col-md-6">
            <label for="document_id">tipo Documento</label>
            <select class="form-control" name="document_id" id="document_id">
                @foreach ($type_documents as $td)
                <option value="{{$td->id}}">{{$td->name}}</option>
                @endforeach
            </select>
            @error('document_id')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="numero"> @if(isset($postulante)) Documento Registrado: {{strtoupper($postulante->document->name)}} @else # Doc. Sin Registrar @endif</label>
            <input type="number" autocomplete="null" @if(isset($postulante)) value="{{$postulante->numero}}" @else value="{{old('numero')}}" @endif  name="numero" id="numero" placeholder=" @if(isset($postulante)) {{$postulante->numero}} @else Ingrese Celular del Postulante @endif " class="form-control" >
            @error('numero')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="celular">Celular</label>
            <input type="number" autocomplete="null" @if(isset($postulante)) value="{{$postulante->celular}}" @else value="{{old('celular')}}" @endif name="celular" id="celular" placeholder=" @if(isset($postulante)) {{$postulante->celular}} @else Ingrese Celular del Postulante @endif " class="form-control" >
            @error('celular')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>

        <div class="form-group col-md-6">
            <label for="distrito">Distrito</label>
            <input type="text" autocomplete="null" @if(isset($postulante)) value="{{$postulante->distrito}}" @else value="{{old('distrito')}}" @endif name="distrito" id="distrito" placeholder=" @if(isset($postulante)) {{$postulante->distrito}} @else Ingrese Nombre del Postulante @endif " class="form-control" >
            @error('distrito')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>

        <div class="form-group col-md-6">
            <label for="direccion">Direccion</label>
            <input type="text" autocomplete="null" @if(isset($postulante)) value="{{$postulante->direccion}}" @else value="{{old('direccion')}}" @endif name="direccion" id="direccion" placeholder=" @if(isset($postulante)) {{$postulante->direccion}} @else Ingrese Nombre del Postulante @endif " class="form-control" >
            @error('direccion')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group col-md-3">
            <label for="status">Estado Evaluacion</label>
            <div>
                <label class="form-group"><input type="radio" name="status" id="status" value="1" @if(isset($postulante) && $postulante->status == 1) checked @endif>Pendiente</label>
                <label class="form-group"><input type="radio" name="status" id="status" value="2" @if(isset($postulante) && $postulante->status == 2) checked @endif> Evaluado</label>
            </div>
            @error('status')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
</div>
