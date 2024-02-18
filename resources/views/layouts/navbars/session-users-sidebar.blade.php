<!-- Sidebar toggle button -->
<div id="sidebar" class="sidebar">
    <ul>
        @foreach ($users as $user)
            <li>{{ $user->name }}</li>
        @endforeach
    </ul>
</div>

<script>
    // Function to toggle the sidebar
    function toggleSidebar() {
        var sidebar = document.getElementById("sidebar");
        var toggleButton = document.getElementById("sidebarCollapse");
        sidebar.classList.toggle('active');
        toggleButton.classList.toggle('active');
    }
</script>
