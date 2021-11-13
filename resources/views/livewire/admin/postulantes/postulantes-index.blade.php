<div class="card">
    <div class="card-header">
        <input wire:model="search" class="form-control" type="text" placeholder="Ingrese el nombre de un post">
    </div>
    @if ($postulantes->count())
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Estado</th>
                    <th>Distrito</th>
                    <th colspan="2" style="text-align: center">Acciones</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($postulantes as $p)
                    <tr>
                        <td>{{$p->name}}</td>
                        <td>{{$p->email}}</td>
                        <td>@if ($p->status == 1)
                            <label class="badge bg-warning">Pendiente</label>
                        @else
                            <label class="badge bg-success">Evaluado</label>
                        @endif</td>
                        <td>{{$p->distrito}}</td>
                        <td width="10px">
                            <a class="btn btn-primary btn-sm" href="{{route('admin.postulantes.edit',$p)}}">Editar</a>
                        </td>
                        <td width="10px">
                        <form action="{{route('admin.postulantes.destroy',$p)}}" method="POST">
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
        {{$postulantes->links()}}
    </div>
    @else
        <div class="card-body">
            <Strong>No hay ningun registro</Strong>
        </div>
    @endif

</div>
