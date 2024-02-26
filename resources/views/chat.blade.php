<x-app-layout>

    <div class="flex flex-col md:flex-row h-screen antialiased text-gray-800">

        <div class="flex flex-col md:flex-row h-full w-full overflow-x-hidden">
        @include('layouts.aside-bar')
            <div class="flex flex-col flex-auto h-full p-6">
                <div class="flex flex-col flex-auto flex-shrink-0 rounded-2xl bg-gray-100 h-full p-4">
                    <div class="flex flex-col h-full overflow-x-auto mb-4">
                        <div class="flex flex-col h-full">
                            <div class="grid grid-cols-12 gap-y-2">
                                <div class="col-start-1 col-end-8 p-3 rounded-lg">
                                    <div class="flex flex-row items-center">
                                        <div class="flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0">
                                            A
                                        </div>
                                        <div class="relative ml-3 text-sm bg-white py-2 px-4 shadow rounded-xl">
                                            <div>Hey How are you today?</div>
                                        </div>
                                    </div>
                                </div>
                               
                          
                                <div class="col-start-1 col-end-8 p-3 rounded-lg">
                                    <div class="flex flex-row items-center">
                                        <div class="flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0">
                                            A
                                        </div>
                                        <div class="relative ml-3 text-sm bg-white py-2 px-4 shadow rounded-xl">
                                            <div>Lorem ipsum dolor sit amet !</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-start-6 col-end-13 p-3 rounded-lg">
                                    <div class="flex items-center justify-start flex-row-reverse">
                                        <div class="flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0">
                                            A
                                        </div>
                                        <div class="relative mr-3 text-sm bg-indigo-100 py-2 px-4 shadow rounded-xl">
                                            <div>
                                                Lorem ipsum dolor sit, amet consectetur adipisicing. ?
                                            </div>
                                            <div class="absolute text-xs bottom-0 right-0 -mb-5 mr-2 text-gray-500">
                                                Seen
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-start-1 col-end-8 p-3 rounded-lg">
                                    <div class="flex flex-row items-center">
                                        <div class="flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0">
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
                        </div>
                    </div>
                    <div id="card" class="hidden w-fit bg-blue-100 ml-2 rounded-sm flex gap-4 p-4">
                        <div class="flex items-center justify-center h-10 w-10 rounded-full bg-gray-100 flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(104, 139, 231, 1);transform: ;msFilter:;"><path d="M11.024 11.536 10 10l-2 3h9l-3.5-5z"></path><circle cx="9.503" cy="7.497" r="1.503"></circle><path d="M19 2H6c-1.206 0-3 .799-3 3v14c0 2.201 1.794 3 3 3h15v-2H6.012C5.55 19.988 5 19.806 5 19s.55-.988 1.012-1H21V4c0-1.103-.897-2-2-2zm0 14H5V5c0-.806.55-.988 1-1h13v12z"></path></svg>
                        </div>
                        <div class="flex items-center justify-center h-10 w-10 rounded-full bg-gray-100 flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(65, 207, 239, 1);transform: ;msFilter:;"><path d="M19.903 8.586a.997.997 0 0 0-.196-.293l-6-6a.997.997 0 0 0-.293-.196c-.03-.014-.062-.022-.094-.033a.991.991 0 0 0-.259-.051C13.04 2.011 13.021 2 13 2H6c-1.103 0-2 .897-2 2v16c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2V9c0-.021-.011-.04-.013-.062a.952.952 0 0 0-.051-.259c-.01-.032-.019-.063-.033-.093zM16.586 8H14V5.414L16.586 8zM6 20V4h6v5a1 1 0 0 0 1 1h5l.002 10H6z"></path><path d="M8 12h8v2H8zm0 4h8v2H8zm0-8h2v2H8z"></path></svg>
                        </div>
                        <div class="flex items-center justify-center h-10 w-10 rounded-full bg-gray-100 flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(104, 231, 147, 1);transform: ;msFilter:;"><circle cx="12" cy="12" r="4"></circle><path d="M13 4.069V2h-2v2.069A8.01 8.01 0 0 0 4.069 11H2v2h2.069A8.008 8.008 0 0 0 11 19.931V22h2v-2.069A8.007 8.007 0 0 0 19.931 13H22v-2h-2.069A8.008 8.008 0 0 0 13 4.069zM12 18c-3.309 0-6-2.691-6-6s2.691-6 6-6 6 2.691 6 6-2.691 6-6 6z"></path></svg>
                        </div>

                    </div> 
                    <div class="flex items-center h-16 rounded-xl bg-white w-full px-4">
                       
                        <div>
                            <button class=" flex items-center justify-center text-gray-400 hover:text-gray-600" onclick="toggleDiv()">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13">
                                    </path>
                                </svg>
                            </button>
                        </div>
                        <div class="flex-grow ml-4">
                            <div class="relative w-full">
                                <input type="text" class="flex w-full border rounded-xl focus:outline-none focus:border-indigo-300 pl-4 h-10" />
                                <button class="absolute flex items-center justify-center h-full w-12 right-0 top-0 text-gray-400 hover:text-gray-600">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="ml-4">
                            <button class="flex items-center justify-center bg-indigo-500 hover:bg-indigo-600 rounded-xl text-white px-4 py-1 flex-shrink-0">
                                <span>Send</span>
                                <span class="ml-2">
                                    <svg class="w-4 h-4 transform rotate-45 -mt-px" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

    <script>
        function toggleDiv() {
            var myDiv = document.getElementById('card');
            myDiv.classList.toggle('hidden');
        }
    </script>
</x-app-layout>
