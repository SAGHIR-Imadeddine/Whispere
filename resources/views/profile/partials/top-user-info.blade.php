<div class="flex justify-between items-center">
    <div class="flex flex-col">

        <div class="flex items-center space-x-4">
            <div class="w-16 h-16 rounded-full overflow-hidden">
                <img src="{{asset('storage/'. auth()->user()->profile_image)}}" alt="Image de profil" class="w-full h-full object-cover">
            </div>
            <div>
                <div class="font-semibold text-lg">{{auth()->user()->unique_identifier}}</div>
                <div class="text-gray-500">{{auth()->user()->name}}</div>
            </div>

        </div>
        <div class="flex mt-4 items-center">

            <p id="ProfileLink" class="text-blue-600 mr-4 text-xs">{{$url}}</p>
            <svg onclick="CopyLink()" class="cursor-pointer" width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6 11C6 8.17157 6 6.75736 6.87868 5.87868C7.75736 5 9.17157 5 12 5H15C17.8284 5 19.2426 5 20.1213 5.87868C21 6.75736 21 8.17157 21 11V16C21 18.8284 21 20.2426 20.1213 21.1213C19.2426 22 17.8284 22 15 22H12C9.17157 22 7.75736 22 6.87868 21.1213C6 20.2426 6 18.8284 6 16V11Z" stroke="#1C274C" stroke-width="1.5" />
                <path opacity="0.5" d="M6 19C4.34315 19 3 17.6569 3 16V10C3 6.22876 3 4.34315 4.17157 3.17157C5.34315 2 7.22876 2 11 2H15C16.6569 2 18 3.34315 18 5" stroke="#1C274C" stroke-width="1.5" />
            </svg>
            <p id="copiedText" class="hidden text-xs text-gray-400 p-1">Copied !!</p>
        </div>
    </div>

    <div class="flex items-center">
        {{ $qrCode}}
    </div>

</div>
<div class="mt-4 pt-4 flex justify-between items-center border-t border-t-2">
    <span>Supprimer les messages après 24h</span>
    <svg onclick="ToggleIcon()" id="delete-off" width="30px" height="30px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
        <path fill="#000000" d="M329.956 257.138a254.862 254.862 0 0 0 0 509.724h364.088a254.862 254.862 0 0 0 0-509.724H329.956zm0-72.818h364.088a327.68 327.68 0 1 1 0 655.36H329.956a327.68 327.68 0 1 1 0-655.36z" />
        <path fill="#000000" d="M329.956 621.227a109.227 109.227 0 1 0 0-218.454 109.227 109.227 0 0 0 0 218.454zm0 72.817a182.044 182.044 0 1 1 0-364.088 182.044 182.044 0 0 1 0 364.088z" />
    </svg>


    <svg onclick="ToggleIcon()" id="delete-on" class="hidden" width="30px" height="30px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" fill="#8080ff" transform="matrix(-1, 0, 0, 1, 0, 0)" stroke="#8080ff">

        <g id="SVGRepo_bgCarrier" stroke-width="0" />

        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

        <g id="SVGRepo_iconCarrier">

            <path fill="#8080ff" d="M329.956 257.138a254.862 254.862 0 0 0 0 509.724h364.088a254.862 254.862 0 0 0 0-509.724H329.956zm0-72.818h364.088a327.68 327.68 0 1 1 0 655.36H329.956a327.68 327.68 0 1 1 0-655.36z" />

            <path fill="#8080ff" d="M329.956 621.227a109.227 109.227 0 1 0 0-218.454 109.227 109.227 0 0 0 0 218.454zm0 72.817a182.044 182.044 0 1 1 0-364.088 182.044 182.044 0 0 1 0 364.088z" />

        </g>

    </svg>
</div>

<script>
    function ToggleIcon() {
        const deleteIcon = document.getElementById('delete-off');
        const deleteOption = document.getElementById('delete-on');
        deleteIcon.classList.toggle('hidden');
        deleteOption.classList.toggle('hidden');

    }

    function CopyLink() {
        var Link = document.getElementById("ProfileLink");

        navigator.clipboard.writeText(Link.innerText);
        document.getElementById("copiedText").classList.remove("hidden");
    }
</script>