<div class="card">
    <div class="card-header">
        <input wire:model="search" class="form-control" type="text" placeholder="Ingrese el nombre de un post">
    </div>
    @if ($postulantes->count())
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>Name</td>
                    <td>Email</td>
                    <td colspan="2" style="text-align: center">Acciones</td>
                </tr>
            </thead>
            <tbody>                <tr>
                @foreach ($postulantes as $post)
                    <tr>
                        <td>{{$post->name}}</td>
                        <td>{{$post->email}}</td>
                        <td width="10px">
                            <a class="btn btn-primary btn-sm" href="{{route('admin.postulantes.edit',$post)}}">Editar</a>
                        </td>
                        <td width="10px">
                        <form action="{{route('admin.postulantes.destroy',$post)}}" method="POST">
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
