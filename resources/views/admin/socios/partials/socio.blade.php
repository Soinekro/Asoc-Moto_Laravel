<div>
    <div class="row">
        @if (!isset($socio))
            @livewire('admin.socios.search-socio')
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
            <label for="numero"> @if(isset($socio)) Documento Registrado: {{strtoupper($socio->document->name)}} @else # Doc. Sin Registrar @endif</label>
            <input type="number" autocomplete="null" @if(isset($socio)) value="{{$socio->numero}}" @else value="{{old('numero')}}" @endif  name="numero" id="numero" placeholder=" @if(isset($socio)) {{$socio->numero}} @else Ingrese Celular del socio @endif " class="form-control" >
            @error('numero')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="celular">Celular</label>
            <input type="number" autocomplete="null" @if(isset($socio)) value="{{$socio->celular}}" @else value="{{old('celular')}}" @endif name="celular" id="celular" placeholder=" @if(isset($socio)) {{$socio->celular}} @else Ingrese Celular del socio @endif " class="form-control" >
            @error('celular')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>

        <div class="form-group col-md-6">
            <label for="distrito">Distrito</label>
            <input type="text" autocomplete="null" @if(isset($socio)) value="{{$socio->distrito}}" @else value="{{old('distrito')}}" @endif name="distrito" id="distrito" placeholder=" @if(isset($socio)) {{$socio->distrito}} @else Ingrese Nombre del socio @endif " class="form-control" >
            @error('distrito')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>

        <div class="form-group col-md-6">
            <label for="direccion">Direccion</label>
            <input type="text" autocomplete="null" @if(isset($socio)) value="{{$socio->direccion}}" @else value="{{old('direccion')}}" @endif name="direccion" id="direccion" placeholder=" @if(isset($socio)) {{$socio->direccion}} @else Ingrese Nombre del socio @endif " class="form-control" >
            @error('direccion')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group col-md-3">
            <label for="status">Estado Evaluacion</label>
            <div>
                <label class="form-group"><input type="radio" name="status" id="status" value="1" @if(isset($socio) && $socio->status == 1) checked @endif>Activo</label>
                <label class="form-group"><input type="radio" name="status" id="status" value="2" @if(isset($socio) && $socio->status == 2) checked @endif>Inactivo</label>
            </div>
            @error('status')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
</div>
