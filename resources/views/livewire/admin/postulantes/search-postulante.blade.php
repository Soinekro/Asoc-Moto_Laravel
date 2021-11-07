<div class="form-group col-md-6">
    <label class="form-label">Usuario</label> <input name="user" list="listPost" wire:model="search" type="text" placeholder="Search..."
            class="form-control">
    <datalist id="listPost">
        @if ($postulantes->count())
        @foreach ($postulantes as $postulante)
        <option value="{{ $postulante->name }}"></option>
    @endforeach
        @else
        <option value="">no hay Resultados</option>
        @endif
    </datalist>

    @error('user')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
