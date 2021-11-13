<div class="card">
    <div class="card-header">
        <input wire:model="search" class="form-control" type="text" placeholder="Ingrese el nombre de un socio">
    </div>
    @if ($vehiculos->count())
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr class="bg bg-primary">
                    <td>Name</td>
                    <td>Placa</td>
                    <td>titulo</td>
                    <td>soat</td>
                    <td>Modelo</td>
                    <td>Serie Motor</td>
                    <td colspan="2" style="text-align: center">Acciones</td>
                </tr>
            </thead>
            <tbody>                <tr>
                @foreach ($vehiculos as $vehiculo)
                    <tr>
                        <td>{{$vehiculo->name}}</td>
                        <td>{{$vehiculo->placa}}</td>
                        <td>{{$vehiculo->titulo}}</td>
                        <td>{{$vehiculo->soat}}</td>
                        <td>{{$vehiculo->modeloVehiculo}}</td>
                        <td>{{$vehiculo->serieMotor}}</td>
                        <td width="10px">
                            <a class="btn btn-primary btn-sm" href="{{route('admin.vehiculos.edit',$vehiculo)}}">Editar</a>
                        </td>
                        <td width="10px">
                        <form action="{{route('admin.vehiculos.destroy',$vehiculo)}}" method="POST">
                            @csrf
                            @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                        </td>
                    </form>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        {{$vehiculos->links()}}
    </div>
    @else
        <div class="card-body">
            <Strong>No hay ningun registro</Strong>
        </div>
    @endif

</div>
