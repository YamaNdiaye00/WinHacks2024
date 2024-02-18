<!-- users-sidebar toggle button -->
<div id="users-sidebar" class="users-sidebar">
    <ul>
        @foreach ($users as $user)
            <li>{{ $user->name }}</li>
        @endforeach
    </ul>
</div>

<script>
    // Function to toggle the users-sidebar
    function toggleSidebar() {
        var sidebar = document.getElementById("users-sidebar");
        var toggleButton = document.getElementById("userSidebarCollapse");
        sidebar.classList.toggle('active');
        toggleButton.classList.toggle('active');
    }
</script>
