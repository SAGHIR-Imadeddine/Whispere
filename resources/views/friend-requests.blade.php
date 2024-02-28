<x-app-layout>

    {{-- @section('content') --}}
    <div class="flex justify-center w-full">

        <div class="container-fluid d-flex align-items-center w-full vh-100 ">
            <div class="text-center">
                <div class="w-full flex justify-center card bg-purple-200 shadow-lg p-5">
                    <h1 class="display-4 w-96 text-3xl text-purple-800 mb-4 font-bold font-serif">Friend Requests</h1>
                </div>
                <div class=" mt-52">
                    @if ($friendRequests->isEmpty())
                        <p class="lead text-3xl text-purple-700">No friend requests.</p>
                  </div>  
                   @else
                   <div class=" mt-52">
                        <ul class="list-group list-group-flush">
                            
                                @foreach ($friendRequests as $request)
                                @if ($request->request_status == 'pending')
                                <div class="flex flex-nowrap justify-center gap-x-2">
                                    <li class="list-group-item text-purple-700">{{ $request->user->name }} sent you a
                                        friend request.</li>

                                        {{-- <a href="" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                            Confirm 
                                        </a>  --}}
                                        {{-- <a href="" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                            Delete 
                                        </a>  --}}
                                    @foreach($friendRequests as $friendRequest)
                                         <form class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" method="POST" action="{{ route('accept.requests',  ['requestId' => $friendRequest->id, 'action' => 'accept']) }}">
                                            @csrf
                                            @method('post')
                                            <button type="submit">Confirm Request</button>
                                        </form> 
                                        
                                        <form class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800" method="POST" action="{{ route('delete.requests', ['requestId' => $friendRequest->id, 'action' => 'refuse']) }}">
                                            @csrf
                                            @method('delete')
                                            <button type="submit">Delete Request</button>
                                        </form>
                                    @endforeach
                                </div>
                                </div>   
                                @endif
                            @endforeachg
                        </ul>
                    @endif
               
            </div>
        </div>
    </div>

    {{-- @endsection --}}
</x-app-layout>
