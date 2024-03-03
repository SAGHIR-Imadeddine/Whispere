<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{-- <form action="" id="form">
        <label for="message">message</label>
        <input type="text" id="message">
    </form> --}}

    <x-app-layout>

        <div class="flex flex-col md:flex-row h-screen antialiased text-gray-800">
            
    
            <div class="flex flex-col md:flex-row h-full w-full overflow-x-hidden">
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
                    <form class="w-full">
                        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Search</label>
                        <div class="relative">
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <input type="search" id="default-search" class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" required>
                        </div>
                    </form>
                    <div class=" flex pl-2 space-x-2">
                    </div>
            
            
                </div>
                <div class="flex flex-col mt-8">
                    <div class="flex flex-row items-center justify-between text-xs">
                        <span class="font-bold">Active Conversations</span>
                        <span class="flex items-center justify-center bg-gray-300 h-4 w-4 rounded-full">{{$count}}</span>
                    </div>
                    <div class="flex flex-col space-y-1 mt-4 -mx-2 h-fit overflow-y-auto">
                        @foreach($convs as $conv)
                       <a href="/chat/{{$conv->id}}"> <button class="flex flex-row items-center w-full hover:bg-gray-100 rounded-xl p-2">
                            <div class="flex items-center  justify-center h-8 w-8 bg-indigo-200 rounded-full truncate whitespace-no-wrap">
                                <span class="">
                                    {{ substr($conv->friend->name, 0, 1) }}
                                  </span>
                                  <span class="hidden">{{ $conv->friend->name }}</span>
                            </div>
                            <div class="ml-2 text-sm font-semibold">{{$conv->friend->name}}</div>
                        </button></a>
                        @endforeach
            
                    </div>
                </div>
            </div>
                <div class="flex flex-col flex-auto h-full pb-6 px-6">
                    <div class="flex flex-col flex-auto flex-shrink-0 rounded-2xl bg-gray-100 h-full p-4">
                        <div class="flex flex-col h-full overflow-x-auto mb-4">
                            <div class="flex flex-col h-full">
                                <div class="flex items-center h-16 rounded-xl bg-white w-fit px-4 mb-4">
                                     <button class="flex flex-row items-center w-full rounded-xl p-2">
                                        <div class="flex items-center  justify-center h-8 w-8 bg-indigo-200 rounded-full truncate whitespace-no-wrap">
                                            <span class="">
                                                {{ substr($conversation->friend->name, 0, 1) }}
                                              </span>
                                              <span class="hidden">{{ $conversation->friend->name }}</span>
                                        </div>
                                        <div class="ml-2 text-sm font-semibold">{{$conversation->friend->name}}</div>
                                    </button>
                   
              
         
                                </div>
                                <div class="grid grid-cols-12 gap-y-2" id="list">
                                    @foreach($messages as $message)
                                    @if($message->user_id == auth()->id())
                                    <div class="col-start-1 col-end-8 p-3 rounded-lg">
                                        <div class="flex flex-row items-center">
                                            <div class="flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0 text-xs text-center">
                                                Me
                                            </div>
                                            <div class="relative ml-3 text-sm bg-white py-2 px-4 shadow rounded-xl">
                                                <div>{{$message->content}}</div>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <div class="col-start-6 col-end-13 p-3 rounded-lg">
                                        <div class="flex items-center justify-start flex-row-reverse">
                                            <div class="flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0 text-xs text-center">
                                                {{$message->user->name}}
                                            </div>
                                            <div class="relative mr-3 text-sm bg-indigo-100 py-2 px-4 shadow rounded-xl">
                                                <div>
                                                    {{$message->content}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach                        
                            </div>
                        </div>
                    </div>
                    <form action="" id="form">
                        <div class="flex items-center h-16 rounded-xl bg-white w-full px-4">
                            <div>
                                <button class="flex items-center justify-center text-gray-400 hover:text-gray-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                            <div class="flex-grow ml-4">
                                <div class="relative w-full">
                                    <input type="text" id="message" class="flex w-full border rounded-xl focus:outline-none focus:border-indigo-300 pl-4 h-10" />
                       
                                </div>
                                <div class="relative w-full">
                                    <input type="text" id="idR" value="{{ $conversation->friend->id }}" class=" hidden w-full border rounded-xl focus:outline-none focus:border-indigo-300 pl-4 h-10" />
                       
                                </div>
                                <div class="relative w-full">
                                    <input type="text" id="conv" value="{{ $conversation->id }}" class=" hidden w-full border rounded-xl focus:outline-none focus:border-indigo-300 pl-4 h-10" />
                       
                                </div>
                                <div class="relative w-full">
                                    <input type="text" id="idS" value="{{ Auth::id() }}" class=" hidden  w-full border rounded-xl focus:outline-none focus:border-indigo-300 pl-4 h-10" />
                       
                                </div>
                            </div>
                            <div class="ml-4">
                                <button type="submit" class="flex items-center justify-center bg-indigo-500 hover:bg-indigo-600 rounded-xl text-white px-4 py-1 flex-shrink-0">
                                    <span>Send</span>
                                    <span class="ml-2">
                                        <svg class="w-4 h-4 transform rotate-45 -mt-px" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                        </svg>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>
@vite('resources/js/app.js')

</html>