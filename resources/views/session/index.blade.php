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
                                <span
                                    class="text-gray-800"> {{ $session->admin->id == auth()->id() ? "You" :  $session->admin->name}} </span>
                            </div>
                            <div class="flex justify-center"> <!-- Center the button in the grid cell -->
                                <a href="{{ route('sessions.manage', $session->session_id) }}"
                                   class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                    Open
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>

</x-app-layout>

