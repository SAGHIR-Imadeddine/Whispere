<div class="right message">
    @if ($message)
        <p>{{ $message }}</p>
    @endif
    @if ($mediaUrl)
        @php
            $fileExtension = pathinfo($mediaUrl, PATHINFO_EXTENSION);
            $imageExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        @endphp

        @if (in_array(strtolower($fileExtension), $imageExtensions))
            <img src="{{ $mediaUrl }}" alt="Image" style="width: 150px; height: auto;">
        @else
            <a href="{{ $mediaUrl }}" download="filename">Download File</a>
        @endif
    @endif
    @if ($locationDetails)
        <p>{{ $locationDetails['text'] }}</p>

        <!-- Generate a unique map container ID -->
        @php
            $mapContainerId = 'map_' . uniqid();
        @endphp
        <div id="{{ $mapContainerId }}" style="height: 150px;"></div>
        <!-- JavaScript for Leaflet map -->
        <script>
            var latitude = {{ $locationDetails['latitude'] }};
            var longitude = {{ $locationDetails['longitude'] }};
            var map = L.map('{{ $mapContainerId }}').setView([latitude, longitude], 15);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);
            L.marker([latitude, longitude]).addTo(map)
                .bindPopup('Location').openPopup();
            L.Control.geocoder().addTo(map);
        </script>
    @endif


</div>
