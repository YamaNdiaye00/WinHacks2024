<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ $session->name }}
                </h2>
            </div>
        </div>
    </x-slot>
</x-app-layout>
