<div class="row mb-2" id="{{ $nav->descriptioncode }}">
    <div class="col-12  specs-area">
        <div class="row">
            <h4 class="bg-theme-text custom-underline">{{ $nav->descriptionname }}</h4>
        </div>
        @if ($itemDetails->itemspecification)
            <p class="pt-1">
                {{ $itemDetails->itemspecification }}  
            </p>
        @endif
    </div>
</div>