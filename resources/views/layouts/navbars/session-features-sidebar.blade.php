<!-- users-sidebar toggle button -->
<div id="features-sidebar" class="features-sidebar">
    <ul>
        @foreach ($features as $feature)
            <li>{{ $feature->title }}</li>
        @endforeach
    </ul>
</div>

<script>
    // Function to toggle the users-sidebar
    function toggleFeatureSidebar() {
        var sidebar = document.getElementById("features-sidebar");
        var toggleButton = document.getElementById("featureSidebarCollapse");
        sidebar.classList.toggle('active');
        toggleButton.classList.toggle('active');
    }
</script>
