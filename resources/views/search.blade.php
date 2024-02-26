<x-app-layout>
    <div class="flex flex-col md:flex-row h-screen antialiased text-gray-800">
        <div class="flex flex-col md:flex-row h-full w-full overflow-x-hidden">
            @include('layouts.aside-bar')
            <div class="flex flex-col flex-auto h-full p-6 ">
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
                    <div class="flex items-center gap-4">
                        <img src="{{ asset('storage/' . $user->profile_image) }}"
                            alt="{{ $user->name }}'s Profile Image">
                        <div class="font-medium flex gap-4 text-black">
                            <p>{{ $user->unique_identifier }}</p>
                            @if(auth()->user()->id != $user->id)
                            <form action="{{ route('friendRequest', $user) }}" method="post">
                                @csrf
                                <button type="submit">
                                    <i class="fa-solid fa-user-plus" style="color: #63E6BE;"></i>
                                </button>
                            </form>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
