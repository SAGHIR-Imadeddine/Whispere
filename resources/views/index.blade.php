<!DOCTYPE html>
<html lang="en">

<head>
    <title>Chat Laravel Pusher | Edlin App</title>
    <link rel="icon" href="https://assets.edlin.app/favicon/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- JavaScript -->
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder@1.13.0/dist/Control.Geocoder.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>


    <!-- End JavaScript -->

    <!-- CSS -->
    <link rel="stylesheet" href="/style.css">
    <!-- End CSS -->

</head>

<body>
    <div class="chat">

        <!-- Header -->
        <div class="top">
            <img src="https://assets.edlin.app/images/rossedlin/03/rossedlin-03-100.jpg" alt="Avatar">
            <div>
                <p>Ross Edlin</p>
                <small>Online</small>
            </div>
        </div>
        <!-- End Header -->

        <!-- Chat -->
        <div class="messages">
            @include('receive', ['message' => "Hey! What's up!  👋"])
            @include('receive', [
                'message' => 'Ask a friend to open this link and you can chat with them!',
            ])
        </div>

        <form id="chatForm" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="text" id="message" name="content" placeholder="Type your message here..." />
            <input type="file" id="image" name="image" accept="image/*" />
            <input type="hidden" id="latitude" name="latitude" />
            <input type="hidden" id="longitude" name="longitude" />
            <button class="bg-blue-200" type="submit">Send</button>
            <button class="bg-gray-200" type="button" onclick="shareLocation()">Share Location</button>
        </form>
    </div>

    <script>
        const pusher = new Pusher('{{ config('broadcasting.connections.pusher.key') }}', {
            cluster: 'eu'
        });
        const channel = pusher.subscribe('public');

        // Share location function
         function shareLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                function(position) {
                    const latitude = position.coords.latitude;
                    const longitude = position.coords.longitude;
                    $("#latitude").val(latitude);
                    $("#longitude").val(longitude);

                    console.log("Location shared successfully");
                    console.log('Received location:', latitude, longitude);

                    // Trigger form submission
                    $("form#chatForm").submit();
                },
                function(error) {
                    console.error('Error getting location:', error.message);
                }
            );
        } else {
            console.error('Geolocation is not supported by this browser.');
        }
    }

        // Receive location messages
        channel.bind('location', function(data) {
            console.log('Received location:', data);
            const {
                latitude,
                longitude,
                text
            } = data;
            const mapContainerId = 'map_' + Date.now();
            const locationMessage = `
            <div class="right message">
                <p>${text}</p>
                <small>Latitude: ${latitude}, Longitude: ${longitude}</small>
                <div id="${mapContainerId}" style="height: 150px;"></div>
            </div>
        `;
            $(".messages").append(locationMessage);
            const map = L.map(mapContainerId).setView([latitude, longitude], 15);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            L.marker([latitude, longitude]).addTo(map)
                .bindPopup('Location').openPopup();
            $(document).scrollTop($(document).height());
        });

        // Form submission
        $("form#chatForm").submit(function(event) {
            event.preventDefault();
            var formData = new FormData($(this)[0]);
            $.ajax({
                url: "/broadcast",
                type: "POST",
                headers: {
                    'X-Socket-Id': pusher.connection.socket_id
                },
                data: formData,
                contentType: false,
                processData: false,
                success: function(res) {
                    $(".messages > .message").last().after(res);
                    $("form #message").val('');
                    $("form #image").val('');
                    $("form #latitude").val('');
                    $("form #longitude").val('');
                    $(document).scrollTop($(document).height());
                },
                error: function(error) {
                    console.log("Error uploading file:", error);
                }
            });
        });
    </script>
</body>
</html>
