<x-app-layout>

    <div class="flex flex-col md:flex-row h-screen antialiased text-gray-800">

        <div class="flex flex-col md:flex-row h-full w-full overflow-x-hidden">
            @include('layouts.aside-bar')

            <div class="flex flex-col flex-auto h-full p-6">
                <div class="flex flex-col flex-auto flex-shrink-0 rounded-2xl bg-gray-100 h-fit p-4">
                    <div class="flex flex-col h-full overflow-x-auto mb-4">
                        <div class="flex flex-col h-full">
                            <div class="messages grid grid-cols-12 gap-y-2">
                                <div class="col-start-1 col-end-8 p-3 rounded-lg">
                                    <div class="flex flex-row items-center">
                                        <div
                                            class="flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0">
                                            A
                                        </div>
                                        <div class="relative ml-3 text-sm bg-white py-2 px-4 shadow rounded-xl">
                                            <div>
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                Perspiciatis, in.
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                @foreach ($messages as $message)
                                    @if ($message->content != null)
                                        <div class="col-start-6 col-end-13 p-3 rounded-lg">
                                            <div class="flex items-center justify-start flex-row-reverse">
                                                <div
                                                    class="flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0">
                                                    A
                                                </div>
                                                <div
                                                    class="relative mr-3 text-sm bg-indigo-100 py-2 px-4 shadow rounded-xl">
                                                    <div>
                                                        @include('broadcast', [
                                                            'message' => $message->content,
                                                            'isImage' => $message->media_url != null,
                                                        ])
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @elseif ($message->media_url != null)
                                        @if (in_array(pathinfo($message->media_url, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif']))
                                            <div class="col-start-6 col-end-13 p-3 rounded-lg">
                                                <div class="flex items-center justify-start flex-row-reverse">
                                                    <div
                                                        class="flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0">
                                                        A
                                                    </div>
                                                    <div
                                                        class="relative mr-3 text-sm bg-indigo-100 py-2 px-4 shadow rounded-xl">
                                                        <div>
                                                            <img class="w-[150px] h-auto" src="{{ $message->media_url }}" alt="Image">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-start-6 col-end-13 p-3 rounded-lg">
                                                <div class="flex items-center justify-start flex-row-reverse">
                                                    <div
                                                        class="flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0">
                                                        A
                                                    </div>
                                                    <div
                                                        class="relative mr-3 text-sm bg-indigo-100 py-2 px-4 shadow rounded-xl">
                                                        <div>
                                                            <div class="flex  gap-2.5">
                                                                <div class="flex flex-col gap-1">
                                                                    <div
                                                                        class="flex flex-col w-full max-w-[326px] leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-e-xl rounded-es-xl dark:bg-gray-700">
                                                                        <div
                                                                            class="flex items-center space-x-2 rtl:space-x-reverse">
                                                                            <span
                                                                                class="text-sm font-semibold text-gray-900 dark:text-white">Bonnie
                                                                                Green</span>
                                                                            <span
                                                                                class="text-sm font-normal text-gray-500 dark:text-gray-400">11:46</span>
                                                                        </div>
                                                                        <div
                                                                            class="flex items-start my-2.5 bg-gray-50 dark:bg-gray-600 rounded-xl p-2">
                                                                            <div class="me-2">
                                                                                <span
                                                                                    class="flex items-center gap-2 text-sm font-medium text-gray-900 dark:text-white pb-2">
                                                                                    <svg fill="none"
                                                                                        aria-hidden="true"
                                                                                        class="w-5 h-5 flex-shrink-0"
                                                                                        viewBox="0 0 20 21">
                                                                                        <g
                                                                                            clip-path="url(#clip0_3173_1381)">
                                                                                            <path fill="#E2E5E7"
                                                                                                d="M5.024.5c-.688 0-1.25.563-1.25 1.25v17.5c0 .688.562 1.25 1.25 1.25h12.5c.687 0 1.25-.563 1.25-1.25V5.5l-5-5h-8.75z" />
                                                                                            <path fill="#B0B7BD"
                                                                                                d="M15.024 5.5h3.75l-5-5v3.75c0 .688.562 1.25 1.25 1.25z" />
                                                                                            <path fill="#CAD1D8"
                                                                                                d="M18.774 9.25l-3.75-3.75h3.75v3.75z" />
                                                                                            <path fill="#F15642"
                                                                                                d="M16.274 16.75a.627.627 0 01-.625.625H1.899a.627.627 0 01-.625-.625V10.5c0-.344.281-.625.625-.625h13.75c.344 0 .625.281.625.625v6.25z" />
                                                                                            <path fill="#fff"
                                                                                                d="M3.998 12.342c0-.165.13-.345.34-.345h1.154c.65 0 1.235.435 1.235 1.269 0 .79-.585 1.23-1.235 1.23h-.834v.66c0 .22-.14.344-.32.344a.337.337 0 01-.34-.344v-2.814zm.66.284v1.245h.834c.335 0 .6-.295.6-.605 0-.35-.265-.64-.6-.64h-.834zM7.706 15.5c-.165 0-.345-.09-.345-.31v-2.838c0-.18.18-.31.345-.31H8.85c2.284 0 2.234 3.458.045 3.458h-1.19zm.315-2.848v2.239h.83c1.349 0 1.409-2.24 0-2.24h-.83zM11.894 13.486h1.274c.18 0 .36.18.36.355 0 .165-.18.3-.36.3h-1.274v1.049c0 .175-.124.31-.3.31-.22 0-.354-.135-.354-.31v-2.839c0-.18.135-.31.355-.31h1.754c.22 0 .35.13.35.31 0 .16-.13.34-.35.34h-1.455v.795z" />
                                                                                            <path fill="#CAD1D8"
                                                                                                d="M15.649 17.375H3.774V18h11.875a.627.627 0 00.625-.625v-.625a.627.627 0 01-.625.625z" />
                                                                                        </g>
                                                                                        <defs>
                                                                                            <clipPath
                                                                                                id="clip0_3173_1381">
                                                                                                <path fill="#fff"
                                                                                                    d="M0 0h20v20H0z"
                                                                                                    transform="translate(0 .5)" />
                                                                                            </clipPath>
                                                                                        </defs>
                                                                                    </svg>
                                                                                    your_file
                                                                                </span>

                                                                            </div>
                                                                            <div
                                                                                class="inline-flex self-center items-center">
                                                                                <a href="{{ $message->media_url }}"
                                                                                    download="your_file">
                                                                                    <button
                                                                                        class="inline-flex self-center items-center p-2 text-sm font-medium text-center text-gray-900 bg-gray-50 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-600 dark:hover:bg-gray-500 dark:focus:ring-gray-600"
                                                                                        type="button">
                                                                                        <svg class="w-4 h-4 text-gray-900 dark:text-white"
                                                                                            aria-hidden="true"
                                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                                            fill="currentColor"
                                                                                            viewBox="0 0 20 20">
                                                                                            <path
                                                                                                d="M14.707 7.793a1 1 0 0 0-1.414 0L11 10.086V1.5a1 1 0 0 0-2 0v8.586L6.707 7.793a1 1 0 1 0-1.414 1.414l4 4a1 1 0 0 0 1.416 0l4-4a1 1 0 0 0-.002-1.414Z" />
                                                                                            <path
                                                                                                d="M18 12h-2.55l-2.975 2.975a3.5 3.5 0 0 1-4.95 0L4.55 12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                                                                                        </svg>
                                                                                    </button>
                                                                                </a>

                                                                            </div>
                                                                        </div>
                                                                        {{-- <span class="text-sm font-normal text-gray-500 dark:text-gray-400">Delivered</span> --}}
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        <form id="chatForm" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div id="card" class="hidden w-fit bg-blue-100 ml-2 rounded-sm flex gap-4 p-4">
                                <div
                                    class="flex items-center justify-center h-10 w-10 rounded-full bg-gray-100 flex-shrink-0">
                                    <input type="file" id="image" name="image" accept="image/*"
                                        class="hidden" />
                                    <label for="image" style="cursor: pointer;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24"
                                            style="fill: rgba(104, 139, 231, 1); transform: ; msFilter:;">
                                            <path d="M11.024 11.536 10 10l-2 3h9l-3.5-5z"></path>
                                            <circle cx="9.503" cy="7.497" r="1.503"></circle>
                                            <path
                                                d="M19 2H6c-1.206 0-3 .799-3 3v14c0 2.201 1.794 3 3 3h15v-2H6.012C5.55 19.988 5 19.806 5 19s.55-.988 1.012-1H21V4c0-1.103-.897-2-2-2zm0 14H5V5c0-.806.55-.988 1-1h13v12z">
                                            </path>
                                        </svg>
                                    </label>
                                </div>
                                {{-- <div
                                    class="flex items-center justify-center h-10 w-10 rounded-full bg-gray-100 flex-shrink-0">
                                    <input type="file" id="image" name="image" accept="*/*" class="hidden" />
                                    <label for="image" style="cursor: pointer;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" style="fill: rgba(65, 207, 239, 1);transform: ;msFilter:;">
                                            <path
                                                d="M19.903 8.586a.997.997 0 0 0-.196-.293l-6-6a.997.997 0 0 0-.293-.196c-.03-.014-.062-.022-.094-.033a.991.991 0 0 0-.259-.051C13.04 2.011 13.021 2 13 2H6c-1.103 0-2 .897-2 2v16c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2V9c0-.021-.011-.04-.013-.062a.952.952 0 0 0-.051-.259c-.01-.032-.019-.063-.033-.093zM16.586 8H14V5.414L16.586 8zM6 20V4h6v5a1 1 0 0 0 1 1h5l.002 10H6z">
                                            </path>
                                            <path d="M8 12h8v2H8zm0 4h8v2H8zm0-8h2v2H8z"></path>
                                        </svg>
                                    </label>
                                </div> --}}
                                <div
                                    class="flex items-center justify-center h-10 w-10 rounded-full bg-gray-100 flex-shrink-0">
                                    <button title="Share location" type="button" onclick="shareLocation()">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" style="fill: rgb(227, 69, 29); transform: ; msFilter:;">
                                            <circle cx="12" cy="12" r="4"></circle>
                                            <path
                                                d="M13 4.069V2h-2v2.069A8.01 8.01 0 0 0 4.069 11H2v2h2.069A8.008 8.008 0 0 0 11 19.931V22h2v-2.069A8.007 8.007 0 0 0 19.931 13H22v-2h-2.069A8.008 8.008 0 0 0 13 4.069zM12 18c-3.309 0-6-2.691-6-6s2.691-6 6-6 6 2.691 6 6-2.691 6-6 6z">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="flex items-center h-16 rounded-xl bg-white w-full px-4">

                                <div>
                                    <button class=" flex items-center justify-center text-gray-400 hover:text-gray-600"
                                        onclick="toggleDiv(event)">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                                <input type="hidden" id="latitude" name="latitude" />
                                <input type="hidden" id="longitude" name="longitude" />
                                <div class="flex-grow ml-4">
                                    <div class="relative w-full">
                                        <input type="text" id="message" name="content"
                                            placeholder="Type your message here..."
                                            class="flex w-full border rounded-xl focus:outline-none focus:border-indigo-300 pl-4 h-10" />
                                        <button
                                            class="absolute flex items-center justify-center h-full w-12 right-0 top-0 text-gray-400 hover:text-gray-600">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <button type="submit"
                                        class="flex items-center justify-center bg-indigo-500 hover:bg-indigo-600 rounded-xl text-white px-4 py-1 flex-shrink-0">
                                        <span>Send</span>
                                        <span class="ml-2">
                                            <svg class="w-4 h-4 transform rotate-45 -mt-px" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                            </svg>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>


        </div>
    </div>


    <script>
        function toggleDiv(event) {
            event.preventDefault();
            var myDiv = document.getElementById('card');
            myDiv.classList.toggle('hidden');
        }
    </script>

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
                    var newMessageElement = createMessageElement(res);
                    $(".messages").append(newMessageElement);
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

        function createMessageElement(messageContent) {

            var messageElement = $("<div>").addClass("col-start-6 col-end-13 p-3 rounded-lg");
            var innerDivElement = $("<div>").addClass("flex items-center justify-start flex-row-reverse");
            var avatarDivElement = $("<div>").addClass(
                "flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0").text("A");
            var contentDivElement = $("<div>").addClass("relative mr-3 text-sm bg-indigo-100 py-2 px-4 shadow rounded-xl");

            // Customize this part based on your message structure
            contentDivElement.html("<div>" + messageContent + "</div>");

            // Append the elements to construct the message structure
            innerDivElement.append(avatarDivElement);
            innerDivElement.append(contentDivElement);
            messageElement.append(innerDivElement);

            return messageElement;
        }
    </script>
</x-app-layout>
