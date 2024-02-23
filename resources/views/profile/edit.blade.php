<x-app-layout>
    <div class="py-12 mx-auto">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if(request()->has('profile_user'))
            @include('profile.partials.user-profile')

            @else
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                @include('profile.partials.top-user-info')
            </div>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                @include('profile.partials.update-profile-information-form')
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                @include('profile.partials.update-password-form')
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                @include('profile.partials.delete-user-form')
            </div>
            @endif

        </div>
    </div>
</x-app-layout>
