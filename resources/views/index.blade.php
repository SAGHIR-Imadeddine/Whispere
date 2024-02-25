<!DOCTYPE html>
<html lang="en">

<head>
    <title>Chat Laravel Pusher | Edlin App</title>
    <link rel="icon" href="https://assets.edlin.app/favicon/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- JavaScript -->
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
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
            
            <button type="button" onclick="shareLocation()">Share Location</button>
            
            <!-- Hidden fields for latitude and longitude -->
            <input type="hidden" id="latitude" name="latitude" />
            <input type="hidden" id="longitude" name="longitude" />

            <button type="submit">Send</button>
        </form>

{{-- 
        <form id="locationForm">
            {{ csrf_field() }}
            <button type="button" onclick="shareLocation()">Share Location</button>
        </form>
        <form id="chatForm" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="text" id="message" name="content" placeholder="Type your message here..." />
            <input type="file" id="image" name="image" accept="image/*" />
            <button type="submit">Send</button>
        </form> --}}

        <!-- End Footer -->

    </div>
</body>

<script>
    const pusher = new Pusher('{{ config('broadcasting.connections.pusher.key') }}', {
        cluster: 'eu'
    });
    const channel = pusher.subscribe('public');

    // Receive messages
    channel.bind('chat', function(data) {
        $.post("/receive", {
                _token: '{{ csrf_token() }}',
                message: data.message,
            })
            .done(function(res) {
                $(".messages > .message").last().after(res);
                $(document).scrollTop($(document).height());
            });
    });

    channel.bind('location', function(data) {
        console.log('Received location:', data.message);
        var locationMessage = '<div class="right message"><p>' + data.message + '</p></div>';
        $(".messages").append(locationMessage);
        $(document).scrollTop($(document).height());
    });

    // Share location function
    function shareLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                function(position) {
                    const latitude = position.coords.latitude;
                    const longitude = position.coords.longitude;

                    // Set the latitude and longitude in the hidden fields
                    $("#latitude").val(latitude);
                    $("#longitude").val(longitude);

                    console.log("Location shared successfully");
                    console.log('Received location:', latitude, longitude);
                },
                function(error) {
                    console.error('Error getting location:', error.message);
                }
            );
        } else {
            console.error('Geolocation is not supported by this browser.');
        }
    }

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

</html>
