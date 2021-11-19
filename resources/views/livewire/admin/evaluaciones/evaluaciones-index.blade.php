<div class="card">
    <div class="card-header">
        <input wire:model="search" class="form-control" type="text" placeholder="Ingrese el nombre de un post">
    </div>
    @if ($evaluaciones->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Postulante</th>
                        <th>Socio</th>
                        <th>Estado</th>
                        <th>Distrito</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($evaluaciones as $p)
                        <tr>
                            <td>{{$p->postulante->user->name}}</td>
                            <td>{{$p->socio->user->name}}</td>
                            <td>
                                @if ($p->status == 0)
                                    <label class="badge bg-warning">Desaprobado</label>
                                @elseif($p->status == 1)
                                    <label class="badge bg-primary">Pendiente</label>
                                @else
                                    <label class="badge bg-success">Aprobado</label>
                                @endif
                            </td>
                            <td>{{ $p->postulante->distrito }}</td>
                            {{-- <td width="10px">
                                <a class="btn btn-primary btn-sm"
                                    href="{{ route('admin.evaluaciones.edit', $p) }}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.evaluaciones.destroy', $p) }}" method="POST">
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
            {{ $evaluaciones->links() }}
        </div>
    @else
        <div class="card-body">
            <Strong>No hay ningun registro</Strong>
        </div>
    @endif

</div>
