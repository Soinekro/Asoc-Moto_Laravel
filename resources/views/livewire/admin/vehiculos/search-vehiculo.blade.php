<div class="card col-md-6">
    <div class="card-header">
        <input wire:model="search" class="form-control" type="text" placeholder="Ingrese el nombre de un socio">
    </div>
    @if ($socios->count())
    <div class="card-body">
        <select class="form-control" name="socio_id" id="socio_id">
            @foreach ($socios as $item)
            <option value="{{$item->id}}">{{$item->user->name}}</option>
            @endforeach
        </select>
    </div>
    @else
        <div class="card-body">
            <Strong>No hay ningun registro</Strong>
        </div>
    @endif

</div>
