<div class="card">
    <div class="card-header">
        <input wire:model="search" class="form-control" type="text" placeholder="Ingrese el nombre de un post">
    </div>
    @if ($eventos->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Evento</th>
                        <th>Descripcion de Evento</th>
                        <th>Direccion de Evento</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($eventos as $e)
                        <tr>
                            <td>{{$e->name_evento}}</td>
                            <td>{{$e->descripcion_evento}}</td>
                            <td>{{$e->direccion}}</td>
                            <?php
                            $fechaActivo = date ("d/m/Y", strtotime ($e->fecha_hora));
                            $horaActivo = date ("H:i:s", strtotime ($e->fecha_hora));
                            ?>
                            <td>{{$fechaActivo}}</td>
                            <td>{{$horaActivo}}</td>

                            {{-- <td width="10px">
                                <a class="btn btn-primary btn-sm"
                                    href="{{ route('admin.eventos.edit', $e) }}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.eventos.destroy', $e) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>

                                </form>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $eventos->links() }}
        </div>
    @else
        <div class="card-body">
            <Strong>No hay ningun registro</Strong>
        </div>
    @endif

</div>
