<div class="right message">
    @if($message)
        <p>{{ $message }}</p>
    @endif
    {{-- @if ($mediaUrl)
    <div >
      <img src="{{ $mediaUrl }}" alt="Image" style="width: 150px; height: auto;">
    </div>
    @endif --}}
    @if ($mediaUrl)
    @php
        $fileExtension = pathinfo($mediaUrl, PATHINFO_EXTENSION);
        $imageExtensions = ['jpg', 'jpeg', 'png', 'gif']; 
    @endphp

    @if (in_array(strtolower($fileExtension), $imageExtensions))
    <img src="{{ $mediaUrl }}" alt="Image" style="width: 150px; height: auto;">
    @else
        <a href="{{ $mediaUrl }}" download="filename">Download File</a>
    @endif
@endif

@if ($locationDetails)
        <p>{{ $locationDetails }}</p>
        {{-- You can customize the presentation of location details as needed --}}
    @endif

     {{-- @if ($latitude && $longitude)
            <iframe width="300" height="200" frameborder="0" style="border:0" 
                src="https://www.google.com/maps/embed/v1/view?center={{ $latitude }},{{ $longitude }}&zoom=15" allowfullscreen>
            </iframe>
        @endif --}}

</div>
