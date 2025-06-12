<div>
    <form class="bg-white rounded-lg shadow-lg p-6"  wire:submit="save">
       
        <x-validation-errors class="mb-4"/>

        <div class="mb-4 text-white">
            <x-label class="mb-1">
                <strong>Mensaje</strong>
            </x-label>
            <x-textarea wire:model="content" class="w-full" placeholder="Ingrese un mensaje"/>
        </div>

        <div class="flex justify-end">
            <x-button>
                Enviar
            </x-button>
        </div>
    </form>
</div>
