<div class="flex flex-col py-4 px-8 md:px-2 md:w-80 bg-white flex-shrink-0">
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
                <div class="flex absolute inset-y-0 right-0 space-x-2 items-center pr-2 pointer-events-none">
                    
                   
                </div>
            </div>
        </form>
        <div class=" flex pl-2 space-x-2">
            @include('partials.popup-search-link')
            @include('partials.popup-scan-qr')
        </div>


    </div>
    <div class="flex flex-col mt-8">
        <div class="flex flex-row items-center justify-between text-xs">
            <span class="font-bold">Active Conversations</span>
            <span class="flex items-center justify-center bg-gray-300 h-4 w-4 rounded-full">4</span>
        </div>
        <div class="flex flex-col space-y-1 mt-4 -mx-2 h-fit overflow-y-auto">
            <button class="flex flex-row items-center hover:bg-gray-100 rounded-xl p-2">
                <div class="flex items-center justify-center h-8 w-8 bg-indigo-200 rounded-full">
                    H
                </div>
                <div class="ml-2 text-sm font-semibold">Henry Boyd</div>
            </button>

            <button class="flex flex-row items-center hover:bg-gray-100 rounded-xl p-2">
                <div class="flex items-center justify-center h-8 w-8 bg-blue-200 rounded-full">
                    M
                </div>
                <div class="ml-2 text-sm font-semibold">Viga Maintalor</div>
                <div class="flex items-center justify-center ml-auto text-xs text-white bg-red-500 h-4 w-4 rounded leading-none">
                    2
                </div>
            </button>
        </div>
    </div>
</div>