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

</div>
