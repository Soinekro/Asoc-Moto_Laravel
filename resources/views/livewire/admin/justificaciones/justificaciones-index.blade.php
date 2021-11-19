<div class="card">
    <div class="card-header">
        <input wire:model="search" class="form-control" type="text" placeholder="Ingrese el nombre de un post">
    </div>
    @if ($justificaciones->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Socio</th>
                        <th>Evento</th>
                        <th>justificacion</th>
                        <th>estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($justificaciones as $e)
                        <tr>
                            <td>{{$e->socio->user->name}}</td>
                            <td>{{$e->evento->name_evento}}</td>
                            <td>{{$e->justificacion}}</td>
                            <td>
                                @if ($e->status == 0)
                                <label class="badge bg-warning">Desaprobado</label>
                            @elseif($e->status == 1)
                                <label class="badge bg-primary">Pendiente</label>
                            @else
                                <label class="badge bg-success">Aprobado</label>
                            @endif
                            </td>

                            <td width="10px">
                                <a class="btn btn-primary btn-sm"
                                    href="{{ route('admin.justificaciones.edit', $e) }}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.justificaciones.destroy', $e) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>

                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $justificaciones->links() }}
        </div>
    @else
        <div class="card-body">
            <Strong>No hay ningun registro</Strong>
        </div>
    @endif

</div>
