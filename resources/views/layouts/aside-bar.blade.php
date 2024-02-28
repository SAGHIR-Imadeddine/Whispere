<div class="flex flex-col py-4 px-8 md:px-2 md:w-80 bg-white flex-shrink-0">
    @if(session('error'))

    <div id="alert" class="flex justify-between absolute top-0 right-0 mt-4 mr-4 bg-red-600 text-white px-4 py-2 rounded">
        {{ session('error') }}
        <button onclick="closeAlert()" class="ml-4 text-gray-500 hover:text-gray-400 focus:outline-none">
            <svg class="h-6 w-6" fill="none" stroke="white" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>
    @endif
    <script>
        function closeAlert() {
            var alert = document.getElementById('alert');
            alert.style.display = 'none';
        }
    </script>
    <div class="flex flex-row items-center justify-center h-12 w-full">
        <div class="flex items-center justify-center rounded-2xl text-indigo-700 bg-indigo-100 h-10 w-10">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z">
                </path>
            </svg>
        </div>
        <div class="ml-2 font-bold text-2xl">Whisper</div>
    </div>
    <div class="flex items-center  mt-4 w-full rounded-lg">
        <form method="get" action="{{ route('search') }}">
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Search</label>
            <div class="relative">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input name="unique_identifier" type="search" id="default-search" class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" required>
            </div>
        </form>
        <div class=" flex pl-2 space-x-2">
            @include('partials.popup-search-link')
            @include('partials.popup-scan-qr')
        </div>
    </div>
    @if (request()->filled('unique_identifier'))
    <div class="flex flex-col mt-8">
        <div class="flex flex-row items-center justify-between text-xs">
            <span class="font-bold">Result</span>
        </div>
        @if (session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
            <p class="font-bold">Success</p>
            <p>{{ session('success') }}</p>
        </div>
        @endif

        @if (session('error'))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
            <p class="font-bold">Error</p>
            <p>{{ session('error') }}</p>
        </div>
        @endif

        @foreach ($users as $user)
        <div class="flex items-center mt-2 gap-4">
            <div class="w-10 h-10 rounded-full overflow-hidden">
                @if($user->profile_image)
                <img src="{{ asset('storage/' . $user->profile_image) }}" alt="Image de profil" class="w-full h-full object-cover rounded-full">
                @else
                <div class="flex items-center justify-center h-8 w-8 bg-indigo-200 rounded-full">
                    {{ substr($user->name, 0, 1) }}
                </div>
                @endif
            </div>
            <div class="font-medium flex gap-4 text-black">
                <form action="{{ route('profile.edit') }}" method="get">
                    @csrf
                    <input type="hidden" value="{{ $user->id }}" name="profile_user">
                    <button type="submit">
                        {{ $user->unique_identifier }}
                    </button>
                </form>
                @php
                $friendRequestSent = auth()
                ->user()
                ->sentFriendRequests->contains('friend_id', $user->id);
                @endphp
                @if (auth()->user()->id != $user->id && !$friendRequestSent)
                <form action="{{ route('friendRequest', $user) }}" method="post">
                    @csrf
                    <button type="submit">
                        <i class="fa-solid fa-user-plus" style="color: #63E6BE;"></i>
                    </button>
                </form>
                @endif
                @if (auth()->user()->id != $user->id && $friendRequestSent)
                <form action="{{ route('remove.friend.request', $user) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">
                        <i class="fa-solid fa-xmark" style="color: #ff0000;"></i>
                    </button>
                </form>
                @endif
            </div>
        </div>
        @endforeach
    </div>
    <div class="flex flex-col mt-8">
        <div class="flex flex-row items-center justify-between text-xs">
            <span class="font-bold">Active Conversations</span>
        </div>

        @foreach ($friends as $conversation)
        <div class="flex items-center mt-2 gap-4">
            <div class="w-10 h-10 rounded-full overflow-hidden">
                @if($conversation->friend->profile_image)
                <img class="w-full h-full object-cover" src="{{ asset('storage/' . $conversation->friend->profile_image) }}" alt="{{ $conversation->friend->name }}'s Profile Image">
                @else
                <div class="flex items-center justify-center h-8 w-8 bg-indigo-200 rounded-full">
                    {{ substr($conversation->friend->name, 0, 1) }}
                </div>
                @endif
            </div>
            <div class="font-medium flex gap-4 text-black">
                <form action="{{ route('profile.edit') }}" method="get">
                    @csrf
                    <input type="hidden" value="{{ $conversation->friend->id }}" name="profile_user">
                    <button type="submit">
                        {{ $conversation->friend->unique_identifier }}
                    </button>
                </form>
            </div>
        </div>
        @endforeach

    </div>
    @else
    <div class="flex flex-col mt-8">
        <div class="flex flex-row items-center justify-between text-xs">
            <span class="font-bold">Active Conversations</span>
            <span class="flex items-center justify-center bg-gray-300 h-4 w-4 rounded-full">4</span>
        </div>
        
        @foreach ($friends as $conversation)
        <div class="flex items-center mt-2 gap-4">
            <div class="w-10 h-10 rounded-full overflow-hidden">
                @if($conversation->friend->profile_image)
                <img class="w-full h-full object-cover" src="{{ asset('storage/' . $conversation->friend->profile_image) }}" alt="{{ $conversation->friend->name }}'s Profile Image">
                @else
                <div class="flex items-center justify-center h-8 w-8 bg-indigo-200 rounded-full">
                    {{ substr($conversation->friend->name, 0, 1) }}
                </div>
                @endif
            </div>
            <div class="font-medium flex gap-4 text-black">
                <form action="{{ route('conversation.show') }}" method="POST">
                    @csrf
                    <input type="hidden" value="{{$conversation->friend->id}}" name="friend">
                    <button type="submit">{{ $conversation->friend->unique_identifier }}</button>
                </form>

            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>