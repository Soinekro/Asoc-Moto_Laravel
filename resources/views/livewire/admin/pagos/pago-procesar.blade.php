<div>
    <div class="form-group float-right mr-3">
        <button type="button" class="fas fa-edit btn btn-primary btn-sm" wire:click="$set('open', true)">
            Procesar Pago
        </button>
        <x-jet-dialog-modal wire:model="open">
            <x-slot name="title">
                Pago de {{$pago->socio->user->name}}
            </x-slot>
            <x-slot name="content">

                concepto: {{$pago->concepto}} <br>
                subtotal: {{$pago->opgravadas}} <br>
                IGV: {{$pago->igv}} <br>
                Total: {{$pago->total}}
            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$set('open', false)">
                    Cancelar
                </x-jet-secondary-button>
                <x-jet-danger-button wire:click="save" wire:loading.class="disabled:opacity-25" wire:target="save" >
                    Procesar Boleta/Factura
                </x-jet-danger-button>
                <span wire:loading wire:target="save">
                    Cargando...
                </span>
            </x-slot>
        </x-jet-dialog-modal>
    </div>
</div>
