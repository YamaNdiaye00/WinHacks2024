<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Session') }}
        </h2>
    </x-slot>
    <form method="POST" action="{{ route('session.store') }}">
        @csrf

        <!-- Session Name -->
        <div>
            <x-input-label for="session_name" :value="__('Session Name')"/>
            <x-text-input id="session_name" class="block mt-1 w-full" name="session_name" required
                          autofocus/>
            <x-input-error :messages="$errors->get('session_name')" class="mt-2"/>
        </div>

        <!-- Buttons -->
        <div class="flex justify-between mt-4">
            <!-- Create Button -->
            <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"
               href="{{ route('session.store') }}">
                {{ __('Create Session') }}
            </a>
        </div>
    </form>
</x-app-layout>>
