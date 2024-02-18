@include('layouts.navbars.session-users-sidebar', ['users' => $session->users])
<link href="{{ asset('css/users-sidebar.css') }}" rel="stylesheet">

@include('layouts.navbars.session-features-sidebar', ['features' => $session->features])
<link href="{{ asset('css/features-sidebar.css') }}" rel="stylesheet">

<link href="{{ asset('css/card.css') }}" rel="stylesheet">


<script>
    document.addEventListener('DOMContentLoaded', function() {
        var header = document.getElementById('big-header');
        var sidebar = document.getElementById('users-sidebar');
        var toggleButton = document.getElementById('userSidebarCollapse');
        sidebar.style.top = header.offsetHeight + 'px';
        toggleButton.style.top = header.offsetHeight + 'px';
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var header = document.getElementById('big-header');
        var sidebar = document.getElementById('features-sidebar');
        var toggleButton = document.getElementById('featureSidebarCollapse');
        sidebar.style.top = header.offsetHeight + 'px';
        toggleButton.style.top = header.offsetHeight + 'px';
    });
</script>

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ $session->name . " - " . $session->admin->name}}
                </h2>
            </div>
        </div>
    </x-slot>
    <button onclick="toggleSidebar()" id="userSidebarCollapse" class="toggle-button">
        Show Participants
    </button>

    <button onclick="toggleFeatureSidebar()" id="featureSidebarCollapse" class="toggle-feature-button">
        Show Features
    </button>
    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-xl sm:rounded-lg">

                <!-- Cards Selection Section -->
                <div class="p-6">
                    <div class="flex justify-center">
                        @foreach ([0, 1, 2, 3, 5, 8, 13, '?'] as $card)
                            <div class="p-2">
                                <div class="card">
                                    {{ $card }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Manager Label -->
                <div class="p-6 text-center">
                    <p class="text-gray-600">Manager</p>
                    <!-- More content goes here -->
                </div>

            </div>
        </div>
    </div>

</x-app-layout>
