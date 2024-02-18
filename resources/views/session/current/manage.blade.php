@include('layouts.navbars.session-users-sidebar', ['users' => $session->users()->orderBy("name")->get()])
<link href="{{ asset('css/users-sidebar.css') }}" rel="stylesheet">

@include('layouts.navbars.session-features-sidebar', ['features' => $session->features])
<link href="{{ asset('css/features-sidebar.css') }}" rel="stylesheet">

<link href="{{ asset('css/card.css') }}" rel="stylesheet">

<link href="{{ asset('css/participant-cards.css') }}" rel="stylesheet">

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

<!-- Script to handle Start/Reveal logic -->
<script>
    let votingStarted = false;

    function startVoting() {
        const btn = document.getElementById('startRevealBtn');
        if (!votingStarted) {
            btn.innerText = 'Reveal Cards';
            votingStarted = true;
        } else {
            btn.innerText = 'Start';
            votingStarted = false;
        }
    }
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
                        @foreach ([0, 1, 2, 3, 5, 8, 13] as $card)
                            <div class="p-2">
                                <div class="card">
                                    {{ $card }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="p-6 text-center">
                    <p class="text-gray-600">PICK A CARD</p>
                </div>
            </div>

            <div class="text-center mt-4">
                <button id="startRevealBtn" onclick="startVoting()" class="btn btn-primary">Start</button>
            </div>

            <div class="participant-cards-container">
                @if($session->admin->id != auth()->id())
                    <div class="participant-card">
                        <div class="participant-name">{{ $session->admin->name }}</div>
                    </div>
                @endif
                @foreach ($session->users as $user)
                    @if($user->id != auth()->id())
                    <div class="participant-card">
                        <div class="participant-name">{{ $user->name }}</div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

</x-app-layout>
