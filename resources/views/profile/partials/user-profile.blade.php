<div class="flex justify-center items-center w-full">
    <div class="bg-white rounded-lg shadow-xl p-8 max-w-xl w-full">
        <div class="flex flex-col items-center">
            <div class="w-32 h-32 rounded-full overflow-hidden">
                <img src="{{ asset('storage/' . $user->profile_image) }}" alt="Image de profil" class="w-full h-full object-cover">
            </div>
            <div class="font-semibold text-lg">{{ $user->unique_identifier }}</div>
            <div class="text-gray-500">{{ $user->name }}</div>
        </div>
        <div class="mt-8 flex justify-around items-center">
            <div class="text-center">
                <div class="text-lg font-semibold">Total des amis</div>
                <div class="text-gray-500">{{$totalFriends}}</div>
            </div>
            <div class="text-center">
                <div class="text-lg font-semibold">Amis en commun</div>
                <div class="text-gray-500">{{$commonFriends}}</div>
            </div>
        </div>
        <div class="mt-8  justify-center text-center">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Envoyer un message</button>
        </div>
    </div>

    <div x-data="{ open: true }">
        <div x-show="open" @click.away="open = false" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                                <h3 class="text-lg text-center  font-medium leading-6 text-gray-900" id="modal-title">
                                    Vous êtes maintenant amis !
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm text-center text-gray-500">
                                        Vous pouvez maintenant envoyer un message à {{ $user->name }}.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button @click="open = false" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-500 text-base font-medium text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                            Fermer
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
