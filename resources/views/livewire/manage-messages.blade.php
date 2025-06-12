<div>
    <form class="bg-white rounded-lg shadow-lg p-6 mb-4"  wire:submit="save">
       
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

   @if ($mensajes->count())
         <div class="bg-white rounded-lg shadow-lg p-6">
        <ul class="space-y-4">
            @foreach ($mensajes as $message)
                <li class="flex">
                    <div class="mr-4 shrink-0">
                        <img class="h-8 w*8 rounded-full object-cover object-center" src="{{ $message->user->profile_photo_url }}" alt="">
                    </div>

                    <div class="flex-1">
                        <p>
                            <b>
                                {{ $message->user->name }}
                            </b>

                            <span class="text-xs text-gray-500">
                                {{ $message->created_at->diffForHumans() }}
                            </span>
                        </p>

                        <div>
                            {{ $message->content }}
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>    
   @endif  

</div>
