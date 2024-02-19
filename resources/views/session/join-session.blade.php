<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Join Session') }}
        </h2>
    </x-slot>
    <form method="POST" action="{{ route('sessions.addUser') }}">
        @csrf
        <div class="flex flex-col items-center justify-center">

            <!-- Session ID -->
            <div class="mb-4 w-1/3">
                <x-input-label for="session_id" :value="__('Session ID')"/>
                <x-text-input id="session_id" class="block mt-1 w-full" name="session_id" required
                              autofocus/>
                <x-input-error :messages="$errors->get('session_id')" class="mt-2"/>
            </div>

            <!-- Session Password -->
            <div class="mb-4 w-1/3">
                <x-input-label for="password" :value="__('Password')"/>
                <x-text-input id="password" class="block mt-1 w-full"
                              type="password"
                              name="password"
                              value="Winhacks"/>
                <x-input-error :messages="$errors->get('password')" class="mt-2"/>
            </div>


            <!-- Buttons -->
            <div class="flex justify-between mt-4">
                <!-- Create Button -->
                <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                    {{ __('Join Session') }}
                </button>
            </div>
        </div>
    </form>
</x-app-layout>>
