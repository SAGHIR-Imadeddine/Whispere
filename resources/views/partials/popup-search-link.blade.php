<div x-data="{ open: false   }">
    <button x-on:click="open = ! open" class="cursor-pointer">
        <svg width="18px" height="18px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g id="SVGRepo_bgCarrier" stroke-width="0" />
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
            <g id="SVGRepo_iconCarrier">
                <path d="M15.197 3.35462C16.8703 1.67483 19.4476 1.53865 20.9536 3.05046C22.4596 4.56228 22.3239 7.14956 20.6506 8.82935L18.2268 11.2626M10.0464 14C8.54044 12.4882 8.67609 9.90087 10.3494 8.22108L12.5 6.06212" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
                <path d="M13.9536 10C15.4596 11.5118 15.3239 14.0991 13.6506 15.7789L11.2268 18.2121L8.80299 20.6454C7.12969 22.3252 4.55237 22.4613 3.0464 20.9495C1.54043 19.4377 1.67609 16.8504 3.34939 15.1706L5.77323 12.7373" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
            </g>
        </svg>
    </button>
    <div x-show="open" class="fixed z-10 inset-0 overflow-y-auto flex items-center justify-center" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="transition-opacity bg-gray-500 bg-opacity-75 absolute inset-0"></div>
        <!-- Modal -->
        <div class="bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
            <div class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <!-- Bouton de fermeture -->
                <div class="absolute top-0 right-0 mt-4 mr-4">
                    <button @click="open = false" class="text-gray-500 hover:text-gray-400 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <!-- Titre -->
                <h3 class="text-lg leading-6 font-medium text-gray-900 text-center mb-4" id="modal-title">Vous cherchez votre ami par lien</h3>
                <!-- Contenu -->
                <div class="mt-2">
                    <div class="relative">
                        <form action="{{ route('check-cache') }}" method="POST">
                            @csrf
                            <input type="text"  id="user_url" name="user_url"   class="block pl-12 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter URL" required>
                            <button type="submit" class="block mx-auto mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>