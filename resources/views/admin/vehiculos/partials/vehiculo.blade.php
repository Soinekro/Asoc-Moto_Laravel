<div>
    <div class="row">
        @if (!isset($vehiculo))
            @livewire('admin.vehiculos.search-vehiculo')
        @endif
        <div class="form-group col-md-6">
            <label for="placa">placa</label>
            <input type="text" autocomplete="null" @if(isset($vehiculo)) value="{{$vehiculo->placa}}" @else value="{{old('placa')}}" @endif  name="placa" id="placa" placeholder=" @if(isset($vehiculo)) {{$vehiculo->placa}} @else Ingrese placa del vehiculo @endif " class="form-control" >
            @error('placa')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="titulo"> Titulo de Propiedad</label>
            <input type="text" autocomplete="null" @if(isset($vehiculo)) value="{{$vehiculo->titulo}}" @else value="{{old('titulo')}}" @endif  name="titulo" id="titulo" placeholder=" @if(isset($vehiculo)) {{$vehiculo->titulo}} @else Ingrese titulo del vehiculo @endif " class="form-control" >
            @error('titulo')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="soat">{{strtoupper('soat')}}</label>
            <input type="text" autocomplete="null" @if(isset($vehiculo)) value="{{$vehiculo->soat}}" @else value="{{old('soat')}}" @endif name="soat" id="soat" placeholder=" @if(isset($vehiculo)) {{$vehiculo->soat}} @else Ingrese soat del vehiculo @endif " class="form-control" >
            @error('soat')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>

        <div class="form-group col-md-6">
            <label for="modeloVehiculo">Modelo Vehiculo</label>
            <input type="text" autocomplete="null" @if(isset($vehiculo)) value="{{$vehiculo->modeloVehiculo}}" @else value="{{old('modeloVehiculo')}}" @endif name="modeloVehiculo" id="modeloVehiculo" placeholder=" @if(isset($vehiculo)) {{$vehiculo->modeloVehiculo}} @else Ingrese Modelo del vehiculo @endif " class="form-control" >
            @error('modeloVehiculo')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="serieMotor">Serie de Motor</label>
            <input type="text" autocomplete="null" @if(isset($vehiculo)) value="{{$vehiculo->serieMotor}}" @else value="{{old('serieMotor')}}" @endif name="serieMotor" id="serieMotor" placeholder=" @if(isset($vehiculo)) {{$vehiculo->serieMotor}} @else Ingrese Serie Motor del vehiculo @endif " class="form-control" >
            @error('serieMotor')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group col-md-3">
            <label for="type_veh">Estado Evaluacion</label>
            <div>
                <label class="form-group"><input type="radio" name="type_veh" id="type_veh" value="Normal" @if(isset($vehiculo) && $vehiculo->type_veh == "Normal") checked @else checked @endif>Normal</label>
                <label class="form-group"><input type="radio" name="type_veh" id="type_veh" value="Torito" @if(isset($vehiculo) && $vehiculo->type_veh == "Torito") checked @endif>Torito</label>
            </div>
            @error('type_veh')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
</div>
