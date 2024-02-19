<link href="{{ asset('css/feature.css') }}" rel="stylesheet">

<div id="features-sidebar" class="features-sidebar text-center">
    <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25
                transition" href="#" data-toggle="modal" data-target="#featureModal">
        Add new feature
    </a>
    <ul>
        @foreach ($features as $feature)
            <div class="feature-card">
                <div class="feature-header">
                    <span class="feature-id">{{ $feature->id }}</span>
                    <span class="feature-title">{{ $feature->title }}</span>
                </div>
                <div class="feature-body">
                    <p>{{ $feature->description }}</p>
                </div>
                <div class="feature-footer">
                    <a href="{{ route("sessions.feature", [$session->id, $feature->id]) }}"
                       class="vote-button">Select</a>
                    <span style="color: purple">{{number_format($feature->votes()->avg('score'),2)}}</span>
                </div>
            </div>

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

<!-- The Modal -->
<div class="modal fade" id="featureModal" tabindex="-1" role="dialog" aria-labelledby="featureModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">New Feature</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form method="POST" action="{{ route('features.store', $session->id) }}">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="link">Link:</label>
                        <input type="url" class="form-control" id="link" name="link">
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


{{-- TODO: Gotta split the components somehow, this mad ugly--}}
