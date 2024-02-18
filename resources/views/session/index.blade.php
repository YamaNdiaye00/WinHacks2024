<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Sessions') }}
                </h2>
            </div>
            <div class="flex space-x-6">
                <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25
                transition" href="{{ route('sessions.join') }}">
                    Join Session
                </a>
                <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25
                transition" href="{{ route('sessions.create') }}">
                    Create Session
                </a>
            </div>
        </div>
    </x-slot>


    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white justify-center shadow-sm sm:rounded-lg">

                <div class="grid grid-cols-4 gap-2 text-center mb-1 bg-gray-100">
                    <div><strong>Session Name</strong></div>
                    <div><strong>Session ID</strong></div>
                    <div><strong>Administrator</strong></div>
                </div>

                <div class="py-1">
                    @foreach ($sessions as $session)
                        <div class="grid grid-cols-4 gap-2 text-center py-2 my-1">
                            <div>
                                <span class="text-gray-800">{{ $session->name }}</span></button>
                            </div>
                            <div>
                                <span class="text-gray-800"> {{ $session->session_id }} </span>
                            </div>
                            <div>
                                <span class="text-gray-800"> {{ $session->admin->id == auth()->id() ? "You" :  $session->admin->name}} </span>
                            </div>
                            <div class="flex justify-center"> <!-- Center the button in the grid cell -->
                                <a href="#" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                    Open
                                </a>
                            </div>
{{--                            <div>--}}
{{--                                <x-dropdown>--}}
{{--                                    <x-slot name="trigger">--}}
{{--                                        <button>--}}
{{--                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400"--}}
{{--                                                 viewBox="0 0 20 20" fill="currentColor">--}}
{{--                                                <path--}}
{{--                                                        d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"/>--}}
{{--                                            </svg>--}}
{{--                                        </button>--}}
{{--                                    </x-slot>--}}

{{--                                    <x-slot name="content">--}}
{{--                                        <x-dropdown-link :href="route('produit.edit', $produit)">--}}
{{--                                            {{ __('Détails') }}--}}
{{--                                        </x-dropdown-link>--}}
{{--                                        <x-dropdown-link :href="route('produit.edit', $produit)">--}}
{{--                                            {{ __('Modifier') }}--}}
{{--                                        </x-dropdown-link>--}}

{{--                                        <form method="POST" action="{{ route('produit.destroy', $produit) }}">--}}
{{--                                            @csrf--}}
{{--                                            @method('delete')--}}
{{--                                            <x-dropdown-link :href="route('produit.destroy', $produit)"--}}
{{--                                                             onclick="event.preventDefault(); this.closest('form').submit();">--}}
{{--                                                {{ __('Supprimer') }}--}}
{{--                                            </x-dropdown-link>--}}
{{--                                        </form>--}}
{{--                                    </x-slot>--}}

{{--                                </x-dropdown>--}}
{{--                            </div>--}}

                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>

</x-app-layout>

