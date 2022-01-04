<div class="card">
    <div class="card-header">
        <input wire:model="search" class="form-control" type="text" placeholder="Ingrese el nombre de un post">
    </div>
    @if ($pagos->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Socio</th>
                        <th>concepto</th>
                        <th>op. gravadas</th>
                        <th>igv</th>
                        <th>total</th>
                        <th>estado</th>
                        <th colspan="4">acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pagos as $e)
                        <tr>
                            <td>{{$e->socio->user->name}}</td>
                            <td>{{$e->concepto}}</td>
                            <td>{{$e->opgravadas}}</td>
                            <td>{{$e->igv}}</td>
                            <td>{{$e->total}}</td>
                            <td>
                                @if ($e->estadofe == 0)
                                <label class="badge bg-primary">pendiente</label>
                            @elseif($e->estadofe == 1)
                                <label class="badge bg-success">Enviado y Aceptado</label>
                            @else
                                <label class="badge bg-warning">Error o Obs</label>
                            @endif
                            </td>

                            <td colspan="3">
                                @if ($e->estadofe == 0 || $e->estadofe == 2)
                                @livewire('admin.pagos.pago-procesar', ['pago' => $e], key($e->id))
                                @endif
                            </td>
                            <td colspan="1">
                                <form action="{{ route('admin.pagos.destroy', $e) }}" method="POST">
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
            {{ $pagos->links() }}
        </div>
    @else
        <div class="card-body">
            <Strong>No hay ningun registro</Strong>
        </div>
    @endif

</div>
