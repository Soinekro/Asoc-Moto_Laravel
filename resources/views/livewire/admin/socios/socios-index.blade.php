<div class="card">
    <div class="card-header">
        <input wire:model="search" class="form-control" type="text" placeholder="Ingrese el nombre de un socio">
    </div>
    @if ($socios->count())
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>Nombres</td>
                    <td>Email</td>
                    <td colspan="2" style="text-align: center">Acciones</td>
                </tr>
            </thead>
            <tbody>                <tr>
                @foreach ($socios as $socio)
                    <tr>
                        <td>{{$socio->name}}</td>
                        <td>{{$socio->email}}</td>
                        <td>@if ($socio->status == 1)
                            <label class="badge bg-success">Activo</label>
                        @else
                            <label class="badge bg-danger">Inactivo</label>
                        @endif</td>
                        <td width="10px">
                            <a class="btn btn-primary btn-sm" href="{{route('admin.socios.edit',$socio)}}">Editar</a>
                        </td>
                        <td width="10px">
                        <form action="{{route('admin.socios.destroy',$socio)}}" method="socio">
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
        {{$socios->links()}}
    </div>
    @else
        <div class="card-body">
            <Strong>No hay ningun registro</Strong>
        </div>
    @endif

</div>
