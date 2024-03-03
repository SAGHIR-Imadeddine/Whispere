<x-app-layout>

@foreach ($users as $user)

<a href="ayoub/{{$user->id}}" class="bg-dark text-red"> {{$user->email}}</a>  <br>  
@endforeach

</x-app-layout>